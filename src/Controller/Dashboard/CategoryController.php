<?php
// src/Controller/LuckyController.php
namespace App\Controller\Dashboard;
 
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
use App\Entity\Category;
class CategoryController extends AbstractController
{



    private $validator;


    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }


    // function to view all data in category table
    /**
     *
     * @Route("/category", name="category_index")
    */
    public function index(EntityManagerInterface $em)
    {
        $repository = $this->getDoctrine()->getRepository(Category::class);
        $categories = $repository->findAll();
    
        return $this->render('/dashboard/category/index.html.twig',['categories' => $categories]);
    }

    // function to view create page
    /**
     *
     * @Route("/category/create", name="category_create")
     * @Method({"GET"})
    */
    public function create()
    {
        // creates a task and gives it some dummy data for this example
        return $this->render('/dashboard/category/create.html.twig');
     
    }


    // function to store data 
     /**
     *
     * @Route("/category/store", name="category_store")
     *
    */
    public function store(Request $request )
    {
          
        

        if ($request->isMethod('POST')) {
            return $this->doStore($request);
        }
        return $this->render('dashboard/category/create.html.twig', [
            'errors' => [],
        ]);
     
    }

    private function doStore(Request $request)
    {
        // EntityManager
        $em = $this->getDoctrine()->getManager();
        
        // to store data in category table
        $category = new Category();
        $category->setName($request->request->get("name"));
        $category->setDescription($request->request->get("description")); 


        $errors = $this->validator->validate($category);
        if (count($errors) > 0) {
            return $this->render('/dashboard/category/create.html.twig',['errors' => $errors]);
        }


        $em->persist($category);
        $em->flush();
        
        // to redirectToRoute 
        return $this->redirectToRoute('category_index');
    }
    


    // function to get data in edit page to update this data
    /**
     *
     * @Route("/category/edit/{id}", name="category_edit")
     * @Method({"GET"})
    */
    public function edit($id)
    {
        $repository = $this->getDoctrine()->getRepository(Category::class);
        $category = $repository->find($id);
        return $this->render('/dashboard/category/edit.html.twig',['category' => $category]);
    }


    // function to update data
    /**
     *
     * @Route("/category/update/{id}", name="category_update")
     * @Method({"POST"})
    */
    public function update(Request $request, EntityManagerInterface $em,$id)
    {
        $repository = $this->getDoctrine()->getRepository(Category::class);
        $category = $repository->find($id);
        $category->setName($request->request->get('name'));
        $category->setDescription($request->request->get('description')); 
        $em->flush($category);
        return $this->redirectToRoute('category_index');
     
    }


    // function to delee data from database
    /**
     *
     * @Route("/category/delete/{id}", name="category_delete")
    */
    public function destroy(Request $request, EntityManagerInterface $em, $id)
    {
        $repository = $this->getDoctrine()->getRepository(Category::class);
        $category = $repository->find($id);
        $em->remove($category);
        $em->flush();
        return $this->redirectToRoute('category_index');
     
    }
}