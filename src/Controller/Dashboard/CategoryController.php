<?php
// src/Controller/LuckyController.php
namespace App\Controller\Dashboard;
 
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Task;
class CategoryController extends AbstractController
{
    /**
     *
     * @Route("/category", name="category_index")
    */
    public function index()
    {
    
        return $this->render('/dashboard/category/index.html.twig');
    }
    /**
     *
     * @Route("/category/create", name="category_create")
    */
    public function create()
    {
        // creates a task and gives it some dummy data for this example
        $task = new Task();
        $task->setTask('Write a blog post');
        $task->setDueDate(new \DateTime('tomorrow'));

        $form = $this->createFormBuilder($task)
            ->add('task', TextType::class)
            ->add('dueDate', DateType::class)
            ->add('save', SubmitType::class, ['label' => 'Create Task'])
            ->getForm();

        return $this->render('/dashboard/category/create.html.twig', [
            'form' => $form->createView(),
        ]);
     
    }
    
}