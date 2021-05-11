<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\LivreRepository;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(LivreRepository $lr): Response
    {
        /*  Exercice 1 : Cette route doit se lancer quand on est à la racine du projet
            Exercice 2 : Affiche la liste des livres sous forme de vignettes
        */

        $livres = $lr->findAll();

        return $this->render('home/index.html.twig', [
            'livres' => $livres,
        ]);
    }
}
