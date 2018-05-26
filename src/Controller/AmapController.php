<?php

namespace App\Controller;

use App\Entity\Amap;
use App\Form\AmapType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/amap")
 */
class AmapController extends Controller
{
    /**
     * @Route("/", name="amap_index", methods="GET")
     */
    public function index(): Response
    {
        $amaps = $this->getDoctrine()
            ->getRepository(Amap::class)
            ->findAll();

        return $this->render('amap/index.html.twig', ['amaps' => $amaps]);
    }

    /**
     * @Route("/new", name="amap_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $amap = new Amap();
        $form = $this->createForm(AmapType::class, $amap);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($amap);
            $em->flush();

            return $this->redirectToRoute('amap_index');
        }

        return $this->render('amap/new.html.twig', [
            'amap' => $amap,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{amapId}", name="amap_show", methods="GET")
     */
    public function show(Amap $amap): Response
    {
        return $this->render('amap/show.html.twig', ['amap' => $amap]);
    }

    /**
     * @Route("/{amapId}/edit", name="amap_edit", methods="GET|POST")
     */
    public function edit(Request $request, Amap $amap): Response
    {
        $form = $this->createForm(AmapType::class, $amap);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('amap_edit', ['amapId' => $amap->getAmapId()]);
        }

        return $this->render('amap/edit.html.twig', [
            'amap' => $amap,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{amapId}", name="amap_delete", methods="DELETE")
     */
    public function delete(Request $request, Amap $amap): Response
    {
        if ($this->isCsrfTokenValid('delete'.$amap->getAmapId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($amap);
            $em->flush();
        }

        return $this->redirectToRoute('amap_index');
    }
}
