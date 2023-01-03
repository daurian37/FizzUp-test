<?php


/**
 * Permet de retourner les avis trié par date de publication
 *
 */
function getAvis() {

    global $dbh;
    $query = $dbh->prepare('
        SELECT * FROM avis order by createdAt
    ');
    $query->execute();
    return $query->fetchAll();
}

/**
 * Permet d'enregistrer les avis
 *
 * @param $email
 * @param $pseudo
 * @param $commentaire
 * @param $image
 * @param $noteID
 */
function addAvis($email, $pseudo, $commentaire, $image, $noteID) {
    global $dbh;
    $query = $dbh->prepare('
        INSERT INTO avis (email, pseudo, commentaire, image, noteID)
            VALUES (:email, :pseudo, :commentaire, :image, :noteID)
    ');
    
    $query->bindValue(':email', $email, PDO::PARAM_STR);
    $query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $query->bindValue(':commentaire', $commentaire, PDO::PARAM_STR);
    $query->bindValue(':image', $image, PDO::PARAM_STR);
    $query->bindValue(':noteID', $noteID, PDO::PARAM_INT);
    
    return $query->execute() ? $dbh->lastInsertId() : false;
}
