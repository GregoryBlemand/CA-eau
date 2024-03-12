<?php

/**
 * Consigne :
 *
 * Créez un programme qui trie une liste de nombres. Votre programme devra implémenter l’algorithme du tri à bulle.
 *
 * Vous utiliserez une fonction de cette forme (selon votre langage) :
 * my_bubble_sort(array) {
 * # votre algorithme
 * return (new_array)
 * }
 *
 * Exemples d’utilisation :
 * $> python exo.py 6 5 4 3 2 1
 * 1 2 3 4 5 6
 *
 * $> python exo.py test test test
 * error
 *
 *
 * Afficher error et quitter le programme en cas de problèmes d’arguments.
 *
 * Wikipedia vous présentera une belle description de cet algorithme de tri.
 *
 */

/* fonctions */
function isNumeric(string $string) {
    return preg_match('/[0-9]+/', $string) && !preg_match('/\D/', $string);
}

/*
 * Tri à bulle (optimisé) source wikipedia: https://fr.wikipedia.org/wiki/Tri_%C3%A0_bulles#Principe_et_pseudo-code
 */
function my_bubble_sort(array $toSort): array
{
    $length = count($toSort);
    $sortedArray = $toSort;

    for ($i = $length -1; $i > 0 ; $i--) {
        $arrayIsSorted = true;

        for ($j = 0; $j <= $i -1; $j++) {
            if ($sortedArray[$j+1] < $sortedArray[$j]) {
                $sortedArray = moveValueUp($sortedArray, $j);
                $arrayIsSorted = false;
            }

        }
        if ($arrayIsSorted) {
            break;
        }
    }

    return $sortedArray;
}

function moveValueUp(array $array, int $index): array
{
    $valueToMoveUp = $array[$index];

    $array[$index] = $array[$index + 1];
    $array[$index + 1] = $valueToMoveUp;

    return $array;
}

/* gestion d'erreurs */
if ($argc < 3) { // pas assez d'argument
    print "error : Pas assez de paramètre.\n";
    exit;
}

$arrayToSort = [];
for ($i = 1; $i < $argc; $i++) {
    if (!isNumeric($argv[$i])) {
        print "error : \"$argv[$i]\" n'est pas un nombre.\n";
        exit;
    }

    if (in_array($argv[$i], $arrayToSort)) {
        print "error : \"$argv[$i]\" a été envoyé en double.\n";
        exit;
    }

    $arrayToSort[] = $argv[$i];
}

/* récupération des données */

/* résolution */
$sortedArray = my_bubble_sort($arrayToSort);

/* affichage */
print implode(' ', $sortedArray)."\n";

