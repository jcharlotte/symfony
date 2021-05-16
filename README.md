# Découverte de Symfony (7 jours)

*__Ce projet présente les différentes étapes de ma découverte de Symfony.__*



## __Day 1__

### *Cours*
- Rappels de POO/MVC *En cours - quelques petits soucis non résolus*(biblioo/)

### *Travail perso*
- Issues sur biblioo/ réglées


## __Day 2__

### *Cours*
- Installation de Composer (https://getcomposer.org/download/)
- Installation de Symfony/CLI (https://symfony.com/download)
- Création d'un nouveau projet Symfony : sf5/
    - server:ca:install
    - require maker --dev
    - require annotations
    - symfony console make:controller
    - composer require twig (et non pas wig!)

### *Travail perso*
- Recherche concernant l'exercice2 (TestController.php)


## __Day 3__

### *Cours*
- Correction des exercices 1 et 2 (TestController.php)
- Connexion BDD (.env)
- Création d'entités
    - symfony console doctrine:database:create
    - symfony console make:entity
    - symfony console make:migration
    - symfony console doctrine:migrations:migrate
- Requête d'insertion
- Requête de sélection


## __Day 4__

### *Cours*
- Requête de modification
- Requête de suppression
- Ajout d'un menu
- Création de l'entité utilisateur
    - composer require security
    - symfony console make:user
    - symfony console make:entity Abonne (pour modifier l'entité)
    - symfony console make:migration
    - symfony console doctrine:migration:migrate
    - symfony console make:auth
    - symfony console make:registration-form
- Configuration de la connexion utilisateur
- Installation d'un outil de debug
    - composer require debug --dev
- Configuration de l'administrateur
- Configuration des accès aux pages d'administration


## __DAY 5__ 

### *Cours*
- Utilisation du CRUD/symfony
    - symfony console make:crud
- Création de l'entité categorie
    - configuration de la Foreign key la reliant à la table livre



## __Weekend__

1. Donc vous allez créer une entité Emprunt avec une relation ManyToOne pour les entités Abonne et Livre. Attention à bien choisir le bon type pour chaque propriété.
2. Vous devez créer toutes les routes pour le CRUD sur cette table. Ces routes ne seront accessibles qu’aux abonnés ayant le ROLE_ADMIN ou le ROLE_BIBLIO
3. Vous créez un contrôleur Profil pour toutes les routes concernant les abonnés ayant le ROLE_LECTEUR. Il y aura une route pour afficher le profil de l’abonné (ces informations) ainsi que tous les emprunts qu’il a déjà effectué.
Lorsque que l’on se connecte, on sera redirigé automatiquement vers cette route.
4. Toujours dans le même contrôleur, vous allez rajouter une route pour pouvoir emprunter un livre. Cette route ne sera accessible que si l’on est connecté.
Sur chaque vignette de livre, vous mettez un lien pour pouvoir emprunter un livre quand on est connecté. Ce lien redirige vers la route que vous venez de créer. Ce lien n’est affiché que si on est connecté avec le ROLE_LECTEUR.

### *Travail perso*
- composer require webpack
- 1, 2 et 3 -> 50%