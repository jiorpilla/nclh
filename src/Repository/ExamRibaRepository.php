<?php

namespace App\Repository;

use App\Entity\ExamRiba;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExamRiba>
 *
 * @method ExamRiba|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamRiba|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamRiba[]    findAll()
 * @method ExamRiba[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamRibaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamRiba::class);
    }

    /**
     * @return Exam Object Returns an array of the exam fetched
     */
    public function findByMedicalHistoryField($medicalHistory): ?ExamRiba
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
