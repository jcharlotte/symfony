<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{

    /**
     * Ces commentaires s'appellent annotations. Ils commencent par /**, il ne doit rien y avoir après. 
     * Chaque ligne doit commencer par *
     * 
     * Toutes les méthodes d'un controller (qui correspondent à une route) doivent retourner un objet de la classe Reponse
     * @Route ("/test", name="test")
     */
    public function index(): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/TestController.php',
        ]);
    }

    /**
     * @Route("/test/accueil", name="test_accueil")
     */
    public function accueil()
    {
        $nombre = 45;
        $prenom = "Roger";

        return $this->render("base.html.twig", [ "nombre" => $nombre, "prenom" => $prenom ]);
    }
}
