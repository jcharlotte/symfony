<?php

namespace Controller;

abstract class BaseController
{

    public function render($view, array $param = [])
    {

        /* extract(["nom" => "Cérien", "prenom" => "Jean"])
        La fonction extract va créer autant de variable qu'il y a d'indices dans le tableau:
        $nom = "Cérien";
        $prenom = "Jean";
        */
        extract($param);
        // Permet de mettre l'affichage en 'pause'. Le html généré est en mis das une mémoire tampon. Il ne sera pas affiché
        ob_start();
        include __DIR__ . "/../view/" . $view . ".html.php";
        // On récupère le contenu de la mémoire tampon dans une variable
        $content = ob_get_contents();
        //On arrête de mettre l'affichage en mémoire tampon
        ob_end_clean();

        include __DIR__ . "/../view/base.html.php";
    }
}
