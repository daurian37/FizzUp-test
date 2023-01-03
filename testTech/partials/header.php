<?php
    # Chargement de la configuration et de la BDD
    require_once(__DIR__ . '/../config/configuration.php');
    require_once(__DIR__ . '/../config/database.php');

    # Chargement de nos fonctions
    require_once(__DIR__ . '/../functions/notes.php');
    require_once(__DIR__ . '/../functions/avis.php');
    require_once(__DIR__ . '/../functions/global.php');

    # Récupération des catégories
    $categories = getNotes();

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Actunews CSS -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <!-- Dropify CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CkEditor JS -->
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
    <title>Actunews !</title>
</head>
<body>

<!-- Menu du site -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="i#"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">

            <div class="text-right">
                    <span class="navbar-text mx-2">
                         <strong>Bonjour sur ce site vous pouvez -> </strong>
                    </span>
                    <a class="nav-item btn btn-outline-success mx-2"
                       href="mesAvis.php">Consulter les avis</a>

                    <a class="nav-item btn btn-outline-warning mx-2"
                       href="index.php">Créer un avis</a>

            </div>
        </div>
    </div>
</nav>