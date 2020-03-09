<?php

namespace App\Controller;

use App\Entity\Newsletter;
use App\Form\NewsletterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewsletterController extends AbstractController
{
    /**
     * @Route("/newsletter/subscribe", name="subscribe")
     */
    public function subscribe(Request $request, EntityManagerInterface $manager): Response
    {
        $newsletter = new Newsletter();
        $form = $this->createForm(NewsletterType::class, $newsletter);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $newsletter->setDate(new \DateTime());
            $manager->persist($newsletter);
            $manager->flush();
            return $this->redirectToRoute("home");
        } else {
            return $this->render("newsletter/subscribe.html.twig", [
                "form" => $form->createView()
            ]);
        }
    }
}
