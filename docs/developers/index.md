---
title: "Stubs Dolibarr"
weight: 1
description: "Analyser un module Dolibarr avec PHPStan et outiller son IDE, sans installer Dolibarr, sur toutes les versions de 10 à 24."
category: "Développeurs"
type: "outil-developpeur"
---

# Stubs Dolibarr pour PHPStan et les IDE

Le dépôt [dolibarr-stubs-all](https://github.com/rycks/dolibarr-stubs-all) fournit les **stubs** de Dolibarr, de la version 10 à la version 24. Un stub est une copie d'un fichier source dont on n'a gardé que les déclarations : classes, interfaces, traits, fonctions, constantes, avec leurs signatures et leurs blocs PHPDoc. Le corps des fonctions est vide et le code exécutable des pages a disparu.

Ce squelette suffit à un outil d'analyse statique ou à un éditeur pour savoir ce que contient Dolibarr : quelles classes existent, quelles méthodes elles proposent, quels paramètres elles attendent et ce qu'elles renvoient.

## À quoi ça sert

**Analyser un module avec PHPStan sans installer Dolibarr.** Votre module appelle `Societe::fetch()`, `dol_print_date()` ou `$langs->trans()`. Pour vérifier ces appels, PHPStan doit connaître ces symboles. Les stubs les lui donnent, sans base de données, sans serveur web et sans copie complète des sources.

**Vérifier un module sur plusieurs versions de Dolibarr.** Une méthode renommée en Dolibarr 20, un paramètre ajouté en 21, une classe supprimée en 23 : avec un dossier de stubs par version, la même analyse se rejoue sur chaque version supportée en changeant une seule variable.

**Outiller l'IDE.** PhpStorm ou VS Code proposent la complétion, la navigation vers la déclaration et l'aide sur les paramètres de toutes les classes Dolibarr, même quand le module est développé hors d'une installation de Dolibarr.

## Ce que contient le dépôt

| Élément | Contenu |
|---|---|
| `dolibarr-10/` à `dolibarr-24/` | Un dossier par version majeure de Dolibarr, avec la même arborescence que `htdocs/` |
| `phpstan/dolibarr-core.stub` | Corrections des PHPDoc fausses du coeur de Dolibarr, à charger dans PHPStan |
| `composer.json` | Le paquet Composer `caprel/dolibarr-stubs-all` |

Chaque dossier de version pèse entre 18 et 30 Mo. Le dépôt complet dépasse 300 Mo, d'où l'intérêt de ne récupérer que les versions utiles (voir [Installation](/dolibarr-stubs/installation)).

## Par où commencer

1. [Installation](/dolibarr-stubs/installation) : récupérer les stubs, par Composer ou par un clone partiel.
2. [Configurer PHPStan](/dolibarr-stubs/phpstan) : la configuration minimale, vérifiée sur Dolibarr 18 et 22.
3. [Corrections des PHPDoc du coeur](/dolibarr-stubs/correctifs-phpdoc) : le fichier qui évite une centaine de faux positifs.
4. [Monter le niveau d'analyse](/dolibarr-stubs/monter-en-niveau) : la progression palier par palier, avec les coûts mesurés.
5. [Intégration continue](/dolibarr-stubs/integration-continue) : rejouer l'analyse sur chaque version à chaque push.
6. [Utilisation dans un IDE](/dolibarr-stubs/ide) : PhpStorm et VS Code.
7. [Pièges connus](/dolibarr-stubs/pieges) : les symptômes trompeurs et leur cause.
8. [Comment les stubs sont produits](/dolibarr-stubs/generation) : l'origine des fichiers et la façon de signaler une erreur.

## Prérequis

- PHPStan 1.10 ou 2.x. PHPStan 2 demande PHP 7.4 ou plus et offre le niveau 10 ; PHPStan 1.10 s'arrête au niveau 9.
- Git ou Composer pour récupérer les stubs.
- Aucune installation de Dolibarr n'est nécessaire.

## Licence

Les stubs sont dérivés des sources de Dolibarr et distribués sous la même licence, GPL-3.0 ou ultérieure.
