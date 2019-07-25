<?php
// src/Controller/LuckyController.php
namespace App\Controller\Dashboard;
use App\Entity\Category;
use App\Entity\Orders;
use App\Entity\User;
use App\Entity\Product;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @IsGranted("ROLE_ADMIN")
 */
class DashboardController extends AbstractController
{
    /**
     *
     * @Route("/home", name="home")
    */
    public function index()
    {
        $categories = $this->getDoctrine()->getRepository(Category::class)
                    ->createQueryBuilder('u')
                    ->select('count(u.id)')
                    ->getQuery()
                    ->getSingleScalarResult();
        
        $orders = $this->getDoctrine()->getRepository(Orders::class)
                    ->createQueryBuilder('u')
                    ->select('count(u.id)')
                    ->getQuery()
                    ->getSingleScalarResult();
        $users = $this->getDoctrine()->getRepository(User::class)
                    ->createQueryBuilder('u')
                    ->select('count(u.id)')
                    ->getQuery()
                    ->getSingleScalarResult();
        $products = $this->getDoctrine()->getRepository(Product::class)
                    ->createQueryBuilder('u')
                    ->select('count(u.id)')
                    ->getQuery()
                    ->getSingleScalarResult();
        
        return $this->render('/dashboard/home.html.twig',
        [
          'categories' => $categories,
          'orders' => $orders,
          'users' => $users,
          'products' => $products,  
        ]);
    }
    
    
}