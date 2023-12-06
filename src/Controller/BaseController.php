<?php

namespace App\Controller;

use Doctrine\ORM\Query;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BaseController extends AbstractController
{
    /**
     * limit of items in a list
     * @var int
     */
    private int $page_limit = 15;

    /*
     * $paginator -> paginator from KNP
     */
    public function __construct(private PaginatorInterface $paginator)
    {
    }

    protected function getPageLimit():int
    {
        return $this->page_limit;
    }

    protected function paginate(Query $query, int $page): ?PaginationInterface
    {
        return $this->paginator->paginate(
            $query,
            $page,
            $this->getPageLimit(),
        );
    }
}