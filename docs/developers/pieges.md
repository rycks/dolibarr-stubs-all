---
title: "Pièges connus"
weight: 70
description: "Les erreurs trompeuses rencontrées en analysant des modules Dolibarr avec les stubs, leur vraie cause et leur remède."
---

# Pièges connus

Chaque piège ci-dessous a été rencontré sur de vrais modules. Le symptôme y est souvent trompeur : c'est pourquoi chaque section commence par lui.

## Analyser tout le dépôt avec paths

**Symptôme** : l'analyse dure plusieurs minutes, consomme plus d'un gigaoctet, finit par `Allowed memory size exhausted in FileFinder.php`, ou signale des erreurs absurdes comme `Call to an undefined method MyObject::countThirdparties()` sur une méthode qui existe.

**Cause** : `paths: - .` fait parcourir tout le dossier du module à PHPStan, `vendor/` compris. Avec les stubs installés par Composer, cela fait 15 versions de Dolibarr à lire. Chaque version contient le modèle `MyObject` du modulebuilder, et PHPStan peut retenir l'une de ces classes à la place de la vôtre.

Mesuré sur un module de deux fichiers, stubs installés par Composer :

| Configuration | Durée | Mémoire |
|---|---|---|
| `paths: - .` sans exclusion | plus de 5 minutes, interrompu | 1,5 Go |
| `paths: - .` et `excludePaths.analyse: vendor/*` | 17 s, avec des erreurs fausses | 270 Mo |
| `paths: - .` et `excludePaths.analyseAndScan: vendor/*` | 5 s | 170 Mo |
| `paths` qui liste les dossiers sources | 3 s | 140 Mo |

**Remède** : listez vos dossiers et fichiers sources dans `paths`.

`excludePaths.analyse` ne fait que masquer les erreurs des fichiers exclus : PHPStan continue de les lire pour y chercher des classes. `excludePaths.analyseAndScan` les écarte vraiment, mais PHPStan énumère quand même toute l'arborescence avant d'appliquer l'exclusion. Si le dépôt contient un lien symbolique qui revient sur lui-même (un environnement de test qui expose le module dans un faux `htdocs/custom/`, par exemple), cette énumération tourne en boucle et l'analyse meurt avant d'avoir regardé les exclusions. Seule une liste explicite dans `paths` évite ce cas.

`paths` n'accepte pas de motifs : `- *.php` donne `Path *.php does not exist`. Pour ne pas oublier les nouveaux fichiers PHP à la racine du module, faites développer la liste par `make` et passez-la en ligne de commande, où elle remplace celle du fichier de configuration :

```makefile
PHPSTAN_PATHS := $(wildcard admin ajax class core lib tpl) $(wildcard *.php)

phpstan:
	vendor/bin/phpstan analyse --memory-limit=512M $(PHPSTAN_PATHS)
```

`$(wildcard ...)` ignore les dossiers qui n'existent pas : la même ligne sert à tous les modules.

## Un cache partagé entre deux versions de PHPStan

**Symptôme** : PHPStan 2 s'arrête au démarrage avec une erreur interne du type `ResultCacheManager ... Argument #1 ($byFile) must be of type array, null given`.

**Cause** : le même répertoire de cache a été utilisé auparavant par PHPStan 1.

**Remède** : un répertoire de cache par version de PHPStan, et par projet, avec `tmpDir` dans la configuration :

```neon
parameters:
	tmpDir: /tmp/phpstan-mymodule
```

## Un dossier de cache qui appartient à quelqu'un d'autre

**Symptôme** : sur une machine partagée par plusieurs comptes, PHPStan échoue pour tous les utilisateurs sauf un, avec une erreur d'écriture qui ne nomme pas la cause.

**Cause** : sans `tmpDir`, PHPStan écrit dans `/tmp/phpstan`. Le premier compte qui l'utilise crée ce dossier à son nom, et les autres ne peuvent plus y écrire.

**Remède** : un `tmpDir` propre à chaque utilisateur, dans un fichier de configuration non versionné : `tmpDir: /tmp/phpstan-mymodule-%env.USER%`. Écrivez bien `%env.USER%` : PHPStan n'interprète pas `$USER`, qui donnerait un dossier nommé littéralement `$USER`, partagé par tout le monde.

## Un `TMPDIR` qui n'existe pas

**Symptôme** : `Failed creating temp file for stdout`, écrit sur la sortie d'erreur. Si vous comptez les erreurs en masquant cette sortie (`2>/dev/null | grep -c ...`), vous obtenez 0 et concluez à tort que tout va bien.

**Cause** : la variable d'environnement `TMPDIR` pointe vers un dossier absent. PHPStan l'utilise pour communiquer avec ses processus parallèles.

**Remède** : créez le dossier avant de lancer l'analyse, et ne masquez pas la sortie d'erreur quand vous mesurez.

## `llxHeader invoked with 2 parameters, 0 required`

**Symptôme** : chaque appel à `llxHeader()` est signalé sur les versions anciennes de Dolibarr, puis plus du tout à partir de la 21.

**Cause** : jusqu'à Dolibarr 20, plusieurs pages du coeur (`document.php`, `viewimage.php`, des pages publiques) redéclarent `llxHeader()` sans paramètres, et PHPStan peut retenir l'une de ces déclarations.

**Remède** : un ignore ciblé, qui ne doit pas être signalé comme inutile sur les versions récentes (PHPStan 2) :

```neon
parameters:
	ignoreErrors:
		-
			message: '#^Function llxHeader invoked with \d+ parameters?, 0 required\.$#'
			reportUnmatched: false
```

## Un test sur `DOL_VERSION` déclaré toujours faux

**Symptôme** : `Comparison operation ">=" between 18 and 20 is always false` sur une ligne comme `if ((int) DOL_VERSION >= 20)`, et la branche correspondante signalée comme du code mort.

**Cause** : chaque dossier de stubs définit `DOL_VERSION` avec sa valeur (`'18.0.4'` pour Dolibarr 18). PHPStan remplace la constante par cette valeur et calcule le résultat de la comparaison.

**Remède** : déclarez la constante comme variable :

```neon
parameters:
	dynamicConstantNames:
		- DOL_VERSION
```

`version_compare(DOL_VERSION, '20.0.0', '>=')` n'est pas concerné : PHPStan ne calcule pas le résultat de `version_compare()`.

## Une version de stubs absente du clone

**Symptôme** : `Path .../dolibarr-21 does not exist` au démarrage.

**Cause** : le clone partiel ne contient que les versions demandées à `git sparse-checkout set`.

**Remède** : `git sparse-checkout set phpstan dolibarr-18 dolibarr-21`, avec la liste complète des versions voulues.

## Des fonctions documentées mais vues comme non typées

**Symptôme** : PHPStan signale l'absence de type sur une fonction dont le bloc de commentaire décrit pourtant les paramètres et le retour.

**Cause** : le bloc commence par `/***` ou `/****`. PHPStan ne lit comme PHPDoc que les blocs qui commencent exactement par `/**`.

**Remède** : remplacez l'ouverture par `/**`. Toute la documentation existante redevient utile d'un coup.

## `isset()` sur un paramètre

**Symptôme** : `Variable $param might not be defined` plus bas dans une fonction, alors que `$param` est un paramètre.

**Cause** : un `if (isset($param))` sur un paramètre qui a une valeur par défaut. Le paramètre existe toujours, mais PHPStan en déduit qu'il peut ne pas exister dans la branche où `isset()` est faux.

**Remède** : supprimez le `isset()`, ou remplacez-le par un test sur la valeur (`$param !== null`).

## `|=` sur un `include_once`

**Symptôme** : aucun, et c'est le problème. Le motif vient du modulebuilder, on le trouve dans la plupart des modules :

```php
$mybool |= @include_once $dir.$file;
...
if ($mybool === false) {
```

**Cause** : `|=` transforme le booléen en entier. Le test `=== false` ne peut plus jamais être vrai, et un fichier de numérotation manquant passe sans un mot. PHPStan le signale à partir du niveau 4 (comparaison toujours fausse).

**Remède**, celui du coeur de Dolibarr récent :

```php
$mybool = ((bool) @include_once $dir.$file) || $mybool;
...
if (!$mybool) {
```

La suite : [Comment les stubs sont produits](/dolibarr-stubs/generation).
