---
title: "Configuring PHPStan"
weight: 20
description: "Minimal PHPStan configuration to analyse a Dolibarr module with the stubs, with the Dolibarr version chosen by an environment variable."
source_hash: "ac716c3a"
---

# Configuring PHPStan

This page gives a minimal configuration that works. It was checked with PHPStan 2.2 on a sample module, against the Dolibarr 18 and 22 stubs.

## The principle

PHPStan is given three things:

- **`paths`**: the code of your module, which it analyses and on which it reports errors;
- **`scanDirectories`**: the stubs of one Dolibarr version, which it reads to learn the symbols, without ever reporting errors in them;
- **`stubFiles`**: the core PHPDoc fixes file, which overrides some declarations of the stubs (see [Core PHPDoc fixes](/dolibarr-stubs/correctifs-phpdoc)).

The stubs path and the Dolibarr version are not hardcoded: they come from two environment variables. The same configuration file thus works on every workstation, in continuous integration, and for every version.

## The configuration file

Create `phpstan.dist.neon` at the root of the module and commit it:

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

Adapt `paths` to the real folders and files of the module: PHPStan refuses to start if one of them does not exist. Keep an explicit list, without `.`: this is what stops PHPStan from walking through `vendor/`, and through the stubs if you installed them with Composer (see the "Analysing the whole repository with paths" section of [Known pitfalls](/dolibarr-stubs/pieges)).

There is no need to add the stubs to `excludePaths`: a folder given to `scanDirectories` is never analysed, only read.

`treatPhpDocTypesAsCertain: false` is explained in [Raising the analysis level](/dolibarr-stubs/monter-en-niveau).

## The bootstrap file

Dolibarr defines several constants at startup. PHPStan does not know them: without them, every `MAIN_DB_PREFIX` or `DOL_DOCUMENT_ROOT` becomes an error. Create `phpstan-bootstrap.php`:

```php
<?php

// Constants defined by Dolibarr at runtime, unknown to a static analysis
define('DOL_DOCUMENT_ROOT', __DIR__.'/../..');
define('DOL_DATA_ROOT', __DIR__.'/../../../documents');
define('DOL_URL_ROOT', '');
define('MAIN_DB_PREFIX', 'llx_');
```

Add the other constants your module uses and that PHPStan reports as unknown.

## Running the analysis

```bash
DOLIBARR_STUBS=$HOME/dolibarr-stubs-all DOLIBARR_VERSION=18 vendor/bin/phpstan analyse
```

PHPStan finds `phpstan.dist.neon` in the current folder on its own. If one of the two variables is missing, it stops with `Missing parameter 'env.DOLIBARR_STUBS'`.

To check every version the module supports:

```bash
export DOLIBARR_STUBS=$HOME/dolibarr-stubs-all
for v in 18 19 20 21 22 23; do
	DOLIBARR_VERSION=$v vendor/bin/phpstan analyse --no-progress || echo "Errors on Dolibarr $v"
done
```

Each version must be present in the clone: `git sparse-checkout set phpstan dolibarr-18 dolibarr-19 ...` (see [Installation](/dolibarr-stubs/installation)).

## Declaring the global variables of the pages

A module page starts with `require '../../main.inc.php';`, which creates `$db`, `$langs`, `$user`, `$conf` and a few others. PHPStan does not follow that `require`: for it, these variables do not exist, and every line that uses them reports `Variable $langs might not be defined`.

Declare them right after the `require`, with their type:

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

Keep only the ones the page uses.

> [!TIP]
> Prefer this declaration to an `ignoreErrors` on `might not be defined`. An ignore silences the error, but the variable keeps an unknown type: a call to a method that does not exist, such as `$langs->transnoentitiesaliases()`, then goes through without a sound and breaks the page in production. With the typed declaration, PHPStan reports it: `Call to an undefined method Translate::transnoentitiesaliases()`.

In a class method, the problem takes another form. `global $langs;` raises no error, but PHPStan gives the variable the `mixed` type: it then checks no call made on it. Type it the same way, right before the `global`:

```php
	public function label()
	{
		/** @var Translate $langs */
		global $langs;

		return $langs->trans('MyLabel');
	}
```

Checked with PHPStan 1.10 and 2.2: without the `@var`, `$langs` is `mixed` and a call to a missing method goes through; with it, the call is reported.

## Includes that cannot be found

PHPStan 2 checks that every `require` and `include` points to an existing file. A module developed outside `htdocs/custom/` finds neither `../../main.inc.php` nor the classes it includes through `DOL_DOCUMENT_ROOT`. Each of these lines reports `Path in require() "..." is not a file or it does not exist`.

On a workstation where the module is not installed in a Dolibarr, add:

```neon
parameters:
	ignoreErrors:
		- '#^Path in (require|include)(_once)?\(\) "[^"]+" is not a file or it does not exist\.$#'
```

PHPStan 1.10 does not run this check. With it, this ignore matches nothing and PHPStan reports it as useless: only add it with PHPStan 2.

## Separating what is committed from what is local

The `phpstan.dist.neon` file contains no path specific to a machine: it is committed as is. If a developer needs personal settings (cache folder, ignores tied to their workstation), they create an uncommitted `phpstan.neon` that includes the first one:

```neon
includes:
	- phpstan.dist.neon
parameters:
	tmpDir: /tmp/phpstan-mymodule
```

When both files exist, PHPStan picks `phpstan.neon` first. Add `phpstan.neon` to the `.gitignore` of the module.

Beware: neon merges lists instead of replacing them. An `ignoreErrors` or a `scanDirectories` of the local file is added to the one of the committed file, it does not replace it.

Next: [Core PHPDoc fixes](/dolibarr-stubs/correctifs-phpdoc).
