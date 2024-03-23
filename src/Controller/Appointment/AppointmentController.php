<?php

namespace App\Controller\Appointment;

use App\Controller\BaseController;
use App\Entity\Appointment;
use App\Entity\Crew;
use App\Entity\MedicalHistory;
use App\Form\AppointmentSearchType;
use App\Form\AppointmentType;
use App\Form\CsvUploadType;
use App\Repository\AppointmentRepository;
use App\Repository\CrewRepository;
use App\Service\ExamsGenerator;
use App\Service\TwigTemplateEmailSender;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Address;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/appointment', name: 'appointment_')]
class AppointmentController extends BaseController
{

    public function __construct(PaginatorInterface $paginator)
    {
        parent::__construct($paginator);
    }

    public function createBreadcrumbs()
    {
        $this->breadcrumbs[] = ['name' => 'Appointment', 'path' => $this->generateUrl('appointment_main')];
    }

    #[Route('/', name: 'main', methods: ['GET','POST'])]
    public function index(Request $request, AppointmentRepository $appointmentRepository): Response
    {
        $this->createBreadcrumbs();

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
            'breadcrumbs' => $this->breadcrumbs,
        ]);
    }

    #[Route('/new', name: 'create', methods: ['GET','POST'])]
    public function createAppointment(Request $request, EntityManagerInterface $entityManager, CrewRepository $crewRepository, TwigTemplateEmailSender $emailSender, ExamsGenerator $examsGenerator): Response
    {
        $this->createBreadcrumbs();
        $this->breadcrumbs[] = ['name' => 'Create'];

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

            $crew = $crewData;
            if ($existingCrew instanceof Crew) {
                // Crew already exists, update it
                $crewData->setType(1); // returnee
            } else {
                // Crew does not exist, create a new one
                $crewData->setType(0); // new
            }

            // Assuming you have a MedicalHistory entity associated with Crew
            $medicalHistory = new MedicalHistory();
            $medicalHistory->setStatus(MedicalHistory::STATUS_NOT_STARTED); // Set the status as NOT STARTED
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

            //add exams here
            $examsGenerator->createExams($crew, $medicalHistory);

            $recipientEmail = Address::create($appointment->getCrew()->getFullName() . ' <' . $appointment->getCrew()->getEmail() . '>');
            $subject = 'You have an Appointment NCLH on : ' . $appointment->getAppointmentDate()->format('Y-m-d');
            $template = 'templates/emails/appointment_registration.html.twig';
            $context = [
                'full_name' => $appointment->getCrew()->getFullName(),
                'confirmation_link' => $request->getSchemeAndHttpHost() . '/appointment/confirm-appointment/' . $appointment->getId(),
                'appointment_date' => $appointment->getAppointmentDate()->format('Y-m-d'),
            ];
            //send Email
            $emailSender->sendTemplatedEmail($recipientEmail, $subject, $template, $context);

            return $this->redirectToRoute('appointment_main', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('appointment/new.html.twig', [
            'appointment' => $appointment,
            'form' => $form,
            'breadcrumbs' => $this->breadcrumbs,
        ]);
    }

    #[Route('/confirm-appointment/{id}', name: 'confirm', methods: ['GET'])]
    public function confirmAppointment(Appointment $appointment, EntityManagerInterface $entityManager): Response
    {
//        // Check if the appointment exists
//        if (!$appointment) {
//            // Handle the case where the appointment is not found
//            throw $this->createNotFoundException('Appointment not found');
//        }

        // Update the appointment status to 'confirmed'
        $appointment->setStatus(Appointment::STATUS_CONFIRMED);

        // Save the changes to the database
        $entityManager->persist($appointment);
        $entityManager->flush();

        return $this->render('appointment/confirm.html.twig');


    }

    #[Route('/check-in-appointment/{id}', name: 'checkin', methods: ['GET'])]
    public function checkInAppointment(Appointment $appointment, EntityManagerInterface $entityManager, TwigTemplateEmailSender $emailSender, Request $request): RedirectResponse
    {
        // Check if the appointment exists
//        if (!$appointment) {
//            // Handle the case where the appointment is not found
//            throw $this->createNotFoundException('Appointment not found');
//        }


        $crew = $appointment->getCrew();
        $medicalHistoryRepository = $entityManager->getRepository(MedicalHistory::class);
        $medicalHistory = $medicalHistoryRepository->findLatestMedicalHistoryByCrew($crew);

        $medicalHistory->setStartDate(new DateTime()); // Set the start date as the current date
        $medicalHistory->setStatus(MedicalHistory::STATUS_IN_PROGRESS); // Set the status as STATUS_IN_PROGRESS
        $appointment->setStatus(Appointment::STATUS_CHECKED_IN);
        // Persist and .flush the MedicalHistory entity
        $entityManager->persist($appointment);
        $entityManager->persist($medicalHistory);
        $entityManager->flush();

        //prepare the email to be sent
        $attachmentPath = $request->getSchemeAndHttpHost() . '/qr-code/pdf/' . $appointment->getCrew()->getId();
        $recipientEmail = Address::create($appointment->getCrew()->getFullName() . ' <' . $appointment->getCrew()->getEmail() . '>');
        $subject = 'You have Confirmed the Appointment on : ' . $appointment->getAppointmentDate()->format('Y-m-d');
        $template = 'templates/emails/appointment_checkedin.html.twig';
        $context = [
            'full_name' => $appointment->getCrew()->getFullName(),
            'appointment_date' => $appointment->getAppointmentDate()->format('Y-m-d'),
        ];
        //send Email
        $emailSender->sendTemplatedEmail($recipientEmail, $subject, $template, $context, $attachmentPath);

        // Redirect to the 'crew_show' route
        return $this->redirectToRoute('crew_show', ['id' => $appointment->getCrew()->getId()]);

    }

    #[Route('/new/bulk', name: 'bulk_create', methods: ['GET', 'POST'])]
    public function bulkCreateAppointment(Request $request, EntityManagerInterface $entityManager, CrewRepository $crewRepository, TwigTemplateEmailSender $emailSender, ExamsGenerator $examsGenerator): Response
    {
        $this->createBreadcrumbs();
        $this->breadcrumbs[] = ['name' => 'Bulk Create'];

        $form = $this->createForm(CsvUploadType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $csvFile = $form->get('csvFile')->getData();

            // Load the CSV file into an array
            $csvData = array_map('str_getcsv', file($csvFile->getPathname()));
            array_shift($csvData); // remove the header.

            //this part should be updated everytime we change the CSV format.
            $header = [
                'appointment_date',
                'email',
                'passport_number',
                'seaman_book_number',
                'first_name',
                'middle_name',
                'last_name',
                'suffix',
                'phone_number',
                'civil_status',
                'gender',
                'address',
                'date_of_birth',
                'location_of_birth',
                'company',
                'ship',
                'position',
                'nationality',
                'is_food_handler',
            ];


            foreach ($csvData as $row) {
                $row = array_combine($header, $row); // Combine header and row data

                // Check if Crew with the same email, passportNumber, or seamanBookNumber exists
                $existingCrew = $crewRepository->findExistingCrewByAttributes([
                    'email' => $row['email'],
                    'passport_number' => $row['passport_number'],
                    'seaman_book_number' => $row['seaman_book_number'],
                ]);

                $crew = $existingCrew ?: new Crew();

                if ($existingCrew instanceof Crew) {
                    // Crew already exists, update it
                    $crew->setType(1); // returnee
                } else {
                    // Crew does not exist, create a new one
                    $crew->setType(0); // new
                }



                $civil_status = [
                    'single' => 1,
                    'married' => 2,
                    'divorced' => 3,
                    'widowed' => 4,
                    'widow' => 4,
                ];
                
                if(in_array(strtolower($row['gender']), ['m', 'male'])){
                    $gender = Crew::GENDER_MALE;
                }
                if(in_array(strtolower($row['gender']), ['f', 'female'])){
                    $gender = Crew::GENDER_FEMALE;
                }
                $dateOfBirth = DateTime::createFromFormat('m-d-Y', $row['date_of_birth']);

                // Set Crew entity properties from the CSV data
                $crew->setEmail($row['email']);
                $crew->setPassportNumber($row['passport_number']);
                $crew->setSeamanBookNumber($row['seaman_book_number']);
                $crew->setFirstName($row['first_name']);
                $crew->setMiddleName($row['middle_name']);
                $crew->setLastName($row['last_name']);
                $crew->setSuffix($row['suffix']);
                $crew->setPhoneNumber($row['phone_number']);
                $crew->setCivilStatus($civil_status[strtolower($row['civil_status'])]); //double check the value first.
                $crew->setGender($gender);
                $crew->setAddress($row['address']);
                $crew->setDateOfBirth($dateOfBirth);
                $crew->setLocationOfBirth($row['location_of_birth']);
                $crew->setCompany($row['company']);
                $crew->setShip($row['ship']);
                $crew->setPosition($row['position']);
                $crew->setNationality($row['nationality']);

                // Create a new Appointment entity
                $appointment = new Appointment();
                $appointment->setCrew($crew);
                $appointment->setAppointmentDate(DateTime::createFromFormat('m-d-Y', $row['appointment_date']));
                $appointment->setStatus(Appointment::STATUS_PENDING);

                // create a Medical History entity and associate it with the Crew.
                $medicalHistory = new MedicalHistory();
                $medicalHistory->setStatus(MedicalHistory::STATUS_NOT_STARTED);
                $entityManager->persist($medicalHistory);

                $crew->addMedicalHistory($medicalHistory);

                // Persist the Crew and Appointment entities
                $entityManager->persist($crew);
                $entityManager->persist($appointment);

                $isFoodHandler = filter_var($row['is_food_handler'], FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
                // Add exams here
                $examsGenerator->createExams($crew, $medicalHistory, $isFoodHandler);


                $recipientEmail = Address::create($crew->getFullName() . ' <' . $crew->getEmail() . '>');
                $subject = 'You have an Appointment NCLH on : ' . $appointment->getAppointmentDate()->format('Y-m-d');
                $template = 'templates/emails/appointment_registration.html.twig';
                $context = [
                    'full_name' => $crew->getFullName(),
                    'confirmation_link' => $request->getSchemeAndHttpHost() . '/appointment/confirm-appointment/' . $appointment->getId(),
                    'appointment_date' => $appointment->getAppointmentDate()->format('Y-m-d'),
                ];
                //send Email
                $emailSender->sendTemplatedEmail($recipientEmail, $subject, $template, $context);

                $entityManager->flush();
            }


            // you can send confirmation emails or perform other actions after creating the appointments

//            return $this->redirectToRoute('appointment_main');
        }

        return $this->render('appointment/bulk_create.html.twig', [
            'form' => $form,
            'breadcrumbs' => $this->breadcrumbs,
        ]);
    }
}
