<?php

/* Copyright (C) 2022       Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2015-2024	Frédéric France      <frederic.france@free.fr>
 * Copyright (C) 2024		MDW							<mdeweerd@users.noreply.github.com>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 */
// This page is used as callback for token generation of an OAUTH request.
// This page can also be used to make the process to login and get token as described here:
// https://developers.google.com/identity/protocols/oauth2/openid-connect#server-flow
/**
 *      \file       htdocs/core/modules/oauth/google_oauthcallback.php
 *      \ingroup    oauth
 *      \brief      Page to get oauth callback
 */
// Force keyforprovider
$forlogin = 0;
\define("NOLOGIN", 1);
$urlwithouturlroot = \preg_replace('/' . \preg_quote(\DOL_URL_ROOT, '/') . '$/i', '', \trim($dolibarr_main_url_root));
$urlwithroot = $urlwithouturlroot . \DOL_URL_ROOT;
$action = \GETPOST('action', 'aZ09');
$backtourl = \GETPOST('backtourl', 'alpha');
$keyforprovider = \GETPOST('keyforprovider', 'aZ09');
/**
 * Create a new instance of the URI class with the current URI, stripping the query string
 */
$uriFactory = new \OAuth\Common\Http\Uri\UriFactory();
//$currentUri = $uriFactory->createFromSuperGlobalArray($_SERVER);
//$currentUri->setQuery('');
$currentUri = $uriFactory->createFromAbsolute($urlwithroot . '/core/modules/oauth/google_oauthcallback.php');
/**
 * Load the credential for the service
 */
/** @var \OAuth\ServiceFactory $serviceFactory An OAuth service factory. */
$serviceFactory = new \OAuth\ServiceFactory();
$httpClient = new \OAuth\Common\Http\Client\CurlClient();
// Setup the credentials for the requests
$keyforparamid = 'OAUTH_GOOGLE' . ($keyforprovider ? '-' . $keyforprovider : '') . '_ID';
$keyforparamsecret = 'OAUTH_GOOGLE' . ($keyforprovider ? '-' . $keyforprovider : '') . '_SECRET';
$credentials = new \OAuth\Common\Consumer\Credentials(\getDolGlobalString($keyforparamid), \getDolGlobalString($keyforparamsecret), $currentUri->getAbsoluteUri());
$state = \GETPOST('state');
$statewithscopeonly = '';
$statewithanticsrfonly = '';
$requestedpermissionsarray = array();
//var_dump($requestedpermissionsarray);exit;
// Dolibarr storage
$storage = new \OAuth\Common\Storage\DoliStorage($db, $conf, $keyforprovider);
// Instantiate the Api service using the credentials, http client and storage mechanism for the token
// $requestedpermissionsarray contains list of scopes.
// Conversion into URL is done by Reflection on constant with name SCOPE_scope_in_uppercase
$apiService = \null;
$nameofservice = 'Google';