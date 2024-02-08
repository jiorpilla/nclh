<?php

namespace App\Repository;

use App\Entity\ExamCBC;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExamCBC>
 *
 * @method ExamCBC|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamCBC|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamCBC[]    findAll()
 * @method ExamCBC[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamCBCRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamCBC::class);
    }

    /**
     * @return Exam Object Returns an array of the exam fetched
     */
    public function findByMedicalHistoryField($medicalHistory): ?ExamCBC
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
