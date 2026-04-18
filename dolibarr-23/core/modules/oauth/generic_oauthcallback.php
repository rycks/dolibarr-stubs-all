<?php

/* Copyright (C) 2022       Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2015-2024  Frédéric France      <frederic.france@free.fr>
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
/**
 *      \file       htdocs/core/modules/oauth/generic_oauthcallback.php
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
$genericstring = 'GENERIC';
/**
 * Create a new instance of the URI class with the current URI, stripping the query string
 */
$uriFactory = new \OAuth\Common\Http\Uri\UriFactory();
//$currentUri = $uriFactory->createFromSuperGlobalArray($_SERVER);
//$currentUri->setQuery('');
$currentUri = $uriFactory->createFromAbsolute($urlwithroot . '/core/modules/oauth/generic_oauthcallback.php');
/**
 * Load the credential for the service
 */
/** @var \OAuth\ServiceFactory $serviceFactory An OAuth service factory. */
$serviceFactory = new \OAuth\ServiceFactory();
$httpClient = new \OAuth\Common\Http\Client\CurlClient();
// Setup the credentials for the requests
$keyforparamid = 'OAUTH_' . $genericstring . ($keyforprovider ? '-' . $keyforprovider : '') . '_ID';
$keyforparamsecret = 'OAUTH_' . $genericstring . ($keyforprovider ? '-' . $keyforprovider : '') . '_SECRET';
$credentials = new \OAuth\Common\Consumer\Credentials(\getDolGlobalString($keyforparamid), \getDolGlobalString($keyforparamsecret), $currentUri->getAbsoluteUri());
$state = \GETPOST('state');
$statewithscopeonly = '';
$statewithanticsrfonly = '';
$requestedpermissionsarray = array();
// 'state' parameter is standard to store a hash value and can also be used to retrieve some parameters back
$statewithscopeonly = \preg_replace('/\\-.*$/', '', \preg_replace('/^forlogin-/', '', $state));
// Dolibarr storage
$storage = new \OAuth\Common\Storage\DoliStorage($db, $conf, $keyforprovider);
$keyforurl = 'OAUTH_' . $genericstring . ($keyforprovider ? '-' . $keyforprovider : '') . '_URL';
$apiService = \null;
$nameofservice = \ucfirst(\strtolower($genericstring));
// This may create record into oauth_state before the header redirect.
// Creation of record with state, create record or just update column state of table llx_oauth_token (and create/update entry in llx_oauth_state) depending on the Provider used (see its constructor).
//if ($state && $state != 'none') {
$url = $apiService->getAuthorizationUri(array('client_id' => \getDolGlobalString($keyforparamid), 'response_type' => 'code', 'state' => $state));