<?php

namespace App\Repository;

use App\Entity\ExamStoolCulture;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExamStoolCulture>
 *
 * @method ExamStoolCulture|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamStoolCulture|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamStoolCulture[]    findAll()
 * @method ExamStoolCulture[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamStoolCultureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamStoolCulture::class);
    }

//    /**
//     * @return ExamStoolCulture[] Returns an array of ExamStoolCulture objects
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

//    public function findOneBySomeField($value): ?ExamStoolCulture
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
