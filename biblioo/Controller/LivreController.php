<?php

namespace Controller;
use Model\Bdd;
use Model\Entities\Livre;

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
        $livre = new Livre;

        if ( $_POST ){
            extract($_POST);
            $livre->setTitre($titre);
            $livre->setAuteur($auteur);
            if ( Bdd::enregistre($livre) ){
                return header("Location: ?c=livre&m=liste");
            }

        }

        return $this->render("livre/formulaire", [ "livre" => $livre ]);
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
