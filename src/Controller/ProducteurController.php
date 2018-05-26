<?php

namespace App\Controller;

use App\Entity\Producteur;
use App\Form\ProducteurType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/producteur")
 */
class ProducteurController extends Controller
{
    /**
     * @Route("/", name="producteur_index", methods="GET")
     */
    public function index(): Response
    {
        $producteurs = $this->getDoctrine()
            ->getRepository(Producteur::class)
            ->findAll();

        return $this->render('producteur/index.html.twig', ['producteurs' => $producteurs]);
    }

    /**
     * @Route("/new", name="producteur_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $producteur = new Producteur();
        $form = $this->createForm(ProducteurType::class, $producteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($producteur);
            $em->flush();

            return $this->redirectToRoute('producteur_index');
        }

        return $this->render('producteur/new.html.twig', [
            'producteur' => $producteur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{prodId}", name="producteur_show", methods="GET")
     */
    public function show(Producteur $producteur): Response
    {
        return $this->render('producteur/show.html.twig', ['producteur' => $producteur]);
    }

    /**
     * @Route("/{prodId}/edit", name="producteur_edit", methods="GET|POST")
     */
    public function edit(Request $request, Producteur $producteur): Response
    {
        $form = $this->createForm(ProducteurType::class, $producteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('producteur_edit', ['prodId' => $producteur->getProdId()]);
        }

        return $this->render('producteur/edit.html.twig', [
            'producteur' => $producteur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{prodId}", name="producteur_delete", methods="DELETE")
     */
    public function delete(Request $request, Producteur $producteur): Response
    {
        if ($this->isCsrfTokenValid('delete'.$producteur->getProdId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($producteur);
            $em->flush();
        }

        return $this->redirectToRoute('producteur_index');
    }
}
