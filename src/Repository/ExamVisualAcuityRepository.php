<?php

namespace App\Repository;

use App\Entity\ExamVisualAcuity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExamVisualAcuity>
 *
 * @method ExamVisualAcuity|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamVisualAcuity|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamVisualAcuity[]    findAll()
 * @method ExamVisualAcuity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamVisualAcuityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamVisualAcuity::class);
    }

    /**
     * @return Exam Object Returns an array of the exam fetched
     */
    public function findByMedicalHistoryField($medicalHistory): ExamVisualAcuity
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
