<?php

namespace App\Repository;

use App\Entity\ExamEKG;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExamEKG>
 *
 * @method ExamEKG|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamEKG|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamEKG[]    findAll()
 * @method ExamEKG[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamEKGRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamEKG::class);
    }

    /**
     * @return Exam Object Returns an array of the exam fetched
     */
    public function findByMedicalHistoryField($medicalHistory): ?ExamEKG
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
