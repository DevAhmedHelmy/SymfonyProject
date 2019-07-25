<?php 
namespace App\Controller\Dashboard;
use App\Entity\Product;
use App\Entity\User;
use App\Entity\Orders;
use App\Entity\ProductOrders;
use App\Entity\CartShopping;
use App\Entity\CartItems;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;
 /**
 * @IsGranted("ROLE_ADMIN")
 */

class OrderController extends AbstractController
{

  /**
   * @Route("/order/show", name="show_order")
   */
  public function show()
  {
    $orders = $this->getDoctrine()
        ->getRepository(Orders::class)
        ->findAll();

        return $this->render('dashboard/order/index.html.twig',['orders' => $orders]);
  }


 
    /**
   * @Route("/order", name="add_order")
   */
  public function store()
  {

    # Get object from doctrine manager
    $em = $this->getDoctrine()->getManager();
    # Get logged user then get his ['id']
    $user = $this->container->get('security.token_storage')->getToken()->getUser();
    
    /** Check IF user have exist cart  **/
    # select cart from database where user id equal to cureent logged user using [ findByUser() ]
    $user_cart = $this->getDoctrine()
        ->getRepository(CartShopping::class)
        ->findByUser($user);
 
        //to create order
        $createOrder = new Orders();
        $createOrder->setUser($user);
        $em->persist($createOrder);

   if ( $user_cart )
   {
       
        # Then select all user cart products to display it to user
        $user_products = $this->getDoctrine()
            ->getRepository(CartItems::class)
            ->findBy( array('cart' => $user_cart[0]->getId()) );


            $price = 0;
            $quantity = 0;

            foreach ($user_products as $product) {
              $product_id = $product->getProduct()->getId();
              $product_item = $this->getDoctrine()->getRepository(Product::class)->find($product_id);
               
              $price += $product_item->getSalePrice() *  $product->getQuantity();
              $quantity += $product->getQuantity();
              
              
         }
         
        $orders = new ProductOrders();
        $orders->setProduct($product_item);
        $orders->setOrders($createOrder);
        $orders->setQuantity($quantity);
        $orders->setPrice($price);
        $em->persist($orders);
        $em->flush();
        return $this->render('/site/cart/success.html.twig');


        



    }

     

  }
}