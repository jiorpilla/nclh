<?php

namespace App\Repository;

use App\Entity\ExamBloodType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExamBloodType>
 *
 * @method ExamBloodType|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamBloodType|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamBloodType[]    findAll()
 * @method ExamBloodType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamBloodTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamBloodType::class);
    }

    /**
     * @return Exam Object Returns an array of the exam fetched
     */
    public function findByMedicalHistoryField($medicalHistory): ?ExamBloodType
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
