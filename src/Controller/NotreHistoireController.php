<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NotreHistoireController extends Controller
{
    /**
     * @Route("/notrehistoire", name="notre_histoire")
     */
    public function index()
    {
        return $this->render('notre_histoire/notreHistoire.html.twig', [
            'controller_name' => 'NotreHistoireController',
        ]);
    }
}