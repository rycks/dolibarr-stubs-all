---
title: "Comment les stubs sont produits"
weight: 80
description: "L'origine des stubs Dolibarr, ce que le générateur garde et retire, et comment signaler un stub faux."
---

# Comment les stubs sont produits

## L'origine

Les stubs sont générés à partir des sources officielles de Dolibarr, publiées sur [github.com/Dolibarr/dolibarr](https://github.com/Dolibarr/dolibarr). Chaque dossier `dolibarr-NN/` correspond à une version stable de la branche NN : par exemple, `dolibarr-18/` vient de Dolibarr 18.0.4 et `dolibarr-22/` de Dolibarr 22.0.4. La version exacte est la valeur de la constante `DOL_VERSION`, définie dans `dolibarr-NN/filefunc.inc.php`, ou dans `dolibarr-NN/version.inc.php` à partir de Dolibarr 23.

Le générateur est l'outil [php-stubs/generator](https://github.com/php-stubs/generator), piloté par les scripts du dépôt [dolibarr-stubs](https://github.com/rycks/dolibarr-stubs).

## Ce que fait la génération

Le générateur traite chaque fichier PHP de `htdocs/` séparément et écrit son stub au même endroit dans `dolibarr-NN/`. Un développeur retrouve donc une classe à l'endroit où il la chercherait dans Dolibarr : `dolibarr-18/societe/class/societe.class.php` contient le stub de `htdocs/societe/class/societe.class.php`.

| Gardé | Retiré |
|---|---|
| Classes, interfaces, traits, avec leurs propriétés et constantes | Le corps des fonctions et des méthodes |
| Signatures des fonctions et des méthodes | Le code exécuté au chargement d'une page |
| Constantes définies par `define()` | Les fichiers sans aucune déclaration |
| Blocs PHPDoc, tels qu'ils sont dans les sources | Les fichiers de polices TCPDF |

Les fichiers de polices TCPDF ne contiennent que des tableaux de données, inutiles pour l'analyse.

Les bibliothèques tierces embarquées par Dolibarr dans `htdocs/includes/` (TCPDF, Sabre, Stripe, PhpOffice...) sont traitées comme le reste. Un module qui appelle directement l'une d'elles est donc vérifié lui aussi.

## Ce que cela implique

**Les PHPDoc des stubs sont celles de Dolibarr.** Une PHPDoc fausse dans le coeur l'est aussi dans les stubs. C'est la raison d'être du fichier [phpstan/dolibarr-core.stub](/dolibarr-stubs/correctifs-phpdoc), qui corrige les plus gênantes sans toucher aux stubs générés.

**Un stub ne dit rien du comportement.** PHPStan vérifie que vos appels respectent les signatures et les types documentés. Il ne sait pas ce qu'une méthode fait réellement, ni si une page fonctionne une fois installée. Les stubs complètent les tests d'un module, ils ne les remplacent pas.

**Une version de stubs ne suit pas les correctifs mineurs.** `dolibarr-18/` correspond à une version précise de la branche 18. Une signature modifiée dans une version corrective ultérieure n'y apparaît qu'après régénération.

## Signaler un problème

Ouvrez un ticket sur [dolibarr-stubs-all](https://github.com/rycks/dolibarr-stubs-all/issues) en précisant :

- la version de Dolibarr et le fichier concerné ;
- ce que contient le stub et ce que contiennent les sources de Dolibarr pour la même version ;
- l'erreur PHPStan ou le défaut de complétion que cela provoque.

Pour une PHPDoc fausse dans le coeur de Dolibarr, la correction va dans `phpstan/dolibarr-core.stub` : voir la section "Proposer une correction" de la page [Corrections des PHPDoc du coeur](/dolibarr-stubs/correctifs-phpdoc). Le mieux est aussi de la signaler à Dolibarr lui-même, pour qu'elle disparaisse des versions suivantes.

## Soutenir le projet

La maintenance des stubs est assurée par [CAP-REL](https://cap-rel.fr/services/soutien-rd/). Si ces stubs vous font gagner du temps, vous pouvez soutenir ce travail.
