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
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


/**
 * @Route("/admin")
 * Toutes les routes
 */
class LivreController extends AbstractController
{
    /**
     * @Route("/livre", name="livre")
     * @IsGranted("ROLE_ADMIN")
     */
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
            $em->persist($livre);   // Prépare la requête
            $em->flush();           // Insère la requête en bdd
            return $this->redirectToRoute("livre");
        }
        return $this->render("livre/form.html.twig", ['form' => $formLivre->createView()]);
    }

    /**
     * @Route("/livre/modifier/{id}", name="livre_modifier", requirements={"id"="\d+"})
     */
    public function modifier(EntityManager $em, Request $request, LivreRepository $lr,  $id) // EntityManager pour la modification en bdd et Request pour récupérer les infos du formulaire
    {
        $livre = $lr->find($id); // la méthode find() permet de récupérer un enregistrement avec son identifiant
        $formLivre = $this->createForm(LivreType::class, $livre);

        $formLivre->handleRequest($request);
        if ($formLivre->isSubmitted() && $formLivre->isValid()) {
            // $em->persist($livre);
            // Pour modifier un enregistrement, pas besoin d'utuliser la méthode persist() de l'EntityManager
            // Toutes les variables entités qui ont un id non null vont être enregistrées en bdd quand la méthode flush sera appelée
            $em->flush();
            return $this->redirectToRoute("livre");
        }
        return $this->render("livre/form.html.twig", ['form' => $formLivre->createView()]);
    }

    /**
     * @Route("/livre/supprimer/{id}", name="livre_supprimer", requirements={"id"="\d+"})
     * 
     * En passant un objet Livre comme paramètre de la méthode supprimer(), $livre sera récupéré dans la base de données selon la valeur de {id} passé dans l'URL de la route
     */
    public function supprimer(EntityManager $em, Request $request, Livre $livre)
    {
        if ($request->isMethod("POST")) {
            //La méthode remove() prépare la requête DELETE
            $em->remove($livre);
            $em->flush();
            return $this->redirectToRoute("livre");
        }
        return $this->render("livre/supprimer.html.twig", ["livre" => $livre]);
    }
}
