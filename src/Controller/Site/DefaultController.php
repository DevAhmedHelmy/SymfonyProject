<?php
// src/Controller/LuckyController.php
namespace App\Controller\Site;
use App\Entity\Product;
use App\Entity\Category;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
class DefaultController extends AbstractController
{
    /**
     *
     * @Route("/", name="site_home")
     * 
    */
    public function index()
    {
        // $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $products = $this->getDoctrine()->getRepository(Product::class)->findAll();
    
        return $this->render('/site/home/index.html.twig',['products' => $products]);
    }
    
    /**
     *
     * @Route("/cart", name="client_cart")
    */
    public function cart()
    {
        return $this->render('/site/cart/index.html.twig');
    }
    
    
    
}