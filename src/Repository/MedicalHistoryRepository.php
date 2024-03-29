<?php

namespace App\Repository;

use App\Entity\Crew;
use App\Entity\MedicalHistory;
use App\Utils\Traits\CommonRepositoryTrait;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Faker\Provider\Medical;

/**
 * @extends ServiceEntityRepository<MedicalHistory>
 *
 * @method MedicalHistory|null find($id, $lockMode = null, $lockVersion = null)
 * @method MedicalHistory|null findOneBy(array $criteria, array $orderBy = null)
 * @method MedicalHistory[]    findAll()
 * @method MedicalHistory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MedicalHistoryRepository extends ServiceEntityRepository
{
    use CommonRepositoryTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MedicalHistory::class);
    }


    /**
     * Fetch connected MedicalHistory for a given Crew
     *
     * @param Crew $crew
     * @return array
     */
    public function findLatestMedicalHistoryByCrew(Crew $crew): ?MedicalHistory
    {
        return $this->createQueryBuilder('m')
            ->select('m')
            ->join('m.Crew', 'c')
            ->andWhere('c = :crew')
            ->andWhere('m.deleted = :deleted')
            ->setParameter('crew', $crew->getId()->toBinary())
            ->setParameter('deleted', 0)
            ->orderBy('m.startDate', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }
//    /**
//     * @return MedicalHistory[] Returns an array of MedicalHistory objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?MedicalHistory
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
