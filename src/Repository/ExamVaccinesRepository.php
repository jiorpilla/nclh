<?php

namespace App\Repository;

use App\Entity\ExamVaccines;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExamVaccines>
 *
 * @method ExamVaccines|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamVaccines|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamVaccines[]    findAll()
 * @method ExamVaccines[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamVaccinesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamVaccines::class);
    }

    /**
     * @return Exam Object Returns an array of the exam fetched
     */
    public function findByMedicalHistoryField($medicalHistory): ?ExamVaccines
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.MedicalHistory = :val')
            ->andWhere('e.deleted = :deleted')
            ->setParameter('val', $medicalHistory->getId()->toBinary())
            ->setParameter('deleted', 0)
            ->getQuery()
            ->getOneOrNullResult()
            ;
    }
}
