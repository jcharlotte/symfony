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


## __Day4__

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