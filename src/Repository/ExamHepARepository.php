<?php

namespace App\Repository;

use App\Entity\ExamHepA;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExamHepA>
 *
 * @method ExamHepA|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamHepA|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamHepA[]    findAll()
 * @method ExamHepA[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamHepARepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamHepA::class);
    }

//    /**
//     * @return ExamHepA[] Returns an array of ExamHepA objects
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

//    public function findOneBySomeField($value): ?ExamHepA
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
