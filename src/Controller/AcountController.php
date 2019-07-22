<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @IsGranted("ROLE_USER")
 */
class AcountController extends AbstractController
{
    /**
     * @Route("/acount", name="acount")
     */
    public function index()
    {
        return $this->render('acount/index.html.twig', [
            'controller_name' => 'AcountController',
        ]);
    }
}
