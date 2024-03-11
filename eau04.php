<?php

/**
 * Consigne :
 *
 * Créez un programme qui affiche le N-ème élément de la célèbre suite de Fibonacci. (0, 1, 1, 2) étant le début de la suite et le premier élément étant à l’index 0.
 *
 * Exemples d’utilisation :
 * $> python exo.py 3
 * 2
 * $>
 *
 * Afficher -1 si le paramètre est négatif ou mauvais.
 *
 */

/* fonctions */

/**
 * calcul du nombre de rang n de la suite
 *  source https://fr.wikipedia.org/wiki/Suite_de_Fibonacci#Algorithme_r%C3%A9cursif_na%C3%AFf
 *
 * @param int $rank
 * @return int the number at rank $rank in the suite
 */
function fibonacci(int $rank) {
    if ($rank == 0 || $rank == 1) {
        return $rank;
    }

    return fibonacci($rank - 1) + fibonacci($rank - 2);
}

function isNumeric(string $string) {
    return preg_match('/[0-9]+/', $string) && !preg_match('/\D/', $string);
}



/* gestion d'erreurs */
const ERROR_CODE = -1;
if ($argc == 1) { // pas d'argument
    print ERROR_CODE."\n";
    exit;
}

if ($argc > 2) { // plus d'un argument
    print ERROR_CODE."\n";
    exit;
}

if (!isNumeric($argv[1])) { // l'argument n'est pas un entier positif
    print ERROR_CODE."\n";
    exit;
}

/* récupération des données */
$rank = intval($argv[1]);

/* résolution */
$fibonacciNumber = fibonacci($rank);

/* affichage */
print $fibonacciNumber."\n";

