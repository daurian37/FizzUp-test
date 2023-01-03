<?php

# Inclusion du header sur la page
require_once(__DIR__ . '/partials/header.php');


# Initialisation des variables
$email = $pseudo = $commentaire = $image = $noteID = null;

if(!empty($_POST)) {

    # Affectation des variables
    foreach ($_POST as $cle => $valeur) {
        $$cle = $valeur;
    }

    # Récupération de l'image
    $image = $_FILES['image'];

    # Chargement de l'image
    # Récupération du fichier temporaire
    $fileTmp = $image['tmp_name'];

    # Récupération de l'extension de l'image
    $extension = pathinfo($image['name'])['extension'];

    # Nom sécurisé de l'image
    $fileName = slugify($pseudo) . '.' . $extension;

    # Mon dossier de destination
    $destination = __DIR__ . '/assets/uploads/' . $fileName;

    # Déplacer le fichier dans la destination
    move_uploaded_file($fileTmp, $destination);

    # J'envoi dans ma BDD le nom de l'image
    $image = $fileName;

    # Vérification des données
    $errors = [];

    // ...
    // ...
    // ...
    // ...

    if(empty($errors)) {

        $avisID = addAvis($email, $pseudo, $commentaire, $image, $noteID);
        if($avisID) {
            redirection('mesAvis.php');
        }

    }

} // end !empty($_POST)

?>

    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <form method="post" enctype="multipart/form-data" class="m-3">
                    <fieldset class="border rounded p-3">
                        <h2 class="text-center">
                            Votre avis compte
                        </h2>

                        <!-- Titre -->
                        <div class="form-group mt-2">
                            <input type="email" name="email"
                                   class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>"
                                   placeholder="Votre email"
                                   id="titre" value="<?= $email ?>">
                            <div class="invalid-feedback"><?= $errors['email'] ?? '' ?></div>
                        </div>

                        <!-- Titre -->
                        <div class="form-group mt-2">
                            <input type="text" name="pseudo"
                                   class="form-control <?= isset($errors['pseudo']) ? 'is-invalid' : '' ?>"
                                   placeholder="Votre pseudo"
                                   id="titre" value="<?= $pseudo ?>">
                            <div class="invalid-feedback"><?= $errors['pseudo'] ?? '' ?></div>
                        </div>

                        <!-- Categorie -->
                        <div class="form-group mt-2">
                            <select name="noteID" id="noteID" class="form-control">
                                <?php foreach (getNotes() as $notes) { ?>
                                    <option
                                        <?= ($notes['noteID'] === $noteID) ? 'selected' : '' ?>
                                            value="<?= $notes['noteID'] ?>">
                                        <?= $notes['designation'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback"><?= $errors['notes'] ?? '' ?></div>
                        </div>

                        <!-- Contenu -->
                        <div class="form-group mt-2">
                        <textarea name="commentaire" id="commentaire"
                                  class="form-control">
                            <?= $commentaire ?>
                        </textarea>
                            <script>
                                ClassicEditor.create(document.querySelector('#commentaire'));
                            </script>
                            <div class="invalid-feedback"><?= $errors['commentaire'] ?? '' ?></div>
                        </div>

                        <!-- Image -->
                        <div class="form-group mt-2">
                            <input type="file" name="image"
                                   class="dropify form-control-file <?= isset($errors['image']) ? 'is-invalid' : '' ?>"
                                   id="image" value="<?= $image ?>">
                            <div class="invalid-feedback"><?= $errors['image'] ?? '' ?></div>
                        </div>

                        <!-- Bouton -->
                        <div class="d-grid gap-2">
                            <button class="btn mt-4 btn-dark">
                                Publier mon avis
                            </button>
                        </div>

                    </fieldset>
                </form>
            </div> <!-- /.col-md-8 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->

<?php
# Inclusion du footer sur la page
require_once(__DIR__ . '/partials/footer.php');