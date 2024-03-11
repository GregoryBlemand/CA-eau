<?php

/**
 * Consigne :
 *
 * Créez un programme qui affiche le premier index d’un élément recherché dans un tableau.
 * Le tableau est constitué de tous les arguments sauf le dernier.
 * L’élément recherché est le dernier argument.
 * Afficher -1 si l’élément n’est pas trouvé.
 *
 * Exemples d’utilisation :
 * $> python exo.py Ceci est le monde qui contient Charlie un homme sympa Charlie
 * 6
 *
 * $> python exo.py test test test
 * 0
 *
 * $> python exo.py test boom
 * -1
 *
 * Afficher error et quitter le programme en cas de problèmes d’arguments.
 *
 */

/* fonctions */
function getWordIndexInList(string $searchTerm, array $wordList): int
{
    foreach ($wordList as $index => $word) {
        if ($word == $searchTerm) {
            return $index;
        }
    }

    return -1;
}

/* gestion d'erreurs */

if ($argc < 3) { // pas assez d'argument
    print "error : Pas assez de paramètre.\n";
    exit;
}

/* récupération des données */

// on récupère le dernier élément du tableau en modifiant le tableau au passage
$searchTerm = array_pop($argv);

// on prend tout le reste sauf le premier élément
$wordList = array_slice($argv, 1);

/* résolution */
$index = getWordIndexInList($searchTerm, $wordList);

/* affichage */
print $index."\n";