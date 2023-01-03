<?php

/**
 * Déclarer ici, toutes les fonctions utiles
 * aux pages de notre projet. Parce que c'est
 * notre projet. Nous tous !
 */

/**
 * Déclarer ici, toutes les fonctions utiles
 * aux pages de notre projet.
 */


/**
 * Permet de générer un slug.
 *
 * @param $text
 * @param string $divider
 * @return string
 */
function slugify($text, string $divider = '-'): string
{
    // replace non letter or digits by divider
    $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    // trim
    $text = trim($text, $divider);

    // remove duplicate divider
    $text = preg_replace('~-+~', $divider, $text);

    // lowercase
    $text = strtolower($text);

    if (empty($text)) {
        return 'n-a';
    }

    return $text;
}


/**
 * Redirige l'utilisateur sur une
 * nouvelle page.
 *
 * @param $page
 */
function redirection($page){
    header('Location: '.$page);
}