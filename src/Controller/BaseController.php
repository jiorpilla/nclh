<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BaseController extends AbstractController
{
    /**
     * limit of items in a list
     * @var int
     */
    private int $page_limit = 15;

    protected function getPageLimit()
    {
        return $this->page_limit;
    }
}