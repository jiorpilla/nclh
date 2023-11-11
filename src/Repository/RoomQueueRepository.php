<?php

namespace App\Repository;

use App\Entity\RoomQueue;
use App\Utils\Traits\CommonRepositoryTrait;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
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
