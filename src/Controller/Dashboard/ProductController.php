<?php
// src/Controller/LuckyController.php
namespace App\Controller\Dashboard;

use App\Entity\Product;
use App\Entity\Category;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Gedmo\Sluggable\Util\Urlizer;
class ProductController extends AbstractController
{
    private $validator;


    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

     /**
      *
      * @Route("/product", name="product_index")
      *  
     */
     public function index()
     {
    
        $products = $this->getDoctrine()->getRepository(Product::class)->findAll();
        
        return $this->render('/dashboard/product/index.html.twig',['products' => $products]);
     }



     
    /**
     * @Route("/product/create", name="product_create")
     *  
     */
    public function create()
    {
        $repository = $this->getDoctrine()->getRepository(Category::class);
        $categories = $repository->findAll();
    
        return $this->render('/dashboard/product/create.html.twig',['categories' => $categories]);
     
    }



    /**
     * @Route("/product/store", name="product_store")
     *  
     */
    public function store(Request $request )
    {
          
        if ($request->isMethod('POST')) {
            return $this->doStore($request);
        }
        return $this->render('dashboard/product/create.html.twig', [
            'errors' => [],
        ]);
     
    }

    private function doStore(Request $request)
    {
        
        // EntityManager
        $em = $this->getDoctrine()->getManager();
        // to get category
        $category = $this->getDoctrine()->getRepository(Category::class)->find($request->request->get("category_id"));

        // to store data in category table
        $product = new Product();
        $product->setName($request->request->get("name"));
        $product->setDescription($request->request->get("description")); 
        $product->setPurchasePrice($request->request->get("purchase_price"));
        $product->setSalePrice($request->request->get("sale_price")); 
        $product->setStock($request->request->get("stock"));
        
        
       /** @var UploadedFile $uploadedFile */
       $uploadedFile = $request->files->get('image');
       $destination = $this->getParameter('kernel.project_dir').'/public/image/upload/';
       $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
       $newFilename = Urlizer::urlize($originalFilename).'-'.uniqid().'.'.$uploadedFile->guessExtension();
       $uploadedFile->move(
           $destination,
           $newFilename
       );
       
             

            $product->setImage($newFilename);

            $product->setCategoryId($category);
        // $errors = $this->validator->validate($product);
        // if (count($errors) > 0) {
        //     return $this->render('/dashboard/product/create.html.twig',['errors' => $errors]);
        // }
        
        $em->persist($product);
        $em->flush();
        
        // to redirectToRoute 
        return $this->redirectToRoute('product_index');
    }



     // function to get data in edit page to update this data
    /**
     *
     * @Route("/product/edit/{id}", name="product_edit")
     * @Method({"GET"})
    */
    public function edit($id)
    {
        $repository = $this->getDoctrine()->getRepository(Product::class);
        $product = $repository->find($id);
        
        return $this->render('/dashboard/product/edit.html.twig',['product' => $product]);
    }


    // function to update data
    /**
     *
     * @Route("/product/update/{id}", name="product_update")
     * @Method({"POST"})
    */
    public function update(Request $request,$id)
    {
        // EntityManager
        $em = $this->getDoctrine()->getManager();


        $repository = $this->getDoctrine()->getRepository(Product::class);
        $product = $repository->find($id);

        // to get category
        $category = $this->getDoctrine()->getRepository(Category::class)->find($request->request->get("category_id"));

        // to store data in category table
         
        $product->setName($request->request->get("name"));
        $product->setDescription($request->request->get("description")); 
        $product->setPurchasePrice($request->request->get("purchase_price"));
        $product->setSalePrice($request->request->get("sale_price")); 
        $product->setStock($request->request->get("stock"));
        $product->setImage($request->request->get("image")); 
        $product->setCategoryId($category);
        
        $errors = $this->validator->validate($product);
        if (count($errors) > 0) {
            return $this->render('/dashboard/product/create.html.twig',['errors' => $errors]);
        }
        
       
        $em->flush($product);
        
        // to redirectToRoute 
        return $this->redirectToRoute('product_index');
     
    }


    // function to delee data from database
    /**
     *
     * @Route("/product/delete/{id}", name="product_delete")
    */
    public function destroy(Request $request, EntityManagerInterface $em, $id)
    {
        $repository = $this->getDoctrine()->getRepository(Product::class);
        $product = $repository->find($id);
        $em->remove($product);
        $em->flush();
        return $this->redirectToRoute('product_index');
     
    }
}