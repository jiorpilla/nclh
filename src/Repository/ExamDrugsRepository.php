<?php

namespace App\Repository;

use App\Entity\ExamDrugs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExamDrugs>
 *
 * @method ExamDrugs|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamDrugs|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamDrugs[]    findAll()
 * @method ExamDrugs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamDrugsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamDrugs::class);
    }

    /**
     * @return Exam Object Returns an array of the exam fetched
     */
    public function findByMedicalHistoryField($medicalHistory): ?ExamDrugs
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
