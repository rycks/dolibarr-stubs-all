---
title: "Known pitfalls"
weight: 70
description: "The misleading errors met while analysing Dolibarr modules with the stubs, their real cause and their remedy."
source_hash: "583fe976"
---

# Known pitfalls

Each pitfall below was met on real modules. The symptom is often misleading: that is why each section starts with it.

## Analysing the whole repository with paths

**Symptom**: the analysis lasts several minutes, uses more than a gigabyte, ends with `Allowed memory size exhausted in FileFinder.php`, or reports absurd errors such as `Call to an undefined method MyObject::countThirdparties()` on a method that exists.

**Cause**: `paths: - .` makes PHPStan walk the whole module folder, `vendor/` included. With the stubs installed through Composer, that means 15 Dolibarr versions to read. Each version contains the `MyObject` template of the modulebuilder, and PHPStan may pick one of these classes instead of yours.

Measured on a two-file module, stubs installed through Composer:

| Configuration | Duration | Memory |
|---|---|---|
| `paths: - .` without exclusion | more than 5 minutes, interrupted | 1.5 GB |
| `paths: - .` and `excludePaths.analyse: vendor/*` | 17 s, with wrong errors | 270 MB |
| `paths: - .` and `excludePaths.analyseAndScan: vendor/*` | 5 s | 170 MB |
| `paths` listing the source folders | 3 s | 140 MB |

**Remedy**: list your source folders and files in `paths`.

`excludePaths.analyse` only hides the errors of the excluded files: PHPStan still reads them to look for classes. `excludePaths.analyseAndScan` really sets them aside, but PHPStan still enumerates the whole tree before applying the exclusion. If the repository contains a symbolic link that points back to itself (a test environment that exposes the module in a fake `htdocs/custom/`, for instance), this enumeration loops and the analysis dies before looking at the exclusions. Only an explicit list in `paths` avoids that case.

`paths` does not accept patterns: `- *.php` gives `Path *.php does not exist`. To avoid forgetting new PHP files at the root of the module, let `make` expand the list and pass it on the command line, where it replaces the one of the configuration file:

```makefile
PHPSTAN_PATHS := $(wildcard admin ajax class core lib tpl) $(wildcard *.php)

phpstan:
	vendor/bin/phpstan analyse --memory-limit=512M $(PHPSTAN_PATHS)
```

`$(wildcard ...)` ignores the folders that do not exist: the same line works for every module.

## A cache shared between two PHPStan versions

**Symptom**: PHPStan 2 stops at startup with an internal error such as `ResultCacheManager ... Argument #1 ($byFile) must be of type array, null given`.

**Cause**: the same cache folder was used before by PHPStan 1.

**Remedy**: one cache folder per PHPStan version, and per project, with `tmpDir` in the configuration:

```neon
parameters:
	tmpDir: /tmp/phpstan-mymodule
```

## A cache folder owned by someone else

**Symptom**: on a machine shared by several accounts, PHPStan fails for every user but one, with a write error that does not name the cause.

**Cause**: without `tmpDir`, PHPStan writes to `/tmp/phpstan`. The first account that uses it creates this folder in its name, and the others can no longer write to it.

**Remedy**: a `tmpDir` specific to each user, in an uncommitted configuration file: `tmpDir: /tmp/phpstan-mymodule-%env.USER%`. Do write `%env.USER%`: PHPStan does not expand `$USER`, which would give a folder literally named `$USER`, shared by everyone.

## A `TMPDIR` that does not exist

**Symptom**: `Failed creating temp file for stdout`, written to the error output. If you count errors while hiding that output (`2>/dev/null | grep -c ...`), you get 0 and wrongly conclude that all is well.

**Cause**: the `TMPDIR` environment variable points to a missing folder. PHPStan uses it to talk to its parallel processes.

**Remedy**: create the folder before running the analysis, and do not hide the error output when you measure.

## `llxHeader invoked with 2 parameters, 0 required`

**Symptom**: every call to `llxHeader()` is reported on older Dolibarr versions, then not at all from 21 on.

**Cause**: up to Dolibarr 20, several core pages (`document.php`, `viewimage.php`, some public pages) redeclare `llxHeader()` without parameters, and PHPStan may pick one of these declarations.

**Remedy**: a targeted ignore, which must not be reported as useless on recent versions (PHPStan 2):

```neon
parameters:
	ignoreErrors:
		-
			message: '#^Function llxHeader invoked with \d+ parameters?, 0 required\.$#'
			reportUnmatched: false
```

## A test on `DOL_VERSION` declared always false

**Symptom**: `Comparison operation ">=" between 18 and 20 is always false` on a line such as `if ((int) DOL_VERSION >= 20)`, and the matching branch reported as dead code.

**Cause**: each stubs folder defines `DOL_VERSION` with its value (`'18.0.4'` for Dolibarr 18). PHPStan replaces the constant with that value and computes the result of the comparison.

**Remedy**: declare the constant as variable:

```neon
parameters:
	dynamicConstantNames:
		- DOL_VERSION
```

`version_compare(DOL_VERSION, '20.0.0', '>=')` is not affected: PHPStan does not compute the result of `version_compare()`.

## A stubs version missing from the clone

**Symptom**: `Path .../dolibarr-21 does not exist` at startup.

**Cause**: the partial clone only contains the versions requested with `git sparse-checkout set`.

**Remedy**: `git sparse-checkout set phpstan dolibarr-18 dolibarr-21`, with the full list of the versions you want.

## Documented functions seen as untyped

**Symptom**: PHPStan reports missing types on a function whose comment block does describe the parameters and the return value.

**Cause**: the block starts with `/***` or `/****`. PHPStan only reads as PHPDoc the blocks that start exactly with `/**`.

**Remedy**: replace the opening with `/**`. All the existing documentation becomes useful at once.

## `isset()` on a parameter

**Symptom**: `Variable $param might not be defined` further down a function, although `$param` is a parameter.

**Cause**: an `if (isset($param))` on a parameter that has a default value. The parameter always exists, but PHPStan infers that it may not exist in the branch where `isset()` is false.

**Remedy**: remove the `isset()`, or replace it with a test on the value (`$param !== null`).

## `|=` on an `include_once`

**Symptom**: none, and that is the problem. The pattern comes from the modulebuilder, it is found in most modules:

```php
$mybool |= @include_once $dir.$file;
...
if ($mybool === false) {
```

**Cause**: `|=` turns the boolean into an integer. The `=== false` test can never be true again, and a missing numbering file goes through without a word. PHPStan reports it from level 4 up (comparison always false).

**Remedy**, the one of the recent Dolibarr core:

```php
$mybool = ((bool) @include_once $dir.$file) || $mybool;
...
if (!$mybool) {
```

Next: [How the stubs are produced](/dolibarr-stubs/generation).
