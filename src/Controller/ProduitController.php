<?php

namespace App\Controller;

use App\Data\SearchData;
use App\Form\SearchForm;
use App\Repository\ProduitRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProduitController extends AbstractController
{
    /**
     * @Route("/product", name="product")
     */
    public function index(ProduitRepository $repository, Request $request)
    {
        $data= new SearchData();
        $data->page=$request->get('page',1);
        $form=$this->createForm(SearchForm::class,$data);
        $form->handleRequest($request);

        $products=$repository->findSearch($data);
        return $this->render('product/index.html.twig', [
            'product' => $products,
            'form'=>$form->createView()
        ]);
    }
}
