<?php

namespace App\Utils\Traits;

trait CommonRepositoryTrait
{

    // Override the findAll method
    public function findAll()
    {
        // You can customize this query to fit your entity's structure
        return $this->createQueryBuilder('e')
            ->andWhere('e.deleted = :deleted')
            ->setParameter('deleted', 0)
            ->getQuery()
            ->getResult();
    }
}