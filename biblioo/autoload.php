<?php 

function chargerClass($class){

        // $class == "Controller\LivreController"
    $class = str_replace('\\', '/', $class);
        // $class == "Controller/LivreController"
        
    require $class . ".php";
        // Controller/LivreController.php
}

// Permet de définir la fonction qui va être éxécutée à chaque fois qu'une class sera requise
spl_autoload_register("chargerClass");