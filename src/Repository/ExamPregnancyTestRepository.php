<?php

namespace App\Repository;

use App\Entity\ExamPregnancyTest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExamPregnancyTest>
 *
 * @method ExamPregnancyTest|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamPregnancyTest|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamPregnancyTest[]    findAll()
 * @method ExamPregnancyTest[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamPregnancyTestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamPregnancyTest::class);
    }

    /**
     * @return Exam Object Returns an array of the exam fetched
     */
    public function findByMedicalHistoryField($medicalHistory): ?ExamPregnancyTest
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
