---
title: "How the stubs are produced"
weight: 80
description: "Where the Dolibarr stubs come from, what the generator keeps and removes, and how to report a wrong stub."
source_hash: "163d4163"
---

# How the stubs are produced

## Origin

The stubs are generated from the official Dolibarr sources, published on [github.com/Dolibarr/dolibarr](https://github.com/Dolibarr/dolibarr). Each `dolibarr-NN/` folder matches a stable release of branch NN: for example, `dolibarr-18/` comes from Dolibarr 18.0.4 and `dolibarr-22/` from Dolibarr 22.0.4. The exact version is the value of the `DOL_VERSION` constant, defined in `dolibarr-NN/filefunc.inc.php`, or in `dolibarr-NN/version.inc.php` from Dolibarr 23 on.

The generator is the [php-stubs/generator](https://github.com/php-stubs/generator) tool, driven by the scripts of the [dolibarr-stubs](https://github.com/rycks/dolibarr-stubs) repository.

## What the generation does

The generator processes each PHP file of `htdocs/` separately and writes its stub at the same place in `dolibarr-NN/`. A developer therefore finds a class where they would look for it in Dolibarr: `dolibarr-18/societe/class/societe.class.php` holds the stub of `htdocs/societe/class/societe.class.php`.

| Kept | Removed |
|---|---|
| Classes, interfaces, traits, with their properties and constants | The body of functions and methods |
| Signatures of functions and methods | The code run when a page loads |
| Constants defined with `define()` | Files with no declaration at all |
| PHPDoc blocks, as they are in the sources | The TCPDF font files |

The TCPDF font files only hold data arrays, useless for the analysis.

The third-party libraries Dolibarr ships in `htdocs/includes/` (TCPDF, Sabre, Stripe, PhpOffice...) are processed like the rest. A module that calls one of them directly is therefore checked as well.

## What it implies

**The PHPDoc of the stubs is the one of Dolibarr.** A wrong PHPDoc in the core is wrong in the stubs too. This is the reason for the [phpstan/dolibarr-core.stub](/dolibarr-stubs/correctifs-phpdoc) file, which fixes the most troublesome ones without touching the generated stubs.

**A stub says nothing about behaviour.** PHPStan checks that your calls follow the documented signatures and types. It does not know what a method really does, nor whether a page works once installed. The stubs complement the tests of a module, they do not replace them.

**A stubs version does not follow minor fixes.** `dolibarr-18/` matches one precise release of branch 18. A signature changed in a later maintenance release only shows up after regeneration.

## Reporting a problem

Open an issue on [dolibarr-stubs-all](https://github.com/rycks/dolibarr-stubs-all/issues), stating:

- the Dolibarr version and the file concerned;
- what the stub contains and what the Dolibarr sources contain for the same version;
- the PHPStan error or the completion defect it causes.

For a wrong PHPDoc in the Dolibarr core, the fix goes into `phpstan/dolibarr-core.stub`: see the "Proposing a fix" section of the [Core PHPDoc fixes](/dolibarr-stubs/correctifs-phpdoc) page. It is also best to report it to Dolibarr itself, so that it disappears from the next versions.

## Supporting the project

The stubs are maintained by [CAP-REL](https://cap-rel.fr/services/soutien-rd/). If these stubs save you time, you can support this work.
