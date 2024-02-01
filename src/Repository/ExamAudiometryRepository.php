<?php

namespace App\Repository;

use App\Entity\ExamAudiometry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExamAudiometry>
 *
 * @method ExamAudiometry|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamAudiometry|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamAudiometry[]    findAll()
 * @method ExamAudiometry[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamAudiometryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamAudiometry::class);
    }

//    /**
//     * @return ExamAudiometry[] Returns an array of ExamAudiometry objects
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

//    public function findOneBySomeField($value): ?ExamAudiometry
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
