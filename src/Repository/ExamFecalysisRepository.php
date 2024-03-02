<?php

namespace App\Repository;

use App\Entity\ExamFecalysis;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExamFecalysis>
 *
 * @method ExamFecalysis|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamFecalysis|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamFecalysis[]    findAll()
 * @method ExamFecalysis[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamFecalysisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamFecalysis::class);
    }

    /**
     * @return Exam Object Returns an array of the exam fetched
     */
    public function findByMedicalHistoryField($medicalHistory): ?ExamFecalysis
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
