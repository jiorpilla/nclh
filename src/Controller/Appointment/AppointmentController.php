<?php

namespace App\Controller\Appointment;

use App\Controller\BaseController;
use App\Entity\Appointment;
use App\Entity\Crew;
use App\Entity\MedicalHistory;
use App\Form\AppointmentSearchType;
use App\Form\AppointmentType;
use App\Repository\AppointmentRepository;
use App\Repository\CrewRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
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

        $form = $this->createForm(AppointmentSearchType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $appointment_query = $appointmentRepository->findAppointments( $data['startDate'], $data['endDate'], $data['search'], $data['appointmentStatus']);
        }else{
            $dateFilter = $request->query->get('dateFilter', 'today');
            $appointment_query = $appointmentRepository->findAppointmentsByDateFilter($dateFilter);
        }

        $page               = $request->query->get('page', 1);
        $appointment_lists  = $this->paginate($appointment_query, $page);
        dump($appointment_lists);

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
            $crewData = $form->get('Crew')->getData();

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

            // Assuming you have a MedicalHistory entity associated with Crew
            $medicalHistory = new MedicalHistory();
            $medicalHistory->setStatus(MedicalHistory::STATUS_NOT_STARTED); // Set the status as NOTSTARTED
            $entityManager->persist($medicalHistory);

            $crew->addMedicalHistory($medicalHistory);

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

    #[Route('/confirm-appointment/{id}', name: 'confirm', methods: ['GET'])]
    public function registerAppointment(Appointment $appointment, EntityManagerInterface $entityManager): Response
    {
        // Check if the appointment exists
        if (!$appointment) {
            // Handle the case where the appointment is not found
            throw $this->createNotFoundException('Appointment not found');
        }

        // Update the appointment status to 'confirmed'
        $appointment->setStatus(Appointment::STATUS_CONFIRMED);

        // Save the changes to the database
        $entityManager->persist($appointment);
        $entityManager->flush();


        return $this->render('appointment/confirm.html.twig');

    }

    #[Route('/check-in-appointment/{id}', name: 'confirm', methods: ['GET'])]
    public function checkInAppointment(Appointment $appointment, EntityManagerInterface $entityManager): RedirectResponse
    {
        // Check if the appointment exists
        if (!$appointment) {
            // Handle the case where the appointment is not found
            throw $this->createNotFoundException('Appointment not found');
        }

        $medicalHistory = $appointment->getCrew()->getMedicalHistory();
        $medicalHistory->setStartDate(new \DateTime()); // Set the start date as the current date
        $medicalHistory->setStatus(MedicalHistory::STATUS_IN_PROGRESS); // Set the status as STATUS_IN_PROGRESS

        // Persist and .flush the MedicalHistory entity
        $entityManager->persist($medicalHistory);
        $entityManager->flush();

        // Redirect to the 'crew_show' route
        return $this->redirectToRoute('crew_show', ['id' => $appointment->getCrew()->getId()]);

    }
}
