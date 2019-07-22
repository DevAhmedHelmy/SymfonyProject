<?php
// src/Controller/LuckyController.php
namespace App\Controller\Site;
use App\Entity\Product;
use App\Entity\Category;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
class CardController extends AbstractController
{
    
    
    /**
     *
     * @Route("/cart", name="user_cart")
    */
    public function cart()
    {
        return $this->render('/site/cart/index.html.twig');
    }
    
    
    
}