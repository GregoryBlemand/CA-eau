<?php

/**
 * Consigne :
 *
 * Créez un programme qui met en majuscule la première lettre de chaque mot d’une chaîne de caractères. Les autres lettres devront être en minuscules. Les mots ne sont délimités que par un espace, une tabulation ou un retour à la ligne.
 *
 * Exemples d’utilisation :
 * $> python exo.py “bonjour mathilde, comment vas-tu ?!”
 * Bonjour Mathilde, Comment Vas-tu ?!
 *
 * $> python exo.py 42
 * error
 *
 * Afficher error et quitter le programme en cas de problèmes d’arguments.
 *
 */

/* fonctions */

function isNumeric(string $string) {
    return preg_match('/[0-9]+/', $string) && !preg_match('/\D/', $string);
}

function isLetter(string $letter)
{
    // prend en compte tous les caractères latins
    return preg_match('/\p{Latin}/', $letter);
}

function isWhiteSpace(string $letter)
{
    return preg_match('/\s/', $letter);
}

/* gestion d'erreurs */

const ERROR_CODE = "error";
if ($argc == 1) { // pas assez d'argument
    print ERROR_CODE."\n";
    exit;
}

if ($argc > 2) { // trop d'arguments
    print ERROR_CODE."\n";
    exit;
}

if (isNumeric($argv[1])) { // l'argument est un nombre
    print ERROR_CODE."\n";
    exit;
}

/* récupération des données */

$string = $argv[1];
$stringLength = strlen($string);
$newString = '';
$firstChar = true; // la prochaine lettre débute un mot

/* résolution */

for ($i = 0; $i < $stringLength; $i++) {
    $character = substr($string, $i, 1);

    if (isLetter($character) && $firstChar) {
        $newString .= strtoupper($character);
        $firstChar = false;
        continue;
    }

    if (isWhiteSpace($character)) {
        $firstChar = true;
    }

    $newString .= $character;
}

/* affichage */
// accessoirement on peut faire ça en php avec ucwords($string); mais ça aurait été trop facile...
print $newString."\n";
