<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TestdevueController extends Controller
{
    /**
     * @Route("/testdevue", name="testdevue")
     */
    public function index()
    {
        return $this->render('testdevue/index.html.twig', [
            'controller_name' => 'TestdevueController',
        ]);
    }
}
