<?php

/**
 * Create a new instance of the URI class with the current URI, stripping the query string
 */
$uriFactory = new \OAuth\Common\Http\Uri\UriFactory();
/**
 * Load the credential for the service
 */
/** @var $serviceFactory \OAuth\ServiceFactory An OAuth service factory. */
$serviceFactory = new \OAuth\ServiceFactory();
// Example: 'userinfo_email,userinfo_profile,cloud_print'. 'state' parameter is standard to retrieve some parameters back
/*if ($action != 'delete' && empty($requestedpermissionsarray))
{
    print 'Error, parameter state is not defined';
    exit;
}*/
//var_dump($requestedpermissionsarray);exit;
// Instantiate the Api service using the credentials, http client and storage mechanism for the token
/** @var $apiService Service */
//$apiService = $serviceFactory->createService('StripeTest', $credentials, $storage, $requestedpermissionsarray);
$sql = "INSERT INTO " . \MAIN_DB_PREFIX . "oauth_token set service='StripeTest', entity=" . $conf->entity;