<?php

/**
 * Retourne les catégories du site
 * depuis la base de données.
 */
function getNotes() {
    global $dbh; // Récupération depuis l'espace global.
    $query = $dbh->query('SELECT * FROM notes');
    return $query->fetchAll();
}
