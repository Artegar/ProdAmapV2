<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller
{
    /**
     * @Route("/security/formConnection", name="formConnection")
     */
    public function index(Request $request)
    {
    	// Si le visiteur est déjà identifié, on le redirige vers l'accueil

	    if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
	      	return $this->redirectToRoute('accueil');
	    }

	    // Le service authentication_utils permet de récupérer le nom d'utilisateur
	    // et l'erreur dans le cas où le formulaire a déjà été soumis mais était invalide
	    // (mauvais mot de passe par exemple)

	    $authenticationUtils = $this->get('security.authentication_utils');

        return $this->render('security/index.html.twig', [
            'last_username' => $authenticationUtils->getLastUsername(),
      		'error'         => $authenticationUtils->getLastAuthenticationError(),
        ]);
    }

    /**
     * @Route("/security/checkConnection", name="checkConnection")
     */
    public function check()
    {
        return $this->render('security/index.html.twig', [
            'controller_name' => 'SecurityController',
        ]);
    }

    /**
    * @Route("/security/logout", name="logout")
    */
    public function logoutAction() : void
    {}
}

