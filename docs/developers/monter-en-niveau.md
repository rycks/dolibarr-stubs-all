---
title: "Monter le niveau d'analyse"
weight: 40
description: "Faire monter un module Dolibarr de niveau PHPStan palier par palier, avec les réglages qui évitent les faux positifs et les coûts mesurés."
---

# Monter le niveau d'analyse

PHPStan propose des niveaux de 0 à 9 avec la version 1.10, et jusqu'à 10 avec la version 2. Sur un module Dolibarr, la montée tient en quatre gestes :

1. charger le [fichier de corrections des PHPDoc du coeur](/dolibarr-stubs/correctifs-phpdoc) ;
2. poser `treatPhpDocTypesAsCertain: false` ;
3. monter d'un niveau à la fois en corrigeant ce qui remonte ;
4. ouvrir les commutateurs qui restent fermés.

Sans les deux premiers gestes, le niveau 4 remonte une centaine de faux positifs, et l'on conclut à tort que le module n'est pas analysable.

## `treatPhpDocTypesAsCertain: false`

```neon
parameters:
	treatPhpDocTypesAsCertain: false
```

Ce réglage dit à PHPStan de ne pas tenir un type venu d'un bloc PHPDoc pour une certitude. Les types déduits du code lui-même restent vérifiés.

C'est le bon réglage pour du code Dolibarr, parce que les PHPDoc du coeur ne sont pas fiables : une propriété annoncée objet reste `null` jusqu'au `fetch_*()`, une méthode annoncée `@return string` renvoie parfois `false`. Les gardes défensives qu'un module écrit autour (`is_object()`, `empty()`, `??`) ne sont donc pas redondantes. Sur un module réel, ce seul réglage a fait passer les `function.alreadyNarrowedType` de 64 à 30, et les 30 restantes étaient de vraies redondances.

Il ne remplace pas le fichier de corrections : il atténue la confiance dans les PHPDoc, le fichier corrige celles qui sont fausses. Les deux se complètent.

## Ce que l'on rencontre à chaque palier

**Niveaux 3 et 4 : le gros du travail réel.**

- des `@return` faux dans le module (`@return string` sur une fonction qui renvoie `bool` ou `null`) : corrigez le PHPDoc, pas le code, sauf si c'est le code qui a tort ;
- du code mort révélé : `return` inatteignables, compteurs d'erreurs jamais incrémentés, gardes qui ne se déclenchent jamais ;
- des `property_exists($this, 'ref')` ou `method_exists($this, 'getNomUrl')` hérités du modulebuilder, toujours vrais sur une classe qui déclare ces membres.

**Niveau 5** : souvent propre si le 4 l'est.

**Niveau 6 : les types manquants, et rien d'autre.** C'est du volume mais c'est mécanique : un `@var` par propriété, un `@param` par paramètre. Sur un module réel : 150 manques, dont 97 propriétés et 47 paramètres.

Pour les propriétés d'une classe générée par le modulebuilder, le tableau `$fields` donne le type SQL de chaque colonne :

| Type SQL dans `$fields` | Type PHPDoc |
|---|---|
| `integer` | `int\|null` |
| `varchar`, `text` | `string\|null` |
| `datetime`, `timestamp` | `int\|string\|null` |

Nullable partout : la propriété vaut `null` tant que l'objet n'est pas chargé. Ne redéclarez pas ce que `CommonObject` déclare déjà (`ref`, `entity`, `status`, `date_creation`, `fk_user_creat`, `fk_user_modif`, `import_key`) : PHPStan reprend le PHPDoc du parent.

Déclarez `$fields` avec un type précis, sinon PHPStan 2 rapporte une erreur de covariance à partir de Dolibarr 21 :

```php
/**
 * @var array<string, array<string, mixed>> Array with all fields and their property
 */
public $fields = array(
```

**Niveaux 7 à 10** : presque gratuits une fois le 6 terminé.

## Les commutateurs à ouvrir

Beaucoup de configurations de modules Dolibarr posent `customRulesetUsed: true` suivi d'une série de commutateurs à `false`. Ces commutateurs l'emportent sur le niveau : on peut afficher "niveau 9" avec la moitié des contrôles coupés.

Coût mesuré sur un module réel, chaque commutateur ouvert seul :

| Commutateur | Erreurs ajoutées |
|---|---|
| `checkNullables: true` | 0 |
| `checkExplicitMixedMissingReturn: true` | 0 |
| `checkPhpDocMissingReturn: true` | 0 |
| `reportMaybes: true` | 0 |
| `reportStaticMethodSignatures: true` | 0 |
| `reportMagicMethods: true` | 0 |
| `reportMaybesInMethodSignatures: true` | 4 |
| `reportMagicProperties: true` | 8 |
| `checkUnionTypes: true` | 1735 |
| `checkThisOnly: false` | 4719 |

Ouvrez tout sauf les deux derniers. Les erreurs que cela fait apparaître sont des incompatibilités de signature avec la classe parente et des propriétés magiques non documentées : de vrais défauts.

`reportMagicProperties` a un intérêt au-delà de l'analyse : sur une classe qui expose ses attributs par `__get()` et `__set()`, il oblige à écrire les `@property` de la classe, donc à documenter son interface publique.

### Les deux à laisser fermés

`checkUnionTypes: true` signale chaque valeur lue depuis une union ou un `mixed` sans avoir été restreinte. Sur du code Dolibarr, ce sont surtout des `expects string, mixed given` sur `dol_syslog()`, `$langs->trans()` et les autres fonctions du coeur. Les faire taire demanderait de semer des conversions de type, qui masqueraient de vrais défauts, ou de typer le coeur lui-même.

`checkThisOnly: false` étend les contrôles de propriétés à tous les objets, pas seulement `$this`. Même problème, en plus large.

Les deux se traitent fichier par fichier, jamais d'un seul coup. Notez leur coût en commentaire dans la configuration, pour que personne ne les ouvre sans savoir.

## Nettoyer les ignores

Une fois le niveau monté, posez :

```neon
parameters:
	reportUnmatchedIgnoredErrors: true
```

Un motif d'`ignoreErrors` qui ne correspond plus à rien devient alors une erreur, au lieu de masquer un jour un vrai défaut. Sur un module réel, ce réglage a révélé 17 motifs et 25 commentaires `@phpstan-ignore-next-line` qui ne servaient plus.

**Vérifiez sur toutes les versions avant de supprimer un motif.** Un motif peut être mort sur Dolibarr 22 et toujours nécessaire sur la 18 :

```bash
for v in 18 19 20 21 22 23; do
	DOLIBARR_VERSION=$v vendor/bin/phpstan analyse --no-progress 2>&1 | grep 'was not matched'
done | sort | uniq -c
```

Ne supprimez que les motifs signalés autant de fois qu'il y a de versions.

Pour un motif nécessaire sur certaines versions seulement, PHPStan 2 permet de désactiver le contrôle pour ce motif seul :

```neon
parameters:
	ignoreErrors:
		-
			message: '#^Function llxHeader invoked with \d+ parameters?, 0 required\.$#'
			reportUnmatched: false
```

PHPStan 1.10 ne connaît pas `reportUnmatched` dans une entrée d'ignore.

## Contrôler à chaque étape

Relancez l'analyse sur toutes les versions supportées à chaque palier, pas seulement à la fin, puis relancez les tests du module : corriger une erreur PHPStan revient souvent à toucher au code.

La suite : [Intégration continue](/dolibarr-stubs/integration-continue).
