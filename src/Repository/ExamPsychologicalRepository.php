<?php

namespace App\Repository;

use App\Entity\ExamPsychological;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExamPsychological>
 *
 * @method ExamPsychological|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamPsychological|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamPsychological[]    findAll()
 * @method ExamPsychological[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamPsychologicalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamPsychological::class);
    }

//    /**
//     * @return ExamPsychological[] Returns an array of ExamPsychological objects
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

//    public function findOneBySomeField($value): ?ExamPsychological
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
