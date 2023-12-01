# Dolibarr Stubs (all stubs in one repository)

The stubs are generated directly from the dolibarr [sources](https://github.com/dolibarr/dolibarr)
using [dolibarr-stubs](https://github.com/rycks/dolibarr-stubs).

## Usage in PHPStan

Include stubs in PHPStan configuration file.

```yaml
parameters:
	scanDirectories:
		- /your_path/dolibarr-stubs-all/dolibarr-18/htdocs/
	excludePaths:
		analyse:
			- /your_path/dolibarr-stubs-all/dolibarr-18/htdocs/
```

## Support package maintenance

Please consider supporting this work.

https://cap-rel.fr/services/soutien-rd/

Thank you!

