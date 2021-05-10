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