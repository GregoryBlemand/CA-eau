<?php

/**
 * Consigne :
 *
 * Créez un programme qui affiche toutes les valeurs comprises entre deux nombres dans l’ordre croissant. Min inclus, max exclus.
 *
 * Exemples d’utilisation :
 * $> python exo.py 20 25
 * 20 21 22 23 24
 *
 * $> python exo.py 25 20
 * 20 21 22 23 24
 *
 * $> python exo.py hello
 * error
 *
 * Afficher error et quitter le programme en cas de problèmes d’arguments.
 *
 */

/* fonctions */
function isNumeric(string $string) {
    return preg_match('/[0-9]+/', $string) && !preg_match('/\D/', $string);
}

/* gestion d'erreurs */
const ERROR_CODE = "error";
if ($argc == 1) { // pas assez d'argument
    print ERROR_CODE."\n";
    exit;
}

if ($argc > 3) { // trop d'arguments
    print ERROR_CODE."\n";
    exit;
}

for ($i = 1; $i < $argc; $i++) {
    if (!isNumeric($argv[$i]))
    {
        print ERROR_CODE."\n";
        exit;
    }
}

/* récupération des données */
$argument1 = intval($argv[1]);
$argument2 = intval($argv[2]);
$list = [];

$min = min($argument1, $argument2);
$max = max($argument1, $argument2);

/* résolution */
for ($j = $min; $j < $max; $j++) {
    $list[] = $j;
}

/* affichage */
print implode(' ', $list)."\n";