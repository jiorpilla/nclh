<?php

namespace App\Repository;

use App\Entity\RoomQueue;
use App\Utils\Traits\CommonRepositoryTrait;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Uid\Ulid;

/**
 * Use ->toBinary() for ULID
 * @extends ServiceEntityRepository<RoomQueue>
 *
 * @method RoomQueue|null find($id, $lockMode = null, $lockVersion = null)
 * @method RoomQueue|null findOneBy(array $criteria, array $orderBy = null)
 * @method RoomQueue[]    findAll()
 * @method RoomQueue[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RoomQueueRepository extends ServiceEntityRepository
{
    use CommonRepositoryTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RoomQueue::class);
    }

    public function getNextQueueNumberForRoom(Ulid $roomId): int
    {
        $result = $this->createQueryBuilder('rq')
            ->select('COUNT(rq.queue) as queueCount')
            ->andWhere('rq.Room = :roomId')
            ->andWhere('rq.deleted = :deleted')
            ->andWhere('rq.status = :status')
            ->setParameters([
                'deleted' => 0,
                'roomId' => $roomId->toBinary(),
                'status' => 'ON_QUEUE',
            ])
            ->groupBy('rq.Room')
            ->getQuery()
            ->getOneOrNullResult();

        return is_null($result) ? 1 : $result['queueCount'] + 1;
    }

    public function countCrewByRoom(): ?array
    {
        return $this->createQueryBuilder('rq')
            ->select('r', 'c', 'rq', 'r.name as roomName', 'COUNT(c.id) as crewCount')

            ->join('rq.Room', 'r')
            ->join('rq.Crew', 'c')
            ->andWhere('rq.deleted = :deleted')
            ->andWhere('rq.status = :status')
            ->setParameters([
                'deleted' => 0,
                'status' => 'ON_QUEUE', // Adjust this based on your actual status values
            ])
            ->groupBy('rq.Room','rq')
            ->getQuery()
            ->getResult();
            ;
    }

    public function findExistingQueue(Ulid $roomId, Ulid $crewId): ?array
    {
        return $this->createQueryBuilder('rq')
            ->andWhere('rq.deleted = :deleted')
            ->andWhere('rq.Room = :roomId')
            ->andWhere('rq.Crew = :crewId')
            ->andWhere('rq.status = :status')
            ->setParameters([
                'deleted' => 0,
                'roomId' => $roomId->toBinary(),
                'crewId' => $crewId->toBinary(),
                'status' => 'ON_QUEUE', // Adjust this based on your actual status values
            ])
            ->getQuery()
            ->getOneOrNullResult();
    }

//    /**
//     * @return RoomQueue[] Returns an array of RoomQueue objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?RoomQueue
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
