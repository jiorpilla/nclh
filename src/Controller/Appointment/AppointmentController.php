<?php

namespace App\Controller\Appointment;

use App\Controller\BaseController;
use App\Entity\Appointment;
use App\Form\AppointmentType;
use App\Repository\AppointmentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/appointment', name: 'appointment_')]
class AppointmentController extends BaseController
{
    #[Route('/', name: 'main')]
    public function index(Request $request, EntityManagerInterface $entityManager, AppointmentRepository $appointmentRepository, MailerInterface $mailer): Response
    {

        $appointment = new Appointment();
        $form = $this->createForm(AppointmentType::class, $appointment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($appointment);
            $entityManager->flush();

            $email = (new Email())
                ->from('NCLH@janivanorpilla.com')
                ->to($appointment->getAppointee()->getEmail())
                ->subject('You have an appointment at NCLH clinic at ' . $appointment->getAppointmentDate()->format('Y-m-d'))
                ->text('Just show up')
                ->html('<p>Just show up</p>');

            $mailer->send($email);

            return $this->redirectToRoute('appointment_main', [], Response::HTTP_SEE_OTHER);
        }


        $query = $appointmentRepository->getListQuery();
        $page = $request->query->get('page', 1);

        $appointment_lists = $this->paginate($query, $page);

        return $this->render('appointment/index.html.twig', [
            'appointment_lists' => $appointment_lists,
            'appointment' => $appointment,
            'form' => $form,
        ]);
    }

    #[Route('/bulk_create', name: 'bulk_create')]
    public function bulkCreate()
    {

    }
}
