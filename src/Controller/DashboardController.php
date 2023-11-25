<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends BaseController
{

    public function __construct(private LoggerInterface $logger, private EntityManagerInterface $entityManager)
    {
    }

    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(): Response
    {
        $user = $this->getUser();
        $roles = $user->getRoles();

        $this->logger->info("dashboard has been accessed by " . $user->getUsername() . "with a role of " . implode(', ', $roles));

        if (in_array('ROLE_SUPERADMIN', $roles)) {
            return $this->superadminDashboard();
        } elseif (in_array('ROLE_ADMIN', $roles)) {
            return $this->adminDashboard();
        } elseif (in_array('ROLE_NURSE', $roles)) {
            return $this->nurseDashboard();
        } elseif (in_array('ROLE_LABTECHNICIAN', $roles)) {
            return $this->labTechnicianDashboard();
        } elseif (in_array('ROLE_PHYSICIAN', $roles)) {
            return $this->physicianDashboard();
        } elseif (in_array('ROLE_CREW', $roles)) {
            return $this->crewDashboard();
        }


        return $this->render('dashboard/default.html.twig');
    }

    private function superadminDashboard(): Response
    {


        return $this->render('dashboard/superadmin.html.twig', [
        ]);
    }

    private function adminDashboard(): Response
    {
        return $this->render('dashboard/admin.html.twig');
    }

    private function nurseDashboard(): Response
    {
        return $this->render('dashboard/nurse.html.twig');
    }

    private function labTechnicianDashboard(): Response
    {
        return $this->render('dashboard/lab_technician.html.twig');
    }

    private function physicianDashboard(): Response
    {
        return $this->render('dashboard/physician.html.twig');
    }

    private function crewDashboard(): Response
    {
        return $this->render('dashboard/crew.html.twig');
    }

}