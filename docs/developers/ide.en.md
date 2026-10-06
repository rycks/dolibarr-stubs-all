---
title: "Using the stubs in an IDE"
weight: 60
description: "Give PhpStorm and VS Code (Intelephense) completion and navigation in the Dolibarr classes thanks to the stubs."
source_hash: "b93cc157"
---

# Using the stubs in an IDE

A module developed outside a Dolibarr installation knows none of the core classes: no completion on `$object->fetch(`, no navigation to `CommonObject`, and "unknown class" warnings everywhere. The stubs fill that gap.

## The rule: one version at a time

Add **a single** version folder to the IDE, the one of the lowest version your module supports, for example `dolibarr-18/`.

If the IDE sees several versions, it finds every class twice or three times. PhpStorm then reports `Multiple definitions exist for class`, and go-to-declaration offers you a list instead of going there. With Composer, all 15 versions are in `vendor/`: you therefore have to exclude the package from indexing and add a single version (see below).

The `phpstan/dolibarr-core.stub` file is for PHPStan only: do not add it to the IDE.

The simplest is a partial clone outside the module, limited to one version:

```bash
git clone --depth 1 --filter=blob:none --sparse https://github.com/rycks/dolibarr-stubs-all.git ~/dolibarr-stubs-all
git -C ~/dolibarr-stubs-all sparse-checkout set dolibarr-18
```

## PhpStorm

1. Open **Settings > PHP**.
2. In the **Include Path** tab, click **+** and choose `~/dolibarr-stubs-all/dolibarr-18`.
3. Confirm. PhpStorm indexes the folder: completion and navigation work as soon as indexing is over.

The folder shows up under **External Libraries** in the project view. To switch versions, replace this path with another `dolibarr-NN` folder.

**If the stubs are installed with Composer**, right-click `vendor/caprel/dolibarr-stubs-all` in the project view, then **Mark Directory as > Excluded**. Then add one version folder through the **Include Path** as above, from a clone outside the project.

## VS Code with Intelephense

Intelephense reads external folders from the `intelephense.environment.includePaths` setting. In the `.vscode/settings.json` of the module:

```json
{
	"intelephense.environment.includePaths": [
		"/home/you/dolibarr-stubs-all/dolibarr-18"
	]
}
```

The path can be absolute, or relative to the folder opened in VS Code. Reload the window (**Developer: Reload Window**) or run **Intelephense: Index workspace** to apply the change.

**If the stubs are installed with Composer**, exclude the package with `intelephense.files.exclude`. This setting replaces the default list instead of extending it: copy the default patterns before adding yours.

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

This default list is the one of Intelephense 1.18. Then add one version folder through `includePaths`, from a clone outside the project.

The targeted PHP version is set with `intelephense.environment.phpVersion` (for example `"7.4.0"`). Without this setting, Intelephense suggests recent PHP functions that your lowest version may not know.

## When the stubs are useless

If you develop the module inside a full Dolibarr installation, in `htdocs/custom/mymodule/`, and open the whole `htdocs/` in the IDE, it already indexes the real sources. Do not add the stubs on top: every class would exist twice.

The stubs remain useful in that case for PHPStan, which analyses faster and without depending on the local installation.

Next: [Known pitfalls](/dolibarr-stubs/pieges).
