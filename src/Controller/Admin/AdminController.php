<?php

namespace App\Controller\Admin;

use App\Controller\BaseController;
use Endroid\QrCode\Builder\BuilderInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Uid\NilUlid;
use Symfony\Component\Uid\Ulid;

#[Route('/admin', name: 'admin_')]
class AdminController extends BaseController
{
    #[Route('/', name: 'test')]
    public function test():Response
    {

        $ulid = new Ulid();
        $ulid2 = new NilUlid(); //null

        $param['toBinary'] = $ulid->toBinary();  // string(16) "\x01\x71\x06\x9d\x59\x3d\x97\xd3\x8b\x3e\x23\xd0\x6d\xe5\xb3\x08"
        $param['toBase32'] = $ulid->toBase32();  // string(26) "01E439TP9XJZ9RPFH3T1PYBCR8"
        $param['toBase58'] = $ulid->toBase58();  // string(22) "1BKocMc5BnrVcuq2ti4Eqm"
        $param['toRfc4122'] = $ulid->toRfc4122(); // string(36) "0171069d-593d-97d3-8b3e-23d06de5b308"
        $param['toHex'] = $ulid->toHex();     // string(34) "0x0171069d593d97d38b3e23d06de5b308"

        echo "<pre>";
        print_r($ulid);
        echo "</pre>";

        return $this->render('admin/admin_test.twig', [
            'id' => $ulid,
            'id2' => $ulid2
        ]);
    }

    #[Route('/qr' ,name: 'qr')]
    public function qrShow(BuilderInterface $customQrCodeBuilder): Response
    {
//        $result = $customQrCodeBuilder
//            ->data('000001')
//            ->build();
//
//
//        $response = new QrCodeResponse($result);

//        return $response;
        return  $this->render('admin/qr.twig', [
//            'result' => $result,
//            'qr' => $result->getImage(),
//            'r_qr' => $response
        ]);
    }

    #[Route('/webcam' ,name: 'webcam')]
    public function webcam(): Response
    {
        return  $this->render('admin/webcam.twig', [
        ]);
    }
}