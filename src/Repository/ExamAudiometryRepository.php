<?php

namespace App\Repository;

use App\Entity\ExamAudiometry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExamAudiometry>
 *
 * @method ExamAudiometry|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamAudiometry|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamAudiometry[]    findAll()
 * @method ExamAudiometry[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamAudiometryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamAudiometry::class);
    }

    /**
     * @return Exam Object Returns an array of the exam fetched
     */
    public function findByMedicalHistoryField($medicalHistory): ?ExamAudiometry
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
