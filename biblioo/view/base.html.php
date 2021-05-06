<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Ne pas oublier la description !">
    <title>Biblioo</title>

    <!-- CDN BOOSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous" defer></script>

    <!-- CDN JQUERRY -->
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

    <!-- CDN AJAX -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

</head>

<body>

    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
            <a class="navbar-brand" href="/">Biblioo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="?c=livre&m=liste">Liste des livres</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?c=livre&m=ajouter">Ajouter un livre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?c=livre&m=modifier">Modifier un livre</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?c=abonne&m=liste">Abonné</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?c=abonne&m=ajouter">Ajouter un abonné</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?c=abonne&m=modifier">Modifier un abonné</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="container">
        <h1>Bienvenu à la biblioo</h1>
        <?= $content ?>

    </div>
</body>

</html>