<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Administrateur;
use App\Form\RegistrationType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;
use Symfony \Bundle\FrameworkBunble\Controller\Controller;

class SecurityController extends AbstractController
{
    /**
     * @Route("/inscription", name="security_registration")
     */
    public function registration(Request $request, EntityManagerInterface $manager, UserPasswordEncoderInterface $encoder){

        $admin=new Administrateur();
        $form=$this->createForm(RegistrationType::class,$admin);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $hash=$encoder->encodePassword($admin, $admin->getPassword());
            $admin->setPassword($hash);
            $manager->persist($admin);
            $manager->flush();

            return $this->redirectToRoute("security_login");
        }
        return $this->render('security/registration.html.twig',['form'=>$form->createView()
        ]);

    }
    /**
     * @Route("/connexion", name="security_login")
     * */
    public function login(){
        return $this->render('security/login.html.twig');
    }
    /**
     * @Route ("/deconnexion", name="security_logout")
     *
     * */
    public function logout(){}

}