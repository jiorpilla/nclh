<?php

namespace App\Controller\Appointment;

use App\Controller\BaseController;
use App\Entity\Appointment;
use App\Entity\Crew;
use App\Form\AppointmentType;
use App\Form\DateRangeType;
use App\Repository\AppointmentRepository;
use App\Repository\CrewRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/appointment', name: 'appointment_')]
class AppointmentController extends BaseController
{
    #[Route('/', name: 'main', methods: ['GET','POST'])]
    public function index(Request $request, AppointmentRepository $appointmentRepository): Response
    {
//        $dateFilter = $request->query->get('dateFilter', 'today');
        $dateFilter = $request->query->get('dateFilter');
        $page       = $request->query->get('page', 1);

        $form = $this->createForm(DateRangeType::class);
        $form->handleRequest($request);

        $startDate = null;
        $endDate = null;
        $search = null;

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $startDate = $data['startDate'];
            $endDate = $data['endDate'];
            $search = $data['search'];
        }


//        $appointment_query = $appointmentRepository->findAppointmentsByDateFilter($dateFilter, $startDate, $endDate);
        $appointment_query = $appointmentRepository->findAppointments($dateFilter, $startDate, $endDate, $search);
        dump($appointment_query);

        $appointment_lists = $this->paginate($appointment_query, $page);


        return $this->render('appointment/index.html.twig', [
            'appointment_lists' => $appointment_lists,
            'dateRangeForm' => $form,
        ]);
    }

    #[Route('/bulk_create', name: 'bulk_create', methods: ['GET'])]
    public function bulkCreate(): Response
    {
        return new Response("test");
    }

    #[Route('/new', name: 'create', methods: ['GET','POST'])]
    public function createAppointment(Request $request, EntityManagerInterface $entityManager, CrewRepository $crewRepository): Response
    {
        $appointment = new Appointment();
        $form = $this->createForm(AppointmentType::class, $appointment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // Extract the crew data from the submitted form
            $crewData = $form->get('crew')->getData();

            // Check if Crew with the same email, passportNumber, or seamanBookNumber exists
            $existingCrew = $crewRepository->findExistingCrewByAttributes([
                'email' => $crewData->getEmail(),
                'passport_number' => $crewData->getPassportNumber(),
                'seaman_book_number' => $crewData->getSeamanBookNumber(),
            ]);

            if ($existingCrew instanceof Crew) {
                // Crew already exists, update it
                $crew = $existingCrew;
                $crewData->setType(1); // returnee
            } else {
                // Crew does not exist, create a new one
                $crew = $crewData;
                $crewData->setType(0); // new
            }

            // persist the Crew
            $entityManager->persist($crew);

            // Set the Crew for the Appointment
            $appointment->setCrew($crew);

            //set `pending` since this is the registration.
            $appointment->setStatus(Appointment::STATUS_PENDING);
            //set `package` here too once logic is set

            // persist the Appointment
            $entityManager->persist($appointment);

            //flush
            $entityManager->flush();

            return $this->redirectToRoute('appointment_main', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('appointment/new.html.twig', [
            'appointment' => $appointment,
            'form' => $form,
        ]);
    }
}
