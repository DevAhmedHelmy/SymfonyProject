<?php
// src/Controller/LuckyController.php
namespace App\Controller\Dashboard;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
class DashboardController extends AbstractController
{
    /**
     *
     * @Route("/home", name="home")
    */
    public function index()
    {
    
        return $this->render('/dashboard/home.html.twig');
    }
    
    
}