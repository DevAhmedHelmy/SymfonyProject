<?php
// src/Controller/LuckyController.php
namespace App\Controller\Site;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
/**
 * @IsGranted("ROLE_USER")
 */
class UserController extends AbstractController
{
   
/**
     * @Route("/acount/{id}", name="acount")
     */
    public function profile($id)
    {
        $user = $this->getDoctrine()->getRepository(User::class)->find($id);
        return $this->render('site/acount/profile.html.twig',['user'=>$user]);
    }


// function to get data in edit page to update this data
    /**
     *
     * @Route("/acount/edit/{id}", name="acount_edit")
     * 
    */
    public function edit($id)
    {
        $repository = $this->getDoctrine()->getRepository(User::class);
        $user = $repository->find($id);
        
        return $this->render('/dashboard/user/edit.html.twig',['user' => $user]);
    }

    // function to update data
    /**
     *
     * @Route("/acount/update/{id}", name="acount_update")
     *  
    */
    public function update(Request $request,$id)
    {
        // EntityManager
        $em = $this->getDoctrine()->getManager();


        $repository = $this->getDoctrine()->getRepository(User::class);
        $user = $repository->find($id);

       
        
        // to store data in user table
         
        $user->setEmail($request->request->get('email'));
        $user->setFirstName($request->request->get('name'));


        if (($request->request->get('new_password') && $request->request->get('password_confirmation')) && ($request->request->get('new_password') === $request->request->get('password_confirmation')))
        {
            $user->setPassword($this->passwordEncoder->encodePassword($user, $request->request->get('new_password')));
        }

        $user->setPhone($request->request->get('phone'));
        // $user->setImage($request->request->get('image'));
        $user->setAddress($request->request->get('address'));
        
        // $errors = $this->validator->validate($user);
        // if (count($errors) > 0) {
        //     return $this->render('/dashboard/user/edit.html.twig',['errors' => $errors]);
        // }
        
       
        $em->flush($user);
        
        // to redirectToRoute 
        return $this->redirectToRoute('site_home');
     
    }



   
    
    
}