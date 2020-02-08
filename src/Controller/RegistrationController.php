<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Form\RegisterType;
use Symfony\Component\Form\Forms;


class RegistrationController extends AbstractController
{
    
    /**
     * @Route("/register", name="register")
     */
    public function index(Request $request)
    {
       $user = new User();

       $form = $this->createForm(RegisterType::class, $user);
       $form->handleRequest($request);
       if($form->isSubmitted() && $form->isValid()){
           $manager->persist($user);
           $manager->flush();
       }
       return $this->render('registration/index.html.twig', [
           'form'=> $form->createView()
       ]);
    }
}
