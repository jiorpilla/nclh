<?php

namespace App\Repository;

use App\Entity\ExamChestXray;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExamChestXray>
 *
 * @method ExamChestXray|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamChestXray|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamChestXray[]    findAll()
 * @method ExamChestXray[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamChestXrayRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamChestXray::class);
    }

    /**
     * @return Exam Object Returns an array of the exam fetched
     */
    public function findByMedicalHistoryField($medicalHistory): ?ExamChestXray
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
