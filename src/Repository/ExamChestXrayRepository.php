<?php

namespace App\Repository;

use App\Entity\ExamChestXray;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExamChestXray>
 *
 * @method ExamChestXray|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamChestXray|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamChestXray[]    findAll()
 * @method ExamChestXray[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamChestXrayRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamChestXray::class);
    }

//    /**
//     * @return ExamChestXray[] Returns an array of ExamChestXray objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ExamChestXray
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
