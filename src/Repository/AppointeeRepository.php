<?php

namespace App\Repository;

use App\Entity\Appointee;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Appointee>
 *
 * @method Appointee|null find($id, $lockMode = null, $lockVersion = null)
 * @method Appointee|null findOneBy(array $criteria, array $orderBy = null)
 * @method Appointee[]    findAll()
 * @method Appointee[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AppointeeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Appointee::class);
    }

//    /**
//     * @return Appointee[] Returns an array of Appointee objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Appointee
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
