<?php

/**
 * Consigne :
 *
 * Créez un programme qui affiche le premier nombre premier supérieur au nombre donné en argument.
 *
 * Exemples d’utilisation :
 * $> python exo.py 14
 * 17
 * $>
 *
 * Afficher -1 si le paramètre est négatif ou mauvais.
 *
 */

/* fonctions */
function isNumeric(string $string) {
    return preg_match('/[0-9]+/', $string) && !preg_match('/\D/', $string);
}

function isPrime(int $number) {
    if ($number <= 1) {
        return false;
    } elseif ($number <= 3) {
        return true;
    } elseif ($number % 2 == 0 || $number % 3 == 0) {
        return false;
    }
    $dividerToTest = 5;

    // on teste les diviseurs jusqu'à racine carré de $number
    while ($dividerToTest * $dividerToTest <= $number) {
        // A partir de 5 les nombres premiers ont un écart de 6 à 8
        if ($number % $dividerToTest == 0 || $number % ($dividerToTest + 2) == 0) {
            return false;
        }
        $dividerToTest += 6;
    }
    return true;
}

function getNextPrimeNumber(int $number)
{
    for ($i = 1; $i < 8; $i++) { // pas besoin de tester plus de 8 nombres vu la répartition des nombres premiers
        if (isPrime($number + $i)) {
            return $number + $i;
        }
    }
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
$number = intval($argv[1]);

/* résolution */
$nextPrimeNumber = getNextPrimeNumber($number);

/* affichage */
print $nextPrimeNumber."\n";
