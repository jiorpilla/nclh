<?php

namespace App\Repository;

use App\Entity\Findings;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Findings>
 *
 * @method Findings|null find($id, $lockMode = null, $lockVersion = null)
 * @method Findings|null findOneBy(array $criteria, array $orderBy = null)
 * @method Findings[]    findAll()
 * @method Findings[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FindingsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Findings::class);
    }

//    /**
//     * @return Findings[] Returns an array of Findings objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Findings
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
