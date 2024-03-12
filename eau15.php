<?php

/**
 * Consigne :
 *
 * Créez un programme qui trie les éléments donnés en argument par ordre ASCII.
 *
 * Exemples d’utilisation :
 * $> python exo.py Alfred Momo Gilbert
 * Alfred Gilbert Momo
 *
 * $> python exo.py A Z E R T Y
 * A E R T Y Z
 *
 * Afficher error et quitter le programme en cas de problèmes d’arguments.
 *
 */

/* fonctions */

function isASCIIString(string $string)
{
    return preg_match('/[\x00-\x7F]/', $string);
}

function getASCIICode(string $character): int
{
    return ord($character);
}

function my_bubble_sort(array $toSort): array
{
    $length = count($toSort);
    $sortedArray = $toSort;

    for ($i = $length -1; $i > 0 ; $i--) {
        $arrayIsSorted = true;

        for ($j = 0; $j <= $i -1; $j++) {

            if (wordHasToMoveUp($sortedArray, $j)) {
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

function wordHasToMoveUp(array $array, int $index): bool
{
    $wordToCompare = $array[$index];
    $nextWord = $array[$index + 1];

    $minLength = min(strlen($wordToCompare), strlen($nextWord));

    for ($i = 0; $i < $minLength; $i++) {
        $currentWordChar = substr($wordToCompare, $i, 1);
        $nextWordChar = substr($nextWord, $i, 1);

        // caractères similaires, on passe au caractère suivant
        if (getASCIICode($nextWordChar) == getASCIICode($currentWordChar))
        {
            continue;
        }

        if (getASCIICode($nextWordChar) < getASCIICode($currentWordChar))
        {
            return true;
        } else {
            return false;
        }
    }

    if (strlen($wordToCompare) > strlen($nextWord)) {
        return true;
    }

    return false;
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

/* récupération des données */

$stringList = [];

for ($j = 1; $j < $argc; $j++) {
    $stringList[] = $argv[$j];
}
$listCount = count($stringList);

/* résolution */
// TODO tri par sélection avec récurcivité sur les lettres
$sortedArray = my_bubble_sort($stringList);

/* affichage */
print implode("\n", $sortedArray)."\n";
