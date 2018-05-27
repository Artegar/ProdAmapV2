<?php

namespace App\Controller;

use App\Entity\Panier;
use App\Entity\Contrat;

use App\Form\PanierType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/panier")
 */
class PanierController extends Controller
{
    /**
     * @Route("/", name="panier_index", methods="GET")
     */
    public function index(): Response
    {
        //recupere l'user
        $user = $this->get('security.token_storage')->getToken()->getUser();

        //Selon adherant ou producteur
        if ($user->getProducteur() != null)
        {
            //recupere les contrats
            $contrats = $this->getDoctrine()
                ->getRepository(Contrat::class)
                ->findBy(array('prod' => $user->getProducteur()));
        }
        else
        {
            //recupere les contrats
            $contrats = $this->getDoctrine()
                ->getRepository(Contrat::class)
                ->findBy(array('prod' => $user->getAdherant()));
        }

        $paniers = array();

        foreach ($contrats as $contrat)
        {
            //pour chaque contrat, recupere les panier pas encore livrer
            $desPaniers = $this->getDoctrine()
                ->getRepository(Panier::class)
                ->findBy(array('cont' => $contrat->getContId()));

            $desPaniers = $this->getDoctrine()
                ->getManager()
                ->createQuery('SELECT p FROM App\Entity\Panier p WHERE p.panierDatePrevue > CURRENT_DATE()
                    AND p.panierRecept = FALSE')
                ->getResult();

            foreach ($desPaniers as $panier)
            {
                array_push($paniers, $panier);
            }
        }

        return $this->render('panier/index.html.twig', ['paniers' => $paniers]);
    }

    /**
     * @Route("/new", name="panier_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $panier = new Panier();
        $form = $this->createForm(PanierType::class, $panier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($panier);
            $em->flush();

            return $this->redirectToRoute('panier_index');
        }

        return $this->render('panier/new.html.twig', [
            'panier' => $panier,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{panierId}", name="panier_show", methods="GET")
     */
    public function show(Panier $panier): Response
    {
        return $this->render('panier/show.html.twig', ['panier' => $panier]);
    }

    /**
     * @Route("/{panierId}/edit", name="panier_edit", methods="GET|POST")
     */
    public function edit(Request $request, Panier $panier): Response
    {
        $form = $this->createForm(PanierType::class, $panier);
        $form->remove('panierDatePrevue');
        $form->remove('panierActif');
        $form->remove('adher');
        $form->remove('cont');
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('panier_edit', ['panierId' => $panier->getPanierId()]);
        }

        return $this->render('panier/edit.html.twig', [
            'panier' => $panier,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{panierId}", name="panier_delete", methods="DELETE")
     */
    public function delete(Request $request, Panier $panier): Response
    {
        if ($this->isCsrfTokenValid('delete'.$panier->getPanierId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($panier);
            $em->flush();
        }

        return $this->redirectToRoute('panier_index');
    }
}
