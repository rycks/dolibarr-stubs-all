# Dolibarr Stubs (all stubs in one repository)

Stubs of [Dolibarr](https://github.com/dolibarr/dolibarr) 10 to 24, one folder per major
version, to analyse a Dolibarr module with PHPStan or to get completion in your IDE without
installing Dolibarr. They are generated from the Dolibarr sources with the
[dolibarr-stubs tools](https://github.com/rycks/dolibarr-stubs).

Full documentation (English and French): https://doc.cap-rel.fr/en/dolibarr-stubs/

## Quick start with PHPStan

Fetch only the versions you need (about 32 MB per version instead of 300 MB):

```bash
git clone --depth 1 --filter=blob:none --sparse https://github.com/rycks/dolibarr-stubs-all.git ~/dolibarr-stubs-all
git -C ~/dolibarr-stubs-all sparse-checkout set phpstan dolibarr-18
```

`phpstan.dist.neon` at the root of your module:

```neon
parameters:
	level: 5
	paths:
		- class
		- core
		- admin
	scanDirectories:
		- %env.DOLIBARR_STUBS%/dolibarr-%env.DOLIBARR_VERSION%
	stubFiles:
		- %env.DOLIBARR_STUBS%/phpstan/dolibarr-core.stub
	treatPhpDocTypesAsCertain: false
```

```bash
DOLIBARR_STUBS=$HOME/dolibarr-stubs-all DOLIBARR_VERSION=18 vendor/bin/phpstan analyse
```

`phpstan/dolibarr-core.stub` fixes the wrong PHPDoc of the Dolibarr core (for instance
`fetch_object()`, documented as never returning null), which otherwise makes PHPStan report
correct code from level 4 up. Reference it from the clone, do not copy it into your module.

The stubs are also available on Packagist as `caprel/dolibarr-stubs-all` (`dev-master` only,
all versions at once). If you install them that way, list your source folders in `paths`
instead of `.`, or PHPStan walks through the 300 MB of stubs in `vendor/`.

## Support package maintenance

Please consider supporting this work : https://cap-rel.fr/services/soutien-rd/ or [buy me a coffee for example](https://shop.cap-rel.fr/cat/112)

Thank you!
