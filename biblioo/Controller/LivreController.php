<?php

namespace Controller;
use Model\Bdd;

class LivreController extends BaseController
{

    public function liste()
    {
        // $livres = (new Bdd)->listeLivres();
        $livres = Bdd::liste("livre");
        return $this->render("livre/liste", ["livres" => $livres]);
    }

    public function ajouter()
    {

        return $this->render("livre/formulaire");
    }

    public function modifier($id)
    {
        $livre = Bdd::selectByid("livre", $id);
        if( $_POST ){
            extract($_POST);
            $livre->setTitre($titre);
            $auteur->setAuteur($auteur);
            if( Bdd::enregistre($livre) ){
                return header("Location: ?c=livre&m=liste");
            }
        }

        return $this->render("livre/formulaire", ["livre" => $livre ]);
    }
}
