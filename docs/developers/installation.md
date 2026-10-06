---
title: "Installation"
weight: 10
description: "Récupérer les stubs Dolibarr par un clone Git partiel ou par Composer, et choisir la méthode adaptée."
---

# Installation

Deux méthodes, qui donnent les mêmes fichiers. Le choix dépend de l'endroit où les stubs doivent vivre.

| Méthode | Taille récupérée | Quand la choisir |
|---|---|---|
| Clone Git partiel | 32 Mo pour une version | Poste de développement, intégration continue, IDE |
| Composer | 309 Mo (toutes les versions) | Projet qui veut tout déclarer dans son `composer.json` |

## Clone Git partiel (recommandé)

Un clone partiel ne télécharge que les dossiers demandés. Pour Dolibarr 18 et le fichier de corrections PHPStan :

```bash
git clone --depth 1 --filter=blob:none --sparse https://github.com/rycks/dolibarr-stubs-all.git ~/dolibarr-stubs-all
cd ~/dolibarr-stubs-all
git sparse-checkout set phpstan dolibarr-18
```

Les deux commandes prennent environ trois secondes et occupent 32 Mo, historique Git compris.

Pour ajouter des versions plus tard, relancez `sparse-checkout` avec la liste complète :

```bash
git sparse-checkout set phpstan dolibarr-18 dolibarr-20 dolibarr-22
```

Pour mettre à jour les stubs, un `git pull` dans le clone suffit.

Placez ce clone **hors du dossier de votre module**. Les stubs ne font pas partie de votre code : ils n'ont rien à faire dans son dépôt, et un outil qui parcourt le module n'a pas à les traverser.

## Composer

Le paquet s'appelle `caprel/dolibarr-stubs-all`. Il n'existe qu'en version `dev-master`, il n'y a pas de version taguée :

```bash
composer require --dev caprel/dolibarr-stubs-all:dev-master
```

Les stubs arrivent dans `vendor/caprel/dolibarr-stubs-all/`, avec les 15 versions de Dolibarr d'un coup.

> [!WARNING]
> Avec cette méthode, les 309 Mo de stubs se trouvent dans le `vendor/` de votre module. Une configuration PHPStan qui analyse `.` les parcourt alors tous : l'analyse d'un module de deux fichiers passe de 3 secondes à plus de 5 minutes et 1,5 Go de mémoire. Listez vos dossiers sources dans `paths`, voir [Configurer PHPStan](/dolibarr-stubs/phpstan).

## Où pointer ensuite

Quelle que soit la méthode, PHPStan et l'IDE ont besoin de deux chemins :

| Chemin | Rôle |
|---|---|
| `<stubs>/dolibarr-NN/` | Les déclarations de la version NN de Dolibarr |
| `<stubs>/phpstan/dolibarr-core.stub` | Les corrections de PHPDoc, pour PHPStan uniquement |

`<stubs>` vaut `~/dolibarr-stubs-all` avec le clone ci-dessus, ou `vendor/caprel/dolibarr-stubs-all` avec Composer.

La suite : [Configurer PHPStan](/dolibarr-stubs/phpstan).
