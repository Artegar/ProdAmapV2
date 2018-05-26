<?php

namespace App\Controller;

use App\Entity\Adherant;
use App\Form\AdherantType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/adherant")
 */
class AdherantController extends Controller
{
    /**
     * @Route("/", name="adherant_index", methods="GET")
     */
    public function index(): Response
    {
        $adherants = $this->getDoctrine()
            ->getRepository(Adherant::class)
            ->findAll();

        return $this->render('adherant/index.html.twig', ['adherants' => $adherants]);
    }

    /**
     * @Route("/new", name="adherant_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $adherant = new Adherant();
        $form = $this->createForm(AdherantType::class, $adherant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($adherant);
            $em->flush();

            return $this->redirectToRoute('adherant_index');
        }

        return $this->render('adherant/new.html.twig', [
            'adherant' => $adherant,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{adherId}", name="adherant_show", methods="GET")
     */
    public function show(Adherant $adherant): Response
    {
        return $this->render('adherant/show.html.twig', ['adherant' => $adherant]);
    }

    /**
     * @Route("/{adherId}/edit", name="adherant_edit", methods="GET|POST")
     */
    public function edit(Request $request, Adherant $adherant): Response
    {
        $form = $this->createForm(AdherantType::class, $adherant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('adherant_edit', ['adherId' => $adherant->getAdherId()]);
        }

        return $this->render('adherant/edit.html.twig', [
            'adherant' => $adherant,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{adherId}", name="adherant_delete", methods="DELETE")
     */
    public function delete(Request $request, Adherant $adherant): Response
    {
        if ($this->isCsrfTokenValid('delete'.$adherant->getAdherId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($adherant);
            $em->flush();
        }

        return $this->redirectToRoute('adherant_index');
    }
}
