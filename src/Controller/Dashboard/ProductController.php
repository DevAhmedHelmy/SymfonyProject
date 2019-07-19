<?php
// src/Controller/LuckyController.php
namespace App\Controller\Dashboard;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
class ProductController extends AbstractController
{
    /**
     *
     * @Route("/product", name="product_index")
    */
    public function index()
    {
    
        return $this->render('/dashboard/product/index.html.twig');
    }
    /**
     *
     * @Route("/product/create", name="product_create")
    */
    public function create()
    {
        
        return $this->render('/dashboard/product/create.html.twig');
    }
    
}