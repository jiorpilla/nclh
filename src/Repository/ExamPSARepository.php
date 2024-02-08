<?php

namespace App\Repository;

use App\Entity\ExamPSA;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExamPSA>
 *
 * @method ExamPSA|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamPSA|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamPSA[]    findAll()
 * @method ExamPSA[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamPSARepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamPSA::class);
    }

    /**
     * @return Exam Object Returns an array of the exam fetched
     */
    public function findByMedicalHistoryField($medicalHistory): ?ExamPSA
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
