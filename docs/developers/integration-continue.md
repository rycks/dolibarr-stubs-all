---
title: "Intégration continue"
weight: 50
description: "Rejouer l'analyse PHPStan d'un module sur chaque version de Dolibarr à chaque push, avec GitLab CI ou GitHub Actions."
---

# Intégration continue

Le but : à chaque push, analyser le module une fois par version de Dolibarr supportée. Chaque job ne récupère que la version qu'il analyse, grâce au clone partiel décrit dans [Installation](/dolibarr-stubs/installation).

Les exemples supposent :

- un `phpstan.dist.neon` qui lit `DOLIBARR_STUBS` et `DOLIBARR_VERSION`, comme dans [Configurer PHPStan](/dolibarr-stubs/phpstan) ;
- PHPStan déclaré dans le `composer.json` du module (`composer require --dev phpstan/phpstan`).

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

`parallel:matrix` crée un job par version. Un job qui échoue indique directement la version de Dolibarr en cause.

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

`fail-fast: false` laisse tourner les autres versions quand l'une échoue : on voit d'un coup toutes les versions cassées.

Le clone est placé hors du dossier du module, pour que PHPStan ne le parcoure pas.

## Choisir la version de PHP

PHPStan analyse le code selon la version de PHP qui l'exécute. Un module qui doit tourner sous PHP 7.4 doit donc aussi être analysé sous PHP 7.4, sinon une syntaxe PHP 8 passe inaperçue. Pour couvrir plusieurs versions de PHP, ajoutez-les à la matrice, en respectant les couples que Dolibarr supporte réellement.

PHPStan 2 demande PHP 7.4 au minimum. Sur PHP 7.3, restez en PHPStan 1.x.

## Sur un runner auto-hébergé

Si vos jobs tournent sur une machine que vous gérez, gardez un clone permanent des stubs sur cette machine plutôt que d'en refaire un à chaque job, et mettez-le à jour régulièrement (`git pull` planifié). Les jobs pointent alors `DOLIBARR_STUBS` vers ce clone.

Dans ce cas, pensez à l'ordre des mises à jour : quand le fichier `phpstan/dolibarr-core.stub` évolue, le clone du runner doit être à jour avant que vous poussiez un module qui dépend de la nouvelle version.

## Un cache distinct par job

Si vous conservez le cache de PHPStan entre deux exécutions, donnez-lui un répertoire par couple de versions PHP et Dolibarr (par exemple `tmpDir: /tmp/phpstan-%env.CI_JOB_NAME%` sur GitLab). Un cache partagé entre deux versions de PHP est invalidé à chaque changement, donc jamais utile. Partagé entre PHPStan 1 et PHPStan 2, il fait même échouer PHPStan 2 au démarrage (voir la section "Un cache partagé entre deux versions de PHPStan" des [Pièges connus](/dolibarr-stubs/pieges)).

La suite : [Utilisation dans un IDE](/dolibarr-stubs/ide).
