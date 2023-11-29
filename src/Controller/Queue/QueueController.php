<?php

namespace App\Controller\Queue;

use App\Controller\BaseController;
use App\Entity\RoomQueue;
use App\Form\QueueType;
use App\Repository\RoomQueueRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/queue', name:"queue_")]
class QueueController extends BaseController
{
    #[Route('/', name: 'index')]
    public function index(Request $request, EntityManagerInterface $entityManager, RoomQueueRepository $roomQueueRepository): Response
    {
        $roomQueue = new RoomQueue();
        $form = $this->createForm(QueueType::class, $roomQueue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $room = $form->get('Room')->getData();
            $roomId = $form->get('Room')->getData()->getId();
            $crewId = $form->get('Crew')->getData()->getId();

            // Check if the combination of Crew, Room, and status ON_QUEUE already exists
            $existingQueue = $roomQueueRepository->findExistingQueue($roomId, $crewId);

            if ($existingQueue) {
                // Add a validation error to the form
                $form->get('Crew')->addError(new FormError('This Crew is already in the queue for the selected Room.'));
            } else {
                $nextQueueNumber = $roomQueueRepository->getNextQueueNumberForRoom($roomId);

                // Set the queue number for the new RoomQueue
                $roomQueue->setQueue($nextQueueNumber);
                $entityManager->persist($roomQueue);
                $entityManager->flush();

                return $this->redirectToRoute('queue_index', [], Response::HTTP_SEE_OTHER);
            }

        }

        //fetch all rooms and crewcount
        $roomQueueLists = $roomQueueRepository->countCrewByRoom();
        dump($roomQueueLists);

        return $this->render('queue/index.html.twig', [
            'room_queue' => $roomQueue,
            'form' => $form,
            'room_queue_lists' => $roomQueueLists,
        ]);
    }

}
