---
title: "Corrections des PHPDoc du coeur"
weight: 30
description: "Le fichier dolibarr-core.stub corrige les PHPDoc fausses du coeur de Dolibarr qui font signaler du code correct comme erroné."
---

# Corrections des PHPDoc du coeur

Les stubs reprennent les blocs PHPDoc des sources de Dolibarr tels qu'ils sont. Or certains sont optimistes, d'autres franchement faux, et PHPStan les prend au mot. À partir du niveau 4, il signale alors comme erroné du code parfaitement correct.

Le fichier `phpstan/dolibarr-core.stub` du dépôt corrige ces déclarations. Chargez-le avec `stubFiles`, à côté du dossier de version :

```neon
parameters:
	scanDirectories:
		- %env.DOLIBARR_STUBS%/dolibarr-%env.DOLIBARR_VERSION%
	stubFiles:
		- %env.DOLIBARR_STUBS%/phpstan/dolibarr-core.stub
```

Le même fichier vaut pour toutes les versions de Dolibarr. PHPStan n'en lit que les PHPDoc : les corps de classe vides qu'il contient ne masquent pas les membres déclarés dans les stubs.

> [!IMPORTANT]
> Référencez le fichier depuis le clone ou depuis `vendor/`, ne le recopiez pas dans votre module. Une copie ne reçoit plus les corrections suivantes et diverge sans prévenir.

## L'exemple qui justifie tout : `fetch_object()`

`Database::fetch_object()` est documentée `@return Object`, alors qu'elle renvoie `null` en fin de curseur. Pour PHPStan, la boucle la plus courante de Dolibarr ne s'arrête donc jamais :

```php
$nb = 0;
while ($obj = $this->db->fetch_object($resql)) {
	$nb++;
}
$this->db->free($resql);
return $nb;
```

Analysé au niveau 4 sur Dolibarr 18 sans le fichier de corrections :

```
myobject.class.php:38: While loop condition is always true.
myobject.class.php:41: Unreachable statement - code above always terminates.
```

Avec le fichier de corrections, plus aucune erreur. Ce couple d'erreurs est la première cause des `deadCode.unreachable` signalés sur un module Dolibarr : tout le code qui suit une boucle de lecture est déclaré inatteignable.

## Ce qui est corrigé

| Déclaration | PHPDoc d'origine | Réalité |
|---|---|---|
| `Database::fetch_object()`, `fetch_array()`, `fetch_row()` | Jamais `null` | `null` en fin de curseur |
| `CommonObject::$thirdparty`, `$contact`, `$user`, `$user_creation`, `$user_validation` | Objet | `null` tant que le `fetch_*()` correspondant n'a pas été appelé |
| `CommonObject::$ref`, `$name`, `$element`, `$import_key`, `$oldref`, `$model_pdf`, `$country_code`, `$multicurrency_code` | `string`, ou même `CommonObject` pour `$oldref` | Chaîne ou `null` |
| `CommonObject::$status`, `$statut`, `$fk_user_creat`, `$fk_user_modif` | Selon la version, jusqu'à `int\|array<int, string>` | Entier ou `null` |
| `CommonObject::$fields` | Forme fermée à partir de Dolibarr 21 | Tableau ouvert : le coeur et les modules y lisent d'autres clés |
| `CommonObject::$ismultientitymanaged`, `$isextrafieldmanaged`, `$labelStatus`, `$labelStatusShort` | Annotées différemment selon la version | Un seul type, valable sur toutes les versions |
| `Societe::$name`, `$address`, `$zip`, `$town`, `$phone`, `$email`, `$idprof1`, `$idprof2`, `$capital` | Non nullables | Colonnes nullables dans `llx_societe` |
| `Facture::$ref_client`, `$ref_customer`, `$multicurrency_code` | `string` | `null` quand la facture n'en porte pas ou n'est pas chargée |
| `Conf::$entity` | Vaut 1 dans le corps de la classe | L'entité courante, variable à l'exécution |
| `DolibarrModules::$depends`, `$requiredby`, `$conflictwith` | `string[]` | Accepte aussi la forme imbriquée que le coeur lit et que le modulebuilder documente |
| `User::$login`, `CMailFile::$msgid`, `CommonObjectLine::$fk_unit`, `CommonInvoiceLine::$tva_tx` | Non nullables ou sans PHPDoc | Peuvent valoir `null` |

Conséquence : les `empty()`, `??` et `is_object()` qu'un module écrit autour de ces propriétés ne sont pas redondants, et PHPStan cesse de le prétendre.

## Le cas des propriétés typées différemment selon la version

Plusieurs propriétés ont changé de PHPDoc d'une version de Dolibarr à l'autre. `$status` par exemple est annoncée `int` jusqu'en Dolibarr 19, `int|array<int, string>` en Dolibarr 20, puis `null|int|array<int, string>` à partir de la 21. Un module qui redéclare cette propriété ne peut pas satisfaire toutes les versions à la fois : la règle de covariance de PHPStan exige que le type de la classe fille soit compatible avec celui du parent, et le parent change.

Le fichier de corrections fixe un seul type pour toutes les versions. C'est aussi ce qui permet à une classe de module de déclarer `$fields` en `array<string, array<string, mixed>>` sans erreur de covariance sur Dolibarr 21 et suivants.

## Proposer une correction

Si vous trouvez une autre PHPDoc fausse du coeur, ouvrez un ticket ou une demande de fusion sur [dolibarr-stubs-all](https://github.com/rycks/dolibarr-stubs-all/issues) avec :

- la classe et la propriété ou la méthode concernées ;
- le code Dolibarr qui montre le comportement réel (le `return null` en fin de curseur, la colonne nullable, la propriété remplie seulement par un `fetch_*()`) ;
- l'erreur PHPStan qu'elle provoque sur du code correct.

Deux règles d'écriture propres à ce fichier :

- **Une classe nommée dans un PHPDoc doit être déclarée dans le fichier**, même vide. Écrire `@var Societe|null` sans déclarer `class Societe` produit `has unknown class Societe as its type`, une erreur qu'on ne peut pas ignorer.
- **Toujours préciser le contenu des tableaux** (`array<int|string, mixed>` et non `array`), et ne jamais déclarer une propriété sans `@var` : chaque oubli devient une erreur non ignorable dans tous les modules qui chargent le fichier.

La suite : [Monter le niveau d'analyse](/dolibarr-stubs/monter-en-niveau).
