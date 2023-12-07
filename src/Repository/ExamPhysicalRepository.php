<?php

namespace App\Repository;

use App\Entity\ExamPhysical;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExamPhysical>
 *
 * @method ExamPhysical|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamPhysical|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamPhysical[]    findAll()
 * @method ExamPhysical[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamPhysicalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamPhysical::class);
    }

//    /**
//     * @return ExamPhysical[] Returns an array of ExamPhysical objects
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

//    public function findOneBySomeField($value): ?ExamPhysical
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
