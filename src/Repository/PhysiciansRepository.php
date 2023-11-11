<?php

namespace App\Repository;

use App\Entity\Physicians;
use App\Utils\Traits\CommonRepositoryTrait;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Physicians>
 *
 * @method Physicians|null find($id, $lockMode = null, $lockVersion = null)
 * @method Physicians|null findOneBy(array $criteria, array $orderBy = null)
 * @method Physicians[]    findAll()
 * @method Physicians[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PhysiciansRepository extends ServiceEntityRepository
{
    use CommonRepositoryTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Physicians::class);
    }

//    /**
//     * @return Physicians[] Returns an array of Physicians objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Physicians
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
