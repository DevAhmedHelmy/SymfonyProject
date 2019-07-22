<?php
// src/Controller/LuckyController.php
namespace App\Controller\Dashboard;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
class UserController extends AbstractController
{
    /**
     *
     * @Route("/register", name="register")
    */
    public function index()
    {
    
        return $this->render('/dashboard/user/register.html.twig');
    }
    
    
}