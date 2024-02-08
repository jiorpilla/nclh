<?php

namespace App\Repository;

use App\Entity\ExamRPR;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExamRPR>
 *
 * @method ExamRPR|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamRPR|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamRPR[]    findAll()
 * @method ExamRPR[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamRPRRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamRPR::class);
    }

    /**
     * @return Exam Object Returns an array of the exam fetched
     */
    public function findByMedicalHistoryField($medicalHistory): ?ExamRPR
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
