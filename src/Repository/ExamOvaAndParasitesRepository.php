<?php

namespace App\Repository;

use App\Entity\ExamOvaAndParasites;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExamOvaAndParasites>
 *
 * @method ExamOvaAndParasites|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamOvaAndParasites|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamOvaAndParasites[]    findAll()
 * @method ExamOvaAndParasites[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamOvaAndParasitesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamOvaAndParasites::class);
    }

    /**
     * @return Exam Object Returns an array of the exam fetched
     */
    public function findByMedicalHistoryField($medicalHistory): ?ExamOvaAndParasites
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
