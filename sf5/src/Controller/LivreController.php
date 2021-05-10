<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Livre;
use App\Form\LivreType;
use Doctrine\ORM\EntityManagerInterface as EntityManager;
use App\Repository\LivreRepository;

class LivreController extends AbstractController
{
    #[Route('/livre', name: 'livre')]
    public function index(LivreRepository $livreRepository): Response
    {
        /* Pour récupérer la liste de tous les lires enregistés en BDD, je vais utiliser la classe LivreRepository.
        Les classes Répository permettent de faire des requêtes SELECT sur la table correspondante.
        Vous ne pouvez pas instancier un objet de la classe Repository(comme Request, EntityManager,...), il faut donc utiliser,
            l'injection de dépendance,
        C'està-dire que la classe à utiliser est passée en paramètre d'une fonction et sera instanciée directement par Symfony.
        
        La méthode 'findAll()' récupère donc tous les enregistrements d'une table et retourne une liste d'objet Entity*/
        $livres = $livreRepository->findAll();
        // dd($livres);
        return $this->render('livre/index.html.twig', [
            'livres' => $livres
        ]);
    }

    /**
     * @Route("/livre/ajouter", name="livre_ajouter")
     */
    public function ajouter(Request $request, EntityManager $em)
    {
        // dump($request);
        /*
         * L'objet de la classe Request a des propriétés qui contiennent les valeurs de toutes les variables de PHP ($_GET, $_POST, ...)
         * Pour $_GET, la propriété 'query'
         * Pour $_POST, la propriété 'request'
         * 
         * Ces propriétés sont des objets. Avec la fonction get(), je peux récupérer la valeur de l'indice demandé
         */
        if ($request->isMethod("POST")) {

            $titre = $request->request->get("titre");
            $auteur = $request->request->get("auteur");

            $livre = new Livre;
            $livre->setTitre($titre);
            $livre->setAuteur($auteur);

            /* La classe EntityManager va permettre d'enregistrer en BDD.
            La méthode persist() permet de préparer une requête INSERT INTO à partir d'un objet d'une classe Entity.*/
            $em->persist($livre);

            /* La méthode 'flush' exécute toutes les requêtes SQL en attente */
            $em->flush();

            return $this->redirectToRoute("livre");

            /* La fonction dd() (dump and die) affiche un var_dump et arrête l'éxécution du php (fonction die) */
            // dd($titre, $auteur);
        }
        return $this->render("livre/formulaire.html.twig");
    }

    /**
     * @Route("/livre/nouveau", name="livre_nouveau")
     */
    public function nouveau(Request $request, EntityManager $em)
    {
        $livre = new Livre;
        $formLivre = $this->createForm(LivreType::class, $livre);
        /* handleRequest(): permet à la variable $formLivre de gérer les informations envoyé par le navigateur */
        $formLivre->handleRequest($request);
        if ($formLivre->isSubmitted() && $formLivre->isValid()) {
            $em->persist($livre);
            $em->flush();
            return $this->redirectToRoute("livre");
        }
        return $this->render("livre/form.html.twig", ['form' => $formLivre->createView()]);
    }
}
