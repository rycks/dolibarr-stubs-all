---
title: "Dolibarr stubs"
weight: 1
description: "Analyse a Dolibarr module with PHPStan and equip your IDE, without installing Dolibarr, on every version from 10 to 24."
source_hash: "c95ad19c"
---

# Dolibarr stubs for PHPStan and IDEs

The [dolibarr-stubs-all](https://github.com/rycks/dolibarr-stubs-all) repository provides the **stubs** of Dolibarr, from version 10 to version 24. A stub is a copy of a source file that keeps only its declarations: classes, interfaces, traits, functions and constants, with their signatures and PHPDoc blocks. Function bodies are empty and the executable code of the pages is gone.

This skeleton is enough for a static analysis tool or an editor to know what Dolibarr contains: which classes exist, which methods they offer, which parameters they expect and what they return.

## What it is for

**Analysing a module with PHPStan without installing Dolibarr.** Your module calls `Societe::fetch()`, `dol_print_date()` or `$langs->trans()`. To check these calls, PHPStan has to know these symbols. The stubs provide them, with no database, no web server and no full copy of the sources.

**Checking a module against several Dolibarr versions.** A method renamed in Dolibarr 20, a parameter added in 21, a class removed in 23: with one stubs folder per version, the same analysis runs again on each supported version by changing a single variable.

**Equipping the IDE.** PhpStorm or VS Code offer completion, go-to-declaration and parameter hints for every Dolibarr class, even when the module is developed outside a Dolibarr installation.

## What the repository contains

| Item | Content |
|---|---|
| `dolibarr-10/` to `dolibarr-24/` | One folder per major Dolibarr version, with the same tree as `htdocs/` |
| `phpstan/dolibarr-core.stub` | Fixes for the wrong PHPDoc of the Dolibarr core, to load in PHPStan |
| `composer.json` | The `caprel/dolibarr-stubs-all` Composer package |

Each version folder weighs between 18 and 30 MB. The full repository exceeds 300 MB, hence the point of fetching only the versions you need (see [Installation](/dolibarr-stubs/installation)).

## Where to start

1. [Installation](/dolibarr-stubs/installation): get the stubs, with Composer or with a partial clone.
2. [Configuring PHPStan](/dolibarr-stubs/phpstan): the minimal configuration, checked against Dolibarr 18 and 22.
3. [Core PHPDoc fixes](/dolibarr-stubs/correctifs-phpdoc): the file that avoids a hundred false positives.
4. [Raising the analysis level](/dolibarr-stubs/monter-en-niveau): the step-by-step progression, with measured costs.
5. [Continuous integration](/dolibarr-stubs/integration-continue): run the analysis on every version at every push.
6. [Using the stubs in an IDE](/dolibarr-stubs/ide): PhpStorm and VS Code.
7. [Known pitfalls](/dolibarr-stubs/pieges): misleading symptoms and their cause.
8. [How the stubs are produced](/dolibarr-stubs/generation): where the files come from and how to report an error.

## Requirements

- PHPStan 1.10 or 2.x. PHPStan 2 needs PHP 7.4 or later and offers level 10; PHPStan 1.10 stops at level 9.
- Git or Composer to fetch the stubs.
- No Dolibarr installation is needed.

## License

The stubs are derived from the Dolibarr sources and distributed under the same license, GPL-3.0 or later.
