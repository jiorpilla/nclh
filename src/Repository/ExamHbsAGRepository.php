<?php

namespace App\Repository;

use App\Entity\ExamHbsAG;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExamHbsAG>
 *
 * @method ExamHbsAG|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamHbsAG|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamHbsAG[]    findAll()
 * @method ExamHbsAG[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamHbsAGRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamHbsAG::class);
    }

    /**
     * @return Exam Object Returns an array of the exam fetched
     */
    public function findByMedicalHistoryField($medicalHistory): ?ExamHbsAG
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
