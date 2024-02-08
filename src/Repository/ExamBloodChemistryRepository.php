<?php

namespace App\Repository;

use App\Entity\ExamBloodChemistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExamBloodChemistry>
 *
 * @method ExamBloodChemistry|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamBloodChemistry|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamBloodChemistry[]    findAll()
 * @method ExamBloodChemistry[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamBloodChemistryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamBloodChemistry::class);
    }

    /**
     * @return Exam Object Returns an array of the exam fetched
     */
    public function findByMedicalHistoryField($medicalHistory): ?ExamBloodChemistry
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
