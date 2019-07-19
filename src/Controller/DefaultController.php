<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
class DefaultController extends AbstractController
{
    /**
     *
     * @Route("/", name="store_index")
    */
    public function index()
    {
    
        return $this->render('/dashboard/product/index.html.twig');
    }
    /**
     *
     * @Route("/add", name="store_add")
    */
    public function add()
    {
        
        return new Response(
            "hello in add method"
        );
    }
    
}