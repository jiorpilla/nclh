<?php

namespace App\Repository;

use App\Entity\LabTechnician;
use App\Utils\Traits\CommonRepositoryTrait;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LabTechnician>
 *
 * @method LabTechnician|null find($id, $lockMode = null, $lockVersion = null)
 * @method LabTechnician|null findOneBy(array $criteria, array $orderBy = null)
 * @method LabTechnician[]    findAll()
 * @method LabTechnician[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LabTechnicianRepository extends ServiceEntityRepository
{
    use CommonRepositoryTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LabTechnician::class);
    }

//    /**
//     * @return LabTechnician[] Returns an array of LabTechnician objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?LabTechnician
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
