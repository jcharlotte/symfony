<?php

namespace Controller;

use Model\Bdd;

class LivreController
{

    /**
     * Cette méthode va afficher la liste des livres
     */
    public function liste()
    {
        // $livres = (new Bdd)->listeLivres();
        $livres = Bdd::listeLivres();

        include __DIR__ . "/../view/header.html.php";
        include __DIR__ . "/../view/livres/liste.html.php";
        include __DIR__ . "/../view/footer.html.php";
    }

    /**
     * Cette méthoder va permettre d'ajouter un livre
     */
    public function ajouter()
    {
        include __DIR__ . "/../view/header.html.php";
        include __DIR__ . "/../view/livres/formulaire.html.php";
        include __DIR__ . "/../view/footer.html.php";
    }

    /**
     * Cette méthode va permettre de modifier un livre
     */
    public function modifier()
    {
        include __DIR__ . "/../view/header.html.php";
        include __DIR__ . "/../view/livres/formulaire.html.php";
        include __DIR__ . "/../view/footer.html.php";
    }
}
