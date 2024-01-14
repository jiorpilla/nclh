<?php

namespace App\Controller\Crew;

use App\Controller\BaseController;
use App\Entity\Crew;
use App\Form\CrewType;
use App\Repository\CrewRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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

    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(Crew $crew): Response
    {
        return $this->render('crew/show.html.twig', [
            'crew' => $crew,
        ]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
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
}
