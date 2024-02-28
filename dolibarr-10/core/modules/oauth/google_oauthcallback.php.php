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
//var_dump($requestedpermissionsarray);exit;
// Instantiate the Api service using the credentials, http client and storage mechanism for the token
/** @var $apiService Service */
$apiService = $serviceFactory->createService('Google', $credentials, $storage, $requestedpermissionsarray);