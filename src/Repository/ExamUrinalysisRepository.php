<?php

namespace App\Repository;

use App\Entity\ExamUrinalysis;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExamUrinalysis>
 *
 * @method ExamUrinalysis|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamUrinalysis|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamUrinalysis[]    findAll()
 * @method ExamUrinalysis[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamUrinalysisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamUrinalysis::class);
    }

    /**
     * @return Exam Object Returns an array of the exam fetched
     */
    public function findByMedicalHistoryField($medicalHistory): ?ExamUrinalysis
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
