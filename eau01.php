<?php

/**
 * Consigne :
 *
 * Créez un programme qui affiche toutes les différentes combinaisons possibles de trois chiffres dans l’ordre croissant, dans l’ordre croissant. La répétition est volontaire.
 *
 * Exemples d’utilisation :
 * $> python exo.py
 * 012, 013, 014, 015, 016, 017, 018, 019, 023, 024, ... , 789
 * $>
 *
 * 987 n’est pas là parce que 789 est présent.
 *
 * 020 n’est pas là parce que 0 apparaît deux fois.
 *
 * 021 n’est pas là parce que 012 est présent.
 *
 * 000 n’est pas là parce que cette combinaison ne comporte pas exclusivement des chiffres différents les uns des autres.
 */

/* fonctions */

function hasTwoSimilarDigits($i, $j, $k): bool
{
    return $i == $j || $i == $k || $j == $k;
}

function hasThreeSimilarDigits($i, $j, $k): bool
{
    return $i == $j && $j == $k;
}

function alreadyDisplayedSimilarTrio(array $outputList, int $i, int $j, int $k): bool
{

    return in_array($i.$j.$k, $outputList)
        || in_array($i.$k.$j, $outputList)
        || in_array($j.$i.$k, $outputList)
        || in_array($j.$k.$i, $outputList)
        || in_array($k.$i.$j, $outputList)
        || in_array($k.$j.$i, $outputList)
    ;
}

/* gestion d'erreurs */

/* récupération des données */

/* résolution */
$outputList = [];
for ($i = 0; $i < 10; $i++) {
    for ($j = 0; $j < 10; $j++) {
        for ($k = 0; $k < 10; $k++) {
            if (
                hasThreeSimilarDigits($i, $j, $k)
                || hasTwoSimilarDigits($i, $j, $k)
                || alreadyDisplayedSimilarTrio($outputList, $i, $j, $k)
            ) {
                continue;
            }

            $outputList[] = $i.$j.$k;
        }
    }
}


/* affichage */
print implode(', ', $outputList)."\n";