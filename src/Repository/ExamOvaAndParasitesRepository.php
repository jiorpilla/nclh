<?php

namespace App\Repository;

use App\Entity\ExamOvaAndParasites;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExamOvaAndParasites>
 *
 * @method ExamOvaAndParasites|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamOvaAndParasites|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamOvaAndParasites[]    findAll()
 * @method ExamOvaAndParasites[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamOvaAndParasitesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamOvaAndParasites::class);
    }

//    /**
//     * @return ExamOvaAndParasites[] Returns an array of ExamOvaAndParasites objects
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

//    public function findOneBySomeField($value): ?ExamOvaAndParasites
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
