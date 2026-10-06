---
title: "Configurer PHPStan"
weight: 20
description: "Configuration PHPStan minimale pour analyser un module Dolibarr avec les stubs, version de Dolibarr choisie par variable d'environnement."
---

# Configurer PHPStan

Cette page donne une configuration minimale qui fonctionne. Elle a été vérifiée avec PHPStan 2.2 sur un module d'essai, contre les stubs de Dolibarr 18 et 22.

## Le principe

PHPStan reçoit trois choses :

- **`paths`** : le code de votre module, qu'il analyse et sur lequel il signale des erreurs ;
- **`scanDirectories`** : les stubs d'une version de Dolibarr, qu'il lit pour connaître les symboles, sans jamais y signaler d'erreur ;
- **`stubFiles`** : le fichier de corrections des PHPDoc du coeur, qui remplace certaines déclarations des stubs (voir [Corrections des PHPDoc du coeur](/dolibarr-stubs/correctifs-phpdoc)).

Le chemin des stubs et la version de Dolibarr ne sont pas écrits en dur : ils viennent de deux variables d'environnement. Le même fichier de configuration sert ainsi sur tous les postes, en intégration continue, et pour toutes les versions.

## Le fichier de configuration

Créez `phpstan.dist.neon` à la racine du module et versionnez-le :

```neon
parameters:
	level: 5
	paths:
		- admin
		- class
		- core
		- lib
		- mymodule_card.php
		- mymodule_list.php
	scanDirectories:
		- %env.DOLIBARR_STUBS%/dolibarr-%env.DOLIBARR_VERSION%
	stubFiles:
		- %env.DOLIBARR_STUBS%/phpstan/dolibarr-core.stub
	bootstrapFiles:
		- phpstan-bootstrap.php
	treatPhpDocTypesAsCertain: false
```

Adaptez `paths` aux dossiers et fichiers réels du module : PHPStan refuse de démarrer si l'un d'eux n'existe pas. Gardez une liste explicite, sans `.` : c'est ce qui empêche PHPStan de parcourir `vendor/`, et les stubs avec si vous les avez installés par Composer (voir la section "Analyser tout le dépôt avec paths" des [Pièges connus](/dolibarr-stubs/pieges)).

Il est inutile d'ajouter les stubs à `excludePaths` : un dossier passé en `scanDirectories` n'est jamais analysé, seulement lu.

`treatPhpDocTypesAsCertain: false` est expliqué dans [Monter le niveau d'analyse](/dolibarr-stubs/monter-en-niveau).

## Le fichier de bootstrap

Dolibarr définit plusieurs constantes au démarrage. PHPStan ne les connaît pas : sans elles, chaque `MAIN_DB_PREFIX` ou `DOL_DOCUMENT_ROOT` devient une erreur. Créez `phpstan-bootstrap.php` :

```php
<?php

// Constants defined by Dolibarr at runtime, unknown to a static analysis
define('DOL_DOCUMENT_ROOT', __DIR__.'/../..');
define('DOL_DATA_ROOT', __DIR__.'/../../../documents');
define('DOL_URL_ROOT', '');
define('MAIN_DB_PREFIX', 'llx_');
```

Ajoutez-y les autres constantes que votre module utilise et que PHPStan signale comme inconnues.

## Lancer l'analyse

```bash
DOLIBARR_STUBS=$HOME/dolibarr-stubs-all DOLIBARR_VERSION=18 vendor/bin/phpstan analyse
```

PHPStan trouve seul `phpstan.dist.neon` dans le dossier courant. Si l'une des deux variables manque, il s'arrête avec `Missing parameter 'env.DOLIBARR_STUBS'`.

Pour vérifier toutes les versions que le module supporte :

```bash
export DOLIBARR_STUBS=$HOME/dolibarr-stubs-all
for v in 18 19 20 21 22 23; do
	DOLIBARR_VERSION=$v vendor/bin/phpstan analyse --no-progress || echo "Erreurs sur Dolibarr $v"
done
```

Chaque version doit être présente dans le clone : `git sparse-checkout set phpstan dolibarr-18 dolibarr-19 ...` (voir [Installation](/dolibarr-stubs/installation)).

## Déclarer les variables globales des pages

Une page de module commence par `require '../../main.inc.php';`, qui crée `$db`, `$langs`, `$user`, `$conf` et quelques autres. PHPStan ne suit pas ce `require` : pour lui, ces variables n'existent pas, et chaque ligne qui les utilise rapporte `Variable $langs might not be defined`.

Déclarez-les juste après le `require`, avec leur type :

```php
<?php

require '../../main.inc.php';
/**
 * Globals set by main.inc.php
 *
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
```

Ne gardez que celles que la page utilise.

> [!TIP]
> Préférez cette déclaration à un `ignoreErrors` sur `might not be defined`. Un ignore fait taire l'erreur, mais la variable reste de type inconnu : un appel à une méthode qui n'existe pas, comme `$langs->transnoentitiesaliases()`, passe alors sans bruit et casse la page en production. Avec la déclaration typée, PHPStan le signale : `Call to an undefined method Translate::transnoentitiesaliases()`.

Dans une méthode de classe, le problème prend une autre forme. `global $langs;` ne provoque pas d'erreur, mais PHPStan donne à la variable le type `mixed` : il ne vérifie alors aucun appel fait dessus. Typez-la de la même façon, juste avant le `global` :

```php
	public function label()
	{
		/** @var Translate $langs */
		global $langs;

		return $langs->trans('MyLabel');
	}
```

Vérifié avec PHPStan 1.10 et 2.2 : sans le `@var`, `$langs` est `mixed` et un appel à une méthode inexistante passe ; avec, il est signalé.

## Les inclusions introuvables

PHPStan 2 vérifie que chaque `require` et `include` pointe vers un fichier existant. Un module développé hors de `htdocs/custom/` ne trouve ni `../../main.inc.php`, ni les classes qu'il inclut avec `DOL_DOCUMENT_ROOT`. Chacune de ces lignes rapporte `Path in require() "..." is not a file or it does not exist`.

Sur un poste où le module n'est pas installé dans un Dolibarr, ajoutez :

```neon
parameters:
	ignoreErrors:
		- '#^Path in (require|include)(_once)?\(\) "[^"]+" is not a file or it does not exist\.$#'
```

PHPStan 1.10 ne fait pas cette vérification. Avec lui, cet ignore ne correspond à rien et PHPStan le signale comme inutile : ne l'ajoutez qu'avec PHPStan 2.

## Séparer le versionné du local

Le fichier `phpstan.dist.neon` ne contient aucun chemin propre à une machine : il se versionne tel quel. Si un développeur a besoin de réglages à lui (dossier de cache, ignores liés à son poste), il crée un `phpstan.neon` non versionné qui inclut le premier :

```neon
includes:
	- phpstan.dist.neon
parameters:
	tmpDir: /tmp/phpstan-mymodule
```

Quand les deux fichiers existent, PHPStan prend `phpstan.neon` en priorité. Ajoutez `phpstan.neon` au `.gitignore` du module.

Attention : neon fusionne les listes au lieu de les remplacer. Un `ignoreErrors` ou un `scanDirectories` du fichier local s'ajoute à celui du fichier versionné, il ne le remplace pas.

La suite : [Corrections des PHPDoc du coeur](/dolibarr-stubs/correctifs-phpdoc).
