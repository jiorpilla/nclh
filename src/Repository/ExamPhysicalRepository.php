<?php

namespace App\Repository;

use App\Entity\ExamPhysical;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExamPhysical>
 *
 * @method ExamPhysical|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamPhysical|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamPhysical[]    findAll()
 * @method ExamPhysical[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamPhysicalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamPhysical::class);
    }

    /**
     * @return Exam Object Returns an array of the exam fetched
     */
    public function findByMedicalHistoryField($medicalHistory): ?ExamPhysical
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
