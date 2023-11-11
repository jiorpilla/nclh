<?php

namespace App\Repository;

use App\Entity\Nurses;
use App\Utils\Traits\CommonRepositoryTrait;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Nurses>
 *
 * @method Nurses|null find($id, $lockMode = null, $lockVersion = null)
 * @method Nurses|null findOneBy(array $criteria, array $orderBy = null)
 * @method Nurses[]    findAll()
 * @method Nurses[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NursesRepository extends ServiceEntityRepository
{
    use CommonRepositoryTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Nurses::class);
    }

//    /**
//     * @return Nurses[] Returns an array of Nurses objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('n.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Nurses
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
