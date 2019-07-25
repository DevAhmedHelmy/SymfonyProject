<?php

namespace App\Controller\Dashboard\Security;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Entity\User;
use App\Messages\UserRegister;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Gedmo\Sluggable\Util\Urlizer;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class RegisterController extends AbstractController
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;
    /**
     * @var ValidatorInterface
     */
        private $validator;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder, ValidatorInterface $validator)
    {
        $this->passwordEncoder = $passwordEncoder;
        $this->validator = $validator;
    }



    /**
     * @Route("dash/register", name="dash_register")
     */
    public function index()
    {
        return $this->render('dashboard/security/register.html.twig');
    }

     /**
     * @Route("/dashboard/register", name="dashboard_register")
     */

    public function register(Request $request)
    {
       if ($request->isMethod('POST')) {
           return $this->doRegister($request);
           
          
       }
       return $this->render('dashboard/security/register.html.twig', [
           'errors' => [],
       ]);
    }

    private function doRegister(Request $request)
   {
    
       
       
        // EntityManager
       $em = $this->getDoctrine()->getManager();

       
        $user = new User();
        $user->setEmail($request->request->get('email'));
        $user->setFirstName($request->request->get('name'));
        $user->setPassword($this->passwordEncoder->encodePassword($user, $request->request->get('password')));
        $user->setPhone($request->request->get('phone'));
        // $user->setImage($request->request->get('image'));
        $user->setAddress($request->request->get('address'));



    
        /** @var UploadedFile $uploadedFile */
        $uploadedFile = $request->files->get('image');
        $destination = $this->getParameter('kernel.project_dir').'/public/upload';
        $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
        $newFilename = Urlizer::urlize($originalFilename).'-'.uniqid().'.'.$uploadedFile->guessExtension();
        $uploadedFile->move(
            $destination,
            $newFilename
        );
        $user->setImage($newFilename);
        
    //    $user->generateToken();
       $errors = $this->validator->validate($user);
       if (count($errors) > 0) {
           return $this->render('dashboard/security/register.html.twig', [
               'errors' => $errors,
           ]);
       }
       $em->persist($user);
       $em->flush();
       return $this->redirectToRoute('home');
   }
}
