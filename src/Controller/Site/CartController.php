<?php
// src/Controller/LuckyController.php
namespace App\Controller\Site;
use App\Entity\Product;
use App\Entity\User;
use App\Entity\CartShopping;
use App\Entity\CartItems;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;
class CartController extends AbstractController
{
    
    
    /**
   * @Route("/cart", name="view_cart")
   */
  public function showAction()
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

     if ( $user_cart )
     {
          # Then select all user cart products to display it to user
          $user_products = $this->getDoctrine()
              ->getRepository(CartItems::class)
              ->findBy( array('cart' => $user_cart[0]->getId()) );
          # pass selected products to the twig page to show them
         return $this->render('site/cart/index.html.twig', array(
            'products'  => $user_products,
            'cart_data' => $user_cart[0],   
        ));
      }
     //return new Response(''. $user_products[0]->getProduct()->getPrice() );

     # pass selected products to the twig page to show them
       return $this->render('site/cart/index.html.twig');
  }

   /**
   * @Route("/cart/addTo/{productId}", name="add_to_cart")
   */
  public function addAction($productId)
  {

     # First of all check if user logged in or not by using FOSUSERBUNDLE
     #    authorization_checker
     # if user logged in so add the selected product to his cart and redirect user to products page
     # else redirect user to login page to login first or create a new account
     $securityContext = $this->container->get('security.authorization_checker');

     # If user logged in
     if ( $securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED') )
     {
         # Get object from doctrine manager
         $em = $this->getDoctrine()->getManager();
         # Get logged user then get his ['id']
         $user = $this->container->get('security.token_storage')->getToken()->getUser();

         # for any case wewill need to select product so select it first
         # select specific product which have passed id using ['find(passedID)']
         $product = $this->getDoctrine()
                       ->getRepository(Product::class)
                       ->find($productId);

         /** Check IF user have exist cart  **/
         # select cart from database where user id equal to cureent logged user using [ findByUser() ]
         $exsit_cart = $this->getDoctrine()
             ->getRepository(CartShopping::class)
             ->findByUser($user);

           # if there's no cart to this user create a new one
           if ( !$exsit_cart )
           {
               # defince cart object
               $cart = new CartShopping();
               # set user whose own this cart
               $cart->setUser($user);
               
               # set initail total price for cart which equal to product price
               $cart->setTotalPrice($product->getSalePrice());

               # persist all cart data to can use it in create shipping object
               $em->persist($cart);
               # flush it
               $em->flush();

               # create CartItems object
               $ship = new CartItems();
               # set all its data quantity initail equal to 1 and passed product and cart created
               $ship->setQuantity(1);
               $ship->setProduct($product);
               $ship->setCart($cart);

               # persist it and flush doctrine to save it
               $em->persist($ship);
               $em->flush();
           }
           # if user have one so just add new item price to cart price and add it to shipping
           else
           {
               # Get cart from retrived object
               $cart = $exsit_cart[0];
               
               # set initail total price for cart which equal to product price
               $cart->setTotalPrice($cart->getTotalPrice() + $product->getSalePrice());

               # persist all cart data to can use it in create shipping object
               $em->persist($cart);
               # flush it
               $em->flush();

               # create shipping object
               $ship = new CartItems();
               # set all its data quantity initail equal to 1 and passed product and cart created
               $ship->setQuantity(1);
               $ship->setProduct($product);
               $ship->setCart($cart);

               # persist it and flush doctrine to save it
               $em->persist($ship);
               $em->flush();
           }

         //return new Response('user id  '.$product->getId());
         return $this->redirect($this->generateUrl('site_home'));
     }
     # if user not logged in yet
     else 
     {
         # go to adding product form
         return $this->redirect($this->generateUrl('app_login'));
     }
  }
    









  // Edit from cart Shopping
  /**
  * @Route("/cart/edit/{itemProduct}/{itemCart}", name="edit_item")
  */
  public function editActione(Request $request, $itemProduct, $itemCart)
  {
     # in the start check if user edit field and click on button
     if ( $request->getMethod() === 'POST' )
     {
         # read data from quantity field
         $new_quantity =$request->request->get('quantity');

         # get oject from doctrine manager to mange operation
         $em = $this->getDoctrine()->getManager();
         $repository = $em->getRepository(CartItems::class);

         # select wanted item from shipping table to edit it
         $ship = $repository->findOneBy(array('product' => $itemProduct, 'cart' => $itemCart));

       # check if new quantity less than old one so subtract total price
         # otherwise, add to it
        if( $ship->getQuantity() < $new_quantity )
        {
           # edit selected item quantity
           $ship->setQuantity($new_quantity);

           # Calculate the new total price for cart by sum added item price to total one
           $final_price = $ship->getCart()->getTotalPrice() + $ship->getProduct()->getSalePrice();

           # update the total price of cart
           $ship->getCart()->setTotalPrice($final_price); 
         }
         elseif( $ship->getQuantity() > $new_quantity )
         {
           # edit selected item quantity
           $ship->setQuantity($new_quantity);

           # Calculate the new total price for cart by sum added item price to total one
           $final_price = $ship->getCart()->getTotalPrice() - $ship->getProduct()->getSalePrice();

           # update the total price of cart
           $ship->getCart()->setTotalPrice($final_price); 
         }

         # flush operations to update database
         $em->flush();
     }
     //return new Response(''. $new_quantity );
     return $this->redirect($this->generateUrl('view_cart'));
  }


    /**
   * @Route("/cart/remove/{itemProduct}/{itemCart}", name="remove_item")
   */
  public function removeActione($itemProduct, $itemCart)
  {
     # get an object from doctrine db and get Shipping Entity to work on it
     $em = $this->getDoctrine()->getManager();
     $repository = $em->getRepository(CartItems::class);

     # select wanted item from shipping table to delete it
     $ship = $repository->findOneBy(array('product' => $itemProduct, 'cart' => $itemCart));

     # Calculate the new total price for cart by subtract deleted item price from total one
      $final_price = $ship->getCart()->getTotalPrice() - ($ship->getProduct()->getSalePrice() * $ship->getQuantity());

      # update the total price of cart
      $ship->getCart()->setTotalPrice($final_price); 

      # Remove item from db
     $em->remove($ship);
     $em->flush();

     return $this->redirect($this->generateUrl('view_cart'));
  }
    
    
}