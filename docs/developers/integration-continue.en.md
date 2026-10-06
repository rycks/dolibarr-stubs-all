---
title: "Continuous integration"
weight: 50
description: "Run the PHPStan analysis of a module on every Dolibarr version at each push, with GitLab CI or GitHub Actions."
source_hash: "5db0ccc6"
---

# Continuous integration

The goal: at each push, analyse the module once per supported Dolibarr version. Each job only fetches the version it analyses, thanks to the partial clone described in [Installation](/dolibarr-stubs/installation).

The examples assume:

- a `phpstan.dist.neon` that reads `DOLIBARR_STUBS` and `DOLIBARR_VERSION`, as in [Configuring PHPStan](/dolibarr-stubs/phpstan);
- PHPStan declared in the `composer.json` of the module (`composer require --dev phpstan/phpstan`).

## GitLab CI

```yaml
phpstan:
  image: php:8.2-cli
  parallel:
    matrix:
      - DOLIBARR_VERSION: ["18", "19", "20", "21", "22", "23"]
  variables:
    DOLIBARR_STUBS: /tmp/dolibarr-stubs-all
  before_script:
    - apt-get update -qq && apt-get install -y -qq git unzip > /dev/null
    - php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    - php composer-setup.php --quiet --install-dir=/usr/local/bin --filename=composer
    - git clone --depth 1 --filter=blob:none --sparse https://github.com/rycks/dolibarr-stubs-all.git "$DOLIBARR_STUBS"
    - git -C "$DOLIBARR_STUBS" sparse-checkout set phpstan "dolibarr-$DOLIBARR_VERSION"
    - composer install --no-interaction --no-progress
  script:
    - vendor/bin/phpstan analyse --no-progress
```

`parallel:matrix` creates one job per version. A failing job points directly at the Dolibarr version at fault.

## GitHub Actions

```yaml
name: PHPStan

on: [push, pull_request]

jobs:
  phpstan:
    runs-on: ubuntu-latest
    strategy:
      fail-fast: false
      matrix:
        dolibarr: ["18", "19", "20", "21", "22", "23"]
    env:
      DOLIBARR_STUBS: ${{ github.workspace }}/../dolibarr-stubs-all
      DOLIBARR_VERSION: ${{ matrix.dolibarr }}
    steps:
      - uses: actions/checkout@v4
      - uses: shivammathur/setup-php@v2
        with:
          php-version: "8.2"
          tools: composer
      - name: Fetch the Dolibarr stubs
        run: |
          git clone --depth 1 --filter=blob:none --sparse https://github.com/rycks/dolibarr-stubs-all.git "$DOLIBARR_STUBS"
          git -C "$DOLIBARR_STUBS" sparse-checkout set phpstan "dolibarr-$DOLIBARR_VERSION"
      - run: composer install --no-interaction --no-progress
      - run: vendor/bin/phpstan analyse --no-progress
```

`fail-fast: false` lets the other versions run when one fails: you see every broken version at once.

The clone is placed outside the module folder, so that PHPStan does not walk through it.

## Choosing the PHP version

PHPStan analyses the code according to the PHP version that runs it. A module that must run on PHP 7.4 must therefore also be analysed on PHP 7.4, otherwise a PHP 8 syntax goes unnoticed. To cover several PHP versions, add them to the matrix, keeping to the pairs Dolibarr actually supports.

PHPStan 2 needs at least PHP 7.4. On PHP 7.3, stay on PHPStan 1.x.

## On a self-hosted runner

If your jobs run on a machine you manage, keep a permanent clone of the stubs on that machine rather than making a new one for each job, and update it regularly (scheduled `git pull`). The jobs then point `DOLIBARR_STUBS` at that clone.

In that case, mind the order of updates: when the `phpstan/dolibarr-core.stub` file changes, the runner clone must be up to date before you push a module that depends on the new version.

## One cache per job

If you keep the PHPStan cache between two runs, give it one folder per pair of PHP and Dolibarr versions (for instance `tmpDir: /tmp/phpstan-%env.CI_JOB_NAME%` on GitLab). A cache shared between two PHP versions is invalidated at every switch, so never useful. Shared between PHPStan 1 and PHPStan 2, it even makes PHPStan 2 fail at startup (see the "A cache shared between two PHPStan versions" section of [Known pitfalls](/dolibarr-stubs/pieges)).

Next: [Using the stubs in an IDE](/dolibarr-stubs/ide).
