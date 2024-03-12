<?php

/**
 * Consigne :
 *
 * Créez un programme qui trie une liste de nombres. Votre programme devra implémenter l’algorithme du tri par sélection.
 *
 * Vous utiliserez une fonction de cette forme (selon votre langage) :
 * my_select_sort(array) {
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
 * Afficher error et quitter le programme en cas de problèmes d’arguments.
 *
 * Wikipedia vous présentera une belle description de cet algorithme de tri.
 *
 */

/* fonctions */
function isNumeric(string $string) {
    return preg_match('/[0-9]+/', $string) && !preg_match('/\D/', $string);
}

function my_select_sort(array $toSort): array
{
    $sortedArray = $toSort;

    $length = count($sortedArray);

    for ($i = 0; $i < $length - 2; $i++) {
        $min = getMinValueIndexStartingFrom($sortedArray, $i);

        if ($min !== $i)
        {
            $sortedArray = permutateValues($sortedArray, $min, $i);
        }
    }

    return $sortedArray;
}

function getMinValueIndexStartingFrom(array $sortedArray, int $indexStart): int
{
    $length = count($sortedArray);
    $minIndex = $indexStart;
    for ($i = $indexStart; $i < $length; $i++) {
        if ($sortedArray[$i] < $sortedArray[$minIndex])
        {
            $minIndex = $i;
        }
    }

    return $minIndex;
}

function permutateValues(array $sortedArray, int $minIndex, int $i): array
{
    $higherValue = $sortedArray[$i];
    $sortedArray[$i] = $sortedArray[$minIndex];
    $sortedArray[$minIndex] = $higherValue;

    return $sortedArray;
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
$sortedArray = my_select_sort($arrayToSort);

/* affichage */
print implode(' ', $sortedArray)."\n";