<?php

namespace App\Repository;

use App\Entity\ExamHIV;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExamHIV>
 *
 * @method ExamHIV|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamHIV|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamHIV[]    findAll()
 * @method ExamHIV[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamHIVRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamHIV::class);
    }

    /**
     * @return Exam Object Returns an array of the exam fetched
     */
    public function findByMedicalHistoryField($medicalHistory): ?ExamHIV
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
