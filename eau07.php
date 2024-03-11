<?php

/**
 * Consigne :
 *
 * Créez un programme qui met en majuscule une lettre sur deux d’une chaîne de caractères. Seule les lettres (A-Z, a-z) sont prises en compte.
 *
 * Exemples d’utilisation :
 * $> python exo.py “Hello world !”
 * HeLlO wOrLd !
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
    return preg_match('/[A-Za-z]/', $letter);
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
$letterCounter = 0;

/* résolution */
for ($i = 0; $i < $stringLength; $i++) {
    $character = strtoupper($string[$i]);

    if (isLetter($character)) {
        $letterCounter++;

        if ($letterCounter % 2 == 0) {
            $character = strtolower($string[$i]);
        }
    }

    $newString .= $character;
}

/* affichage */
print $newString."\n";