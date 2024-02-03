<?php

namespace App\Repository;

use App\Entity\Crew;
use App\Entity\MedicalHistory;
use App\Utils\Traits\CommonRepositoryTrait;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Uid\Ulid;

/**
 * @extends ServiceEntityRepository<Crew>
 *
 * @method Crew|null find($id, $lockMode = null, $lockVersion = null)
 * @method Crew|null findOneBy(array $criteria, array $orderBy = null)
 * @method Crew[]    findAll()
 * @method Crew[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CrewRepository extends ServiceEntityRepository
{
    use CommonRepositoryTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Crew::class);
    }

    public function getListQuery()
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.deleted = :deleted')
            ->setParameter('deleted', 0)
            ->orderBy('c.id_number', 'DESC')
            ->getQuery();
    }

    public function findExistingCrewByAttributes(array $attributes): ?Crew
    {
        $queryBuilder = $this->createQueryBuilder('c');
        $whereConditions = [];

        foreach (['email', 'passport_number', 'seaman_book_number'] as $attribute) {
            if ($attributes[$attribute] !== null) {
                $whereConditions[] = sprintf('c.%s = :%s', $attribute, $attribute);
                $queryBuilder->setParameter($attribute, $attributes[$attribute]);
            }
        }

        if (!empty($whereConditions)) {
            $queryBuilder->where(implode(' AND ', $whereConditions));
        }

        return $queryBuilder->getQuery()->getOneOrNullResult();

    }

    /**
     * Fetch connected Current 'Appointment'/MedicalHistory for a given Crew
     *
     * @param Crew $crew
     * @return array
     */
    public function findActiveMedicalHistoryByCrew(Crew $crew): Crew
    {
        return $this->createQueryBuilder('c')
            ->select('c')
            ->join('c.medicalHistory', 'm')
            ->join('c.appointments', 'a')
            ->andWhere('c = :crew')
            ->andWhere('m.status NOT IN (:status)')
            ->setParameter('crew', $crew->getId()->toBinary())
            ->setParameter('status', [MedicalHistory::STATUS_CLOSED_PASS, MedicalHistory::STATUS_CLOSED_FAIL])
            ->getQuery()
            ->getOneOrNullResult();

//        return $this->createQueryBuilder('c')
//            ->select('c, m, a')
//            ->innerJoin('App\Entity\Appointment', 'a', 'WITH', 'a.Crew = c')
//            ->innerJoin('App\Entity\MedicalHistory', 'm', 'WITH', 'm.Crew = c')
//            ->andWhere('a.deleted = :appointmentDeleted')
//            ->andWhere('m.deleted = :medicalHistoryDeleted')
//            ->andWhere('c = :crew')
//            ->orderBy('a.appointmentDate', 'ASC')
//            ->setParameter('appointmentDeleted', 0)
//            ->setParameter('medicalHistoryDeleted', 0)
//            ->setParameter('crew', $crew->getId()->toBinary())
//            ->getQuery()
//            ->getResult();
    }

    /**
     * Fetch connected MedicalHistory for a given Crew
     *
     * @param Crew $crew
     * @return array
     */
    public function findMedicalHistoryByCrew(Crew $crew): array
    {
        return $this->createQueryBuilder('c')
            ->select(['c', 'm'])
            ->join('c.medicalHistory', 'm')
            ->andWhere('c = :crew')
            ->andWhere('m.status IN (:status)')
            ->setParameter('crew', $crew->getId()->toBinary())
            ->setParameter('status', [MedicalHistory::STATUS_CLOSED_PASS, MedicalHistory::STATUS_CLOSED_FAIL])
            ->getQuery()
            ->getResult();
    }

//    /**
//     * @return Crew[] Returns an array of Crew objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Crew
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
