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
     * @Route("/category", name="category_index")
    */
    public function index()
    {
    
        return $this->render('/dashboard/category/index.html.twig');
    }
    /**
     *
     * @Route("/category/create", name="category_create")
    */
    public function create()
    {
        
        return $this->render('/dashboard/category/create.html.twig');
    }
    
}