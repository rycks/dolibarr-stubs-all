---
title: "Utilisation dans un IDE"
weight: 60
description: "Donner à PhpStorm et à VS Code (Intelephense) la complétion et la navigation dans les classes Dolibarr grâce aux stubs."
---

# Utilisation dans un IDE

Un module développé hors d'une installation de Dolibarr ne connaît aucune classe du coeur : pas de complétion sur `$object->fetch(`, pas de navigation vers `CommonObject`, et des avertissements "classe inconnue" partout. Les stubs comblent ce manque.

## La règle : une seule version à la fois

Ajoutez à l'IDE **un seul** dossier de version, celui de la version minimale que votre module supporte, par exemple `dolibarr-18/`.

Si l'IDE voit plusieurs versions, il trouve chaque classe en double ou en triple. PhpStorm signale alors `Multiple definitions exist for class`, et la navigation vers une déclaration vous propose une liste au lieu d'y aller. Avec Composer, les 15 versions sont dans `vendor/` : il faut donc exclure le paquet de l'indexation et n'ajouter qu'une version (voir plus bas).

Le fichier `phpstan/dolibarr-core.stub` sert à PHPStan seulement : ne l'ajoutez pas à l'IDE.

Le plus simple est un clone partiel hors du module, limité à une version :

```bash
git clone --depth 1 --filter=blob:none --sparse https://github.com/rycks/dolibarr-stubs-all.git ~/dolibarr-stubs-all
git -C ~/dolibarr-stubs-all sparse-checkout set dolibarr-18
```

## PhpStorm

1. Ouvrez **Settings > PHP**.
2. Dans l'onglet **Include Path**, cliquez sur **+** et choisissez `~/dolibarr-stubs-all/dolibarr-18`.
3. Validez. PhpStorm indexe le dossier : la complétion et la navigation fonctionnent dès la fin de l'indexation.

Le dossier apparaît sous **External Libraries** dans la vue du projet. Pour changer de version, remplacez ce chemin par un autre dossier `dolibarr-NN`.

**Si les stubs sont installés par Composer**, faites un clic droit sur `vendor/caprel/dolibarr-stubs-all` dans la vue du projet, puis **Mark Directory as > Excluded**. Ajoutez ensuite un dossier de version par l'**Include Path** comme ci-dessus, depuis un clone hors du projet.

## VS Code avec Intelephense

Intelephense lit les dossiers externes dans le réglage `intelephense.environment.includePaths`. Dans le `.vscode/settings.json` du module :

```json
{
	"intelephense.environment.includePaths": [
		"/home/vous/dolibarr-stubs-all/dolibarr-18"
	]
}
```

Le chemin peut être absolu, ou relatif au dossier ouvert dans VS Code. Rechargez la fenêtre (**Developer: Reload Window**) ou lancez **Intelephense: Index workspace** pour prendre en compte le changement.

**Si les stubs sont installés par Composer**, excluez le paquet avec `intelephense.files.exclude`. Ce réglage remplace la liste par défaut au lieu de la compléter : recopiez donc les motifs par défaut avant d'ajouter le vôtre.

```json
{
	"intelephense.files.exclude": [
		"**/.git/**",
		"**/.svn/**",
		"**/.hg/**",
		"**/CVS/**",
		"**/.DS_Store/**",
		"**/node_modules/**",
		"**/bower_components/**",
		"**/vendor/**/{Tests,tests}/**",
		"**/.history/**",
		"**/vendor/**/vendor/**",
		"**/vendor/caprel/dolibarr-stubs-all/**"
	]
}
```

Cette liste par défaut est celle d'Intelephense 1.18. Puis ajoutez un dossier de version par `includePaths`, depuis un clone hors du projet.

La version de PHP visée se règle avec `intelephense.environment.phpVersion` (par exemple `"7.4.0"`). Sans ce réglage, Intelephense propose des fonctions PHP récentes que votre version minimale ne connaît peut-être pas.

## Quand les stubs sont inutiles

Si vous développez le module dans une installation complète de Dolibarr, dans `htdocs/custom/monmodule/`, et que vous ouvrez tout `htdocs/` dans l'IDE, celui-ci indexe déjà les vraies sources. N'ajoutez pas les stubs par-dessus : chaque classe existerait deux fois.

Les stubs restent utiles dans ce cas pour PHPStan, qui analyse plus vite et sans dépendre de l'installation locale.

La suite : [Pièges connus](/dolibarr-stubs/pieges).
