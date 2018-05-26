<?php

namespace App\Controller;

use App\Entity\Contrat;
use App\Form\ContratType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/contrat")
 */
class ContratController extends Controller
{
    /**
     * @Route("/", name="contrat_index", methods="GET")
     */
    public function index(): Response
    {
        $contrats = $this->getDoctrine()
            ->getRepository(Contrat::class)
            ->findAll();

        return $this->render('contrat/index.html.twig', ['contrats' => $contrats]);
    }

    /**
     * @Route("/new", name="contrat_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $contrat = new Contrat();
        $form = $this->createForm(ContratType::class, $contrat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contrat);
            $em->flush();

            return $this->redirectToRoute('contrat_index');
        }

        return $this->render('contrat/new.html.twig', [
            'contrat' => $contrat,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{contId}", name="contrat_show", methods="GET")
     */
    public function show(Contrat $contrat): Response
    {
        return $this->render('contrat/show.html.twig', ['contrat' => $contrat]);
    }

    /**
     * @Route("/{contId}/edit", name="contrat_edit", methods="GET|POST")
     */
    public function edit(Request $request, Contrat $contrat): Response
    {
        $form = $this->createForm(ContratType::class, $contrat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('contrat_edit', ['contId' => $contrat->getContId()]);
        }

        return $this->render('contrat/edit.html.twig', [
            'contrat' => $contrat,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{contId}", name="contrat_delete", methods="DELETE")
     */
    public function delete(Request $request, Contrat $contrat): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contrat->getContId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($contrat);
            $em->flush();
        }

        return $this->redirectToRoute('contrat_index');
    }
}
