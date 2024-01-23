<?php

namespace App\Controller\Crew;

use App\Controller\BaseController;
use App\Entity\Appointee;
use App\Entity\Crew;
use App\Entity\MedicalHistory;
use App\Form\CrewType;
use App\Repository\CrewRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/crew', name: 'crew_')]
class CrewController extends BaseController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(Request $request, CrewRepository $crewRepository): Response
    {
        $query = $crewRepository->getListQuery();
        $page = $request->query->get('page', 1);

        $result = $this->paginate($query, $page);

        return $this->render('crew/index.html.twig', [
            'crews' => $result,
        ]);
    }

    #[Route('/new', name: 'create', methods: ['GET', 'POST'])]
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        $crew = new Crew();
        $form = $this->createForm(CrewType::class, $crew);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($crew);
            $entityManager->flush();

            return $this->redirectToRoute('crew_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('crew/new.html.twig', [
            'crew' => $crew,
            'form' => $form,
        ]);
    }

    #[Route('/detail/{id}', name: 'show', methods: ['GET'])]
    public function show(Crew $crew): Response
    {
        return $this->render('crew/show.html.twig', [
            'crew' => $crew,
        ]);
    }

    #[Route('/edit/{id}', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Crew $crew, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CrewType::class, $crew);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('crew_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('crew/edit.html.twig', [
            'crew' => $crew,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, Crew $crew, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$crew->getId(), $request->request->get('_token'))) {
            $entityManager->remove($crew);
            $entityManager->flush();
        }

        return $this->redirectToRoute('crew_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/{id}/medical-history', name: 'medical_history', methods: ['GET'])]
    public function medicalHistory(Crew $crew): Response
    {
        return $this->render('crew/medical_history.html.twig', [
            'crew' => $crew,
        ]);
    }

    /**
     * this is used in Room Queue QR Scanner - Stimulus JS
     * check Ajax code on that file
     * @param Crew $crew
     * @return JsonResponse
     */
    #[Route('/api/id/{id}', name: 'fetch_via_id', methods: ['GET'])]
    public function fetchViaId(Crew $crew):JsonResponse
    {
        return $this->json($crew);
    }

    #[Route('/find', name: 'search', methods: ['GET'])]
    public function findCrew(Request $request, CrewRepository $crewRepository): JsonResponse
    {
        $email = $request->query->get('email');
        $passportNumber = $request->query->get('passportNumber');
        $seamanBookNumber = $request->query->get('seamanBookNumber');
//
//        $email = $request->query->get('email') ?? null;
//        $passportNumber = $request->query->get('passportNumber') ?? null;
//        $seamanBookNumber = $request->query->get('seamanBookNumber') ?? null;
//
//        $email = empty($email) ? null : $email;
//        $passportNumber = empty($passportNumber) ? null : $passportNumber;
//        $seamanBookNumber = empty($seamanBookNumber) ? null : $seamanBookNumber;

        // You can also pass an array of parameters if you prefer
        // $parameters = $this->getRequest()->query->all();

        // Validate input
        if (!($email || $passportNumber || $seamanBookNumber)) {
            return $this->json(['error' => 'At least one parameter is required.'], JsonResponse::HTTP_BAD_REQUEST);
        }

        // Find the Crew based on the provided parameters
        $crew = $crewRepository->findExistingCrewByAttributes([
            'email' => $email,
            'passport_number' => $passportNumber,
            'seaman_book_number' => $seamanBookNumber,
        ]);

        if (!$crew) {
            return $this->json(['error' => 'Crew not found.'], JsonResponse::HTTP_NOT_FOUND);
        }

        return $this->json($crew);
    }

    #[Route('/register-appointment/{id}', name: 'register_appointment', methods: ['GET', 'POST'])]
    public function registerAppointment(Appointee $appointee, EntityManagerInterface $entityManager, MailerInterface $mailer): Response
    {

        // Check if there is a matching crew member with the same email
        $crewRepository = $entityManager->getRepository(Crew::class);
        $existingCrew = $crewRepository->findOneBy(['email' => $appointee->getEmail(), 'deleted' => '0']);

        if ($existingCrew) {
            // If a matching crew member exists, use that crew
            $crew = $existingCrew;
        } else {
            // If no matching crew member, create a new crew
            $crew = new Crew();
            $crew->setFirstName($appointee->getFirstName());
            $crew->setLastName($appointee->getLastName());
            $crew->setMiddleName($appointee->getMiddleName());
            $crew->setSuffix($appointee->getSuffix());
            $crew->setGender($appointee->getGender());
            $crew->setDateOfBirth($appointee->getDateOfBirth());
            $crew->setLocationOfBirth($appointee->getLocationOfBirth());
            $crew->setPhoneNumber($appointee->getPhoneNumber());
            $crew->setEmail($appointee->getEmail());
            $crew->setCivilStatus($appointee->getCivilStatus());
            $crew->setAddress($appointee->getAddress());

            $entityManager->persist($crew);
            $entityManager->flush();
        }

        // Create a new MedicalHistory connected to the crew
        $medicalHistory = new MedicalHistory();
        // Set MedicalHistory properties as needed
        // ...
        $datetime = new \DateTime();
        $medicalHistory->setStartDate($datetime);
        $medicalHistory->setStatus(1);
        // Associate crew with the MedicalHistory
        $medicalHistory->setCrew($crew);

        // Persist and flush changes to the database
        $entityManager->persist($medicalHistory);
        $entityManager->flush();

        // should send email here
        $email = (new Email())
            ->from('NCLH@janivanorpilla.com')
            ->to($appointee->getEmail())
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('You are now being processed')
            ->text('Here are you steps on what to do while doing a medical check up!')
            ->html('<p>Here are you steps on what to do while doing a medical check up!</p>');

        $mailer->send($email);


        // Redirect to the show method of the CrewController
        return $this->redirectToRoute('crew_show', ['id' => $crew->getId()]);
    }
}
