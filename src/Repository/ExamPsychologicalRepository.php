<?php

namespace App\Repository;

use App\Entity\ExamPsychological;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExamPsychological>
 *
 * @method ExamPsychological|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamPsychological|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamPsychological[]    findAll()
 * @method ExamPsychological[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamPsychologicalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamPsychological::class);
    }

    /**
     * @return Exam Object Returns an array of the exam fetched
     */
    public function findByMedicalHistoryField($medicalHistory): ?ExamPsychological
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
