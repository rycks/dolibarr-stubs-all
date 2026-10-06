---
title: "Core PHPDoc fixes"
weight: 30
description: "The dolibarr-core.stub file fixes the wrong PHPDoc of the Dolibarr core that make correct code be reported as wrong."
source_hash: "f279b435"
---

# Core PHPDoc fixes

The stubs carry the PHPDoc blocks of the Dolibarr sources as they are. Some of them are optimistic, others plainly wrong, and PHPStan takes them at their word. From level 4 up, it then reports perfectly correct code as wrong.

The `phpstan/dolibarr-core.stub` file of the repository fixes these declarations. Load it with `stubFiles`, next to the version folder:

```neon
parameters:
	scanDirectories:
		- %env.DOLIBARR_STUBS%/dolibarr-%env.DOLIBARR_VERSION%
	stubFiles:
		- %env.DOLIBARR_STUBS%/phpstan/dolibarr-core.stub
```

The same file applies to every Dolibarr version. PHPStan only reads its PHPDoc: the empty class bodies it contains do not hide the members declared in the stubs.

> [!IMPORTANT]
> Reference the file from the clone or from `vendor/`, do not copy it into your module. A copy no longer receives the next fixes and drifts away without warning.

## The example that justifies it all: `fetch_object()`

`Database::fetch_object()` is documented `@return Object`, whereas it returns `null` at the end of the cursor. For PHPStan, the most common loop of Dolibarr therefore never stops:

```php
$nb = 0;
while ($obj = $this->db->fetch_object($resql)) {
	$nb++;
}
$this->db->free($resql);
return $nb;
```

Analysed at level 4 against Dolibarr 18 without the fixes file:

```
myobject.class.php:38: While loop condition is always true.
myobject.class.php:41: Unreachable statement - code above always terminates.
```

With the fixes file, no error is left. This pair of errors is the first cause of the `deadCode.unreachable` reported on a Dolibarr module: all the code that follows a read loop is declared unreachable.

## What is fixed

| Declaration | Original PHPDoc | Reality |
|---|---|---|
| `Database::fetch_object()`, `fetch_array()`, `fetch_row()` | Never `null` | `null` at the end of the cursor |
| `CommonObject::$thirdparty`, `$contact`, `$user`, `$user_creation`, `$user_validation` | Object | `null` until the matching `fetch_*()` has been called |
| `CommonObject::$ref`, `$name`, `$element`, `$import_key`, `$oldref`, `$model_pdf`, `$country_code`, `$multicurrency_code` | `string`, or even `CommonObject` for `$oldref` | String or `null` |
| `CommonObject::$status`, `$statut`, `$fk_user_creat`, `$fk_user_modif` | Depending on the version, up to `int\|array<int, string>` | Integer or `null` |
| `CommonObject::$fields` | Closed shape from Dolibarr 21 on | Open array: the core and the modules read other keys in it |
| `CommonObject::$ismultientitymanaged`, `$isextrafieldmanaged`, `$labelStatus`, `$labelStatusShort` | Annotated differently depending on the version | A single type, valid on every version |
| `Societe::$name`, `$address`, `$zip`, `$town`, `$phone`, `$email`, `$idprof1`, `$idprof2`, `$capital` | Not nullable | Nullable columns in `llx_societe` |
| `Facture::$ref_client`, `$ref_customer`, `$multicurrency_code` | `string` | `null` when the invoice carries none or is not loaded |
| `Conf::$entity` | Equals 1 in the class body | The current entity, variable at runtime |
| `DolibarrModules::$depends`, `$requiredby`, `$conflictwith` | `string[]` | Also accepts the nested form the core reads and the modulebuilder documents |
| `User::$login`, `CMailFile::$msgid`, `CommonObjectLine::$fk_unit`, `CommonInvoiceLine::$tva_tx` | Not nullable or without PHPDoc | Can be `null` |

As a result, the `empty()`, `??` and `is_object()` a module writes around these properties are not redundant, and PHPStan stops claiming they are.

## Properties typed differently depending on the version

Several properties changed PHPDoc from one Dolibarr version to the next. `$status` for instance is announced as `int` up to Dolibarr 19, `int|array<int, string>` in Dolibarr 20, then `null|int|array<int, string>` from 21 on. A module that redeclares this property cannot satisfy every version at once: the PHPStan covariance rule requires the type of the child class to be compatible with the parent's, and the parent changes.

The fixes file sets a single type for every version. It is also what lets a module class declare `$fields` as `array<string, array<string, mixed>>` without a covariance error on Dolibarr 21 and later.

## Proposing a fix

If you find another wrong PHPDoc in the core, open an issue or a merge request on [dolibarr-stubs-all](https://github.com/rycks/dolibarr-stubs-all/issues) with:

- the class and the property or method concerned;
- the Dolibarr code that shows the real behaviour (the `return null` at the end of the cursor, the nullable column, the property filled only by a `fetch_*()`);
- the PHPStan error it causes on correct code.

Two writing rules specific to this file:

- **A class named in a PHPDoc must be declared in the file**, even empty. Writing `@var Societe|null` without declaring `class Societe` produces `has unknown class Societe as its type`, an error that cannot be ignored.
- **Always specify the content of arrays** (`array<int|string, mixed>`, not `array`), and never declare a property without `@var`: each omission becomes a non-ignorable error in every module that loads the file.

Next: [Raising the analysis level](/dolibarr-stubs/monter-en-niveau).
