<?php

// Define $urlwithroot
$urlwithouturlroot = \preg_replace('/' . \preg_quote(\DOL_URL_ROOT, '/') . '$/i', '', \trim($dolibarr_main_url_root));
$urlwithroot = $urlwithouturlroot . \DOL_URL_ROOT;
// This is to use external domain name found into config file
//$urlwithroot=DOL_MAIN_URL_ROOT;					// This is to use same domain name than current
$action = \GETPOST('action', 'aZ09');
$backtourl = \GETPOST('backtourl', 'alpha');
$keyforprovider = \GETPOST('keyforprovider', 'aZ09');
$genericstring = 'MICROSOFT';
/**
 * Create a new instance of the URI class with the current URI, stripping the query string
 */
$uriFactory = new \OAuth\Common\Http\Uri\UriFactory();
//$currentUri = $uriFactory->createFromSuperGlobalArray($_SERVER);
//$currentUri->setQuery('');
$currentUri = $uriFactory->createFromAbsolute($urlwithroot . '/core/modules/oauth/microsoft_oauthcallback.php');
/**
 * Load the credential for the service
 */
/** @var \OAuth\ServiceFactory $serviceFactory An OAuth service factory. */
$serviceFactory = new \OAuth\ServiceFactory();
$httpClient = new \OAuth\Common\Http\Client\CurlClient();
// Setup the credentials for the requests
$keyforparamid = 'OAUTH_' . $genericstring . ($keyforprovider ? '-' . $keyforprovider : '') . '_ID';
$keyforparamsecret = 'OAUTH_' . $genericstring . ($keyforprovider ? '-' . $keyforprovider : '') . '_SECRET';
$keyforparamtenant = 'OAUTH_' . $genericstring . ($keyforprovider ? '-' . $keyforprovider : '') . '_TENANT';
// Dolibarr storage
$storage = new \OAuth\Common\Storage\DoliStorage($db, $conf, $keyforprovider, \getDolGlobalString($keyforparamtenant));
$credentials = new \OAuth\Common\Consumer\Credentials(\getDolGlobalString($keyforparamid), \getDolGlobalString($keyforparamsecret), $currentUri->getAbsoluteUri());
$state = \GETPOST('state');
$requestedpermissionsarray = array();