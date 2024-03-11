<?php

/**
 * Consigne :
 *
 * Créez un programme qui affiche la différence minimum absolue entre deux éléments d’un tableau constitué uniquement de nombres. Nombres négatifs acceptés.
 *
 * Exemples d’utilisation :
 * $> python exo.py 5 1 19 21
 * 2
 *
 * $> python exo.py 20 5 1 19 21
 * 1
 *
 * $> python exo.py -8 -6 4
 * 2
 *
 * Afficher error et quitter le programme en cas de problèmes d’arguments.
 *
 */

/* fonctions */

function isNumeric(string $string) {
    return preg_match('/[0-9]+/', $string) && (!preg_match('/\D/', $string) || preg_match('/-/', $string));
}

function getAbsoluteDelta(int $minNumber, int $maxNumber): int
{
    return abs($maxNumber - $minNumber);
}

/* gestion d'erreurs */

if ($argc < 3) { // pas assez d'argument
    print "error : Pas assez de paramètre.\n";
    exit;
}

for ($i = 1; $i < $argc; $i++) {
    if (!isNumeric($argv[$i])) {
        print "error : \"$argv[$i]\" n'est pas un nombre.\n";
        exit;
    }
}

/* récupération des données */

$numberList = [];

for ($j = 1; $j < $argc; $j++) {
    $numberList[] = $argv[$j];
}
$listCount = count($numberList);

/* résolution */
$minAbsoluteDelta = null;
sort($numberList);

for ($k = 0; $k < $listCount - 1; $k++) {
    $currentDelta = getAbsoluteDelta($numberList[$k], $numberList[$k+1]);

    if (null === $minAbsoluteDelta || $minAbsoluteDelta > $currentDelta)
    {
        $minAbsoluteDelta = $currentDelta;
    }

    // s'il y a deux fois le même chiffre on a delta à 0... pas mieux
    if (0 === $minAbsoluteDelta) {
        break;
    }
}

/* affichage */
print $minAbsoluteDelta."\n";