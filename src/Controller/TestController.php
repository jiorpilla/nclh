<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;

class TestController extends BaseController
{
    #[Route('/', name: 'test')]
    public function test()
    {

        $hasAccess = $this->isGranted('ROLE_ADMIN');
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
//        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();
//        dump($hasAccess);
        return $this->render('test.twig', [
        ]);
    }
}