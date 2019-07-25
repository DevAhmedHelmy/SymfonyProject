<?php
// src/Controller/LuckyController.php
namespace App\Controller\Site;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
class PagesController extends AbstractController
{
    /**
     * @Route("/about", name="about")
     */
    
    public function about()
    {
        return $this->render('site/about/index.html.twig');
    }



    /**
     * @Route("/contact", name="contact")
     */
    
    public function contact()
    {
        return $this->render('site/contact/index.html.twig');
    }
    

}