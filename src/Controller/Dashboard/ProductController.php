<?php
// src/Controller/LuckyController.php
namespace App\Controller\Dashboard;

use App\Entity\Product;
use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;
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
     * @Route("/product", name="create_product")
     */
    public function create()
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();
        $category = new Category();
        $product = new Product();
        $product->setName('Keyboard');
        $product->setSalePrice(300);
        $product->setPurchasePrice(200);
        $product->setDescription('Ergonomic and stylish!');
        $product->setStock(300);
        $category->addProduct(1);
        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$product->getId());
        
        // return $this->render('/dashboard/product/create.html.twig');
    }
    
}