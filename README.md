# Dolibarr Stubs (all stubs in one repository)

The stubs are generated directly from the dolibarr [sources](https://github.com/dolibarr/dolibarr)
using [dolibarr-stubs tools](https://github.com/rycks/dolibarr-stubs) (github).

[dolibarr-stubs tools](https://packagist.org/packages/caprel/dolibarr-stubs) is available on packagist too.

## Usage in PHPStan

For example you can include stubs in PHPStan configuration file with

```yaml
parameters:
	scanDirectories:
		- /your_path/dolibarr-stubs-all/dolibarr-18/
	excludePaths:
		analyse:
			- /your_path/dolibarr-stubs-all/dolibarr-18/
```

## Usage in gitlab

(more documentation to become)


## Support package maintenance

Please consider supporting this work : https://cap-rel.fr/services/soutien-rd/ or [buy me a coffee for example](https://shop.cap-rel.fr/cat/112)

Thank you!

