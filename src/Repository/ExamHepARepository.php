<?php

namespace App\Repository;

use App\Entity\ExamHepA;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExamHepA>
 *
 * @method ExamHepA|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamHepA|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamHepA[]    findAll()
 * @method ExamHepA[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamHepARepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamHepA::class);
    }

    /**
     * @return Exam Object Returns an array of the exam fetched
     */
    public function findByMedicalHistoryField($medicalHistory): ?ExamHepA
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
