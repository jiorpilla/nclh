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

    /**
     * the home will always be set as the first instance unless overridden
     * @var array
     */
    public $breadcrumbs = [];

    /*
     * $paginator -> paginator from KNP
     */
    public function __construct(private PaginatorInterface $paginator)
    {
        $this->breadcrumbs[] = ['name' => 'Home', 'path' => 'dashboard'];
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