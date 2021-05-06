<?php

namespace Controller;
use Model\Bdd;

class AbonneController extends BaseController
{

    public function liste()
    {
        $abonnes = Bdd::liste("abonne");
        return $this->render("abonne/liste", ["abonnes" => $abonnes ]);
    }
}
