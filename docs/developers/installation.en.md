---
title: "Installation"
weight: 10
description: "Fetch the Dolibarr stubs with a partial Git clone or with Composer, and pick the right method."
source_hash: "9d0f1f18"
---

# Installation

Two methods, which give the same files. The choice depends on where the stubs should live.

| Method | Downloaded size | When to choose it |
|---|---|---|
| Partial Git clone | 32 MB for one version | Development workstation, continuous integration, IDE |
| Composer | 309 MB (every version) | A project that wants everything declared in its `composer.json` |

## Partial Git clone (recommended)

A partial clone downloads only the folders you ask for. For Dolibarr 18 and the PHPStan fixes file:

```bash
git clone --depth 1 --filter=blob:none --sparse https://github.com/rycks/dolibarr-stubs-all.git ~/dolibarr-stubs-all
cd ~/dolibarr-stubs-all
git sparse-checkout set phpstan dolibarr-18
```

Both commands take about three seconds and use 32 MB, Git history included.

To add versions later, run `sparse-checkout` again with the full list:

```bash
git sparse-checkout set phpstan dolibarr-18 dolibarr-20 dolibarr-22
```

To update the stubs, a `git pull` in the clone is enough.

Keep this clone **outside your module folder**. The stubs are not part of your code: they do not belong in its repository, and a tool that walks the module has no reason to go through them.

## Composer

The package is `caprel/dolibarr-stubs-all`. It only exists as `dev-master`, there is no tagged version:

```bash
composer require --dev caprel/dolibarr-stubs-all:dev-master
```

The stubs land in `vendor/caprel/dolibarr-stubs-all/`, with all 15 Dolibarr versions at once.

> [!WARNING]
> With this method, the 309 MB of stubs sit in the `vendor/` folder of your module. A PHPStan configuration that analyses `.` then walks through all of them: analysing a two-file module goes from 3 seconds to more than 5 minutes and 1.5 GB of memory. List your source folders in `paths`, see [Configuring PHPStan](/dolibarr-stubs/phpstan).

## What to point at next

Whatever the method, PHPStan and the IDE need two paths:

| Path | Role |
|---|---|
| `<stubs>/dolibarr-NN/` | The declarations of Dolibarr version NN |
| `<stubs>/phpstan/dolibarr-core.stub` | The PHPDoc fixes, for PHPStan only |

`<stubs>` is `~/dolibarr-stubs-all` with the clone above, or `vendor/caprel/dolibarr-stubs-all` with Composer.

Next: [Configuring PHPStan](/dolibarr-stubs/phpstan).
