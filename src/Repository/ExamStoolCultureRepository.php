<?php

namespace App\Repository;

use App\Entity\ExamStoolCulture;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExamStoolCulture>
 *
 * @method ExamStoolCulture|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamStoolCulture|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamStoolCulture[]    findAll()
 * @method ExamStoolCulture[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamStoolCultureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamStoolCulture::class);
    }

    /**
     * @return Exam Object Returns an array of the exam fetched
     */
    public function findByMedicalHistoryField($medicalHistory): ?ExamStoolCulture
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
