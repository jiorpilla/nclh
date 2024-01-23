<?php

namespace App\Repository;

use App\Entity\Crew;
use App\Utils\Traits\CommonRepositoryTrait;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Uid\Ulid;

/**
 * @extends ServiceEntityRepository<Crew>
 *
 * @method Crew|null find($id, $lockMode = null, $lockVersion = null)
 * @method Crew|null findOneBy(array $criteria, array $orderBy = null)
 * @method Crew[]    findAll()
 * @method Crew[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CrewRepository extends ServiceEntityRepository
{
    use CommonRepositoryTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Crew::class);
    }

    public function getListQuery()
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.deleted = :deleted')
            ->setParameter('deleted', 0)
            ->orderBy('c.id_number', 'DESC')
            ->getQuery();
    }

    public function findExistingCrewByAttributes(array $attributes): ?Crew
    {
        $queryBuilder = $this->createQueryBuilder('c');
        $whereConditions = [];

        foreach (['email', 'passport_number', 'seaman_book_number'] as $attribute) {
            if ($attributes[$attribute] !== null) {
                $whereConditions[] = sprintf('c.%s = :%s', $attribute, $attribute);
                $queryBuilder->setParameter($attribute, $attributes[$attribute]);
            }
        }

        if (!empty($whereConditions)) {
            $queryBuilder->where(implode(' AND ', $whereConditions));
        }

        return $queryBuilder->getQuery()->getOneOrNullResult();

    }

//    /**
//     * @return Crew[] Returns an array of Crew objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Crew
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
