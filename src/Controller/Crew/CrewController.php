<?php

namespace App\Controller\Crew;

use App\Controller\BaseController;
use App\Entity\Crew;
use App\Form\CrewType;
use App\Repository\CrewRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/crew')]
class CrewController extends BaseController
{
    #[Route('/', name: 'app_crew_index', methods: ['GET'])]
    public function index(Request $request, CrewRepository $crewRepository, PaginatorInterface $paginator): Response
    {
        $query = $crewRepository->createQueryBuilder('c')
            ->getQuery();

        $pagination = $paginator->paginate(
            $query,
            $request->query->get('page', 1),
            $this->getPageLimit() // Items per page
        );

        return $this->render('crew/index.html.twig', [
            'crews' => $pagination,
        ]);
    }

    #[Route('/new', name: 'app_crew_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $crew = new Crew();
        $form = $this->createForm(CrewType::class, $crew);
        $form->handleRequest($request);

        dump($form->getData());
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($crew);
            $entityManager->flush();

            return $this->redirectToRoute('app_crew_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('crew/new.html.twig', [
            'crew' => $crew,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_crew_show', methods: ['GET'])]
    public function show(Crew $crew): Response
    {
        return $this->render('crew/show.html.twig', [
            'crew' => $crew,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_crew_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Crew $crew, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CrewType::class, $crew);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_crew_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('crew/edit.html.twig', [
            'crew' => $crew,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_crew_delete', methods: ['POST'])]
    public function delete(Request $request, Crew $crew, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$crew->getId(), $request->request->get('_token'))) {
            $entityManager->remove($crew);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_crew_index', [], Response::HTTP_SEE_OTHER);
    }
}
