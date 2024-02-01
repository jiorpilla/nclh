<?php

namespace App\Repository;

use App\Entity\ExamCBC;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExamCBC>
 *
 * @method ExamCBC|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamCBC|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamCBC[]    findAll()
 * @method ExamCBC[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamCBCRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamCBC::class);
    }

//    /**
//     * @return ExamCBC[] Returns an array of ExamCBC objects
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

//    public function findOneBySomeField($value): ?ExamCBC
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
