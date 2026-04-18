<?php

\define('NOCSRFCHECK', '1');
\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define("NOLOGIN", '1');
\define("NOSESSION", '1');
\define("NODEFAULTVALUES", '1');
\define("DOLENTITY", (int) $_SERVER['HTTP_DOLAPIENTITY']);
$res = 0;
$url = $_SERVER['PHP_SELF'];
// This 2 lines are useful only if we want to exclude some Urls from the explorer
//use Luracast\Restler\Explorer;
//Explorer::$excludedPaths = array('/categories');
// Analyze URLs
// index.php/explorer                           do a redirect to index.php/explorer/
// index.php/explorer/                          called by swagger to build explorer page index.php/explorer/index.html
// index.php/explorer/.../....png|.css|.js      called by swagger for resources to build explorer page
// index.php/explorer/resources.json            called by swagger to get list of all services
// index.php/explorer/resources.json/xxx        called by swagger to get detail of services xxx
// index.php/xxx                                called by any REST client to run API
$reg = array();
// When in production mode, a file api/temp/routes.php is created with the API available of current call.
// But, if we set $refreshcache to false, so it may have only one API in the routes.php file if we make a call for one API without
// using the explorer. And when we make another call for another API, the API is not into the api/temp/routes.php and a 404 is returned.
// So we force refresh to each call.
$refreshcache = \getDolGlobalString('API_PRODUCTION_DO_NOT_ALWAYS_REFRESH_CACHE') ? \false : \true;
$refreshcache = \true;
$api = new \DolibarrApi($db, '', $refreshcache);
$allowedip = \explode(' ', \getDolGlobalString('API_RESTRICT_ON_IP'));
$ipremote = \getUserRemoteIP();
// Call one APIs or one definition of an API
$regbis = array();
$moduleobject = $reg[1];
$moduleobject = \strtolower($moduleobject);
$moduledirforclass = \getModuleDirForApiClass($moduleobject);
$tmpmodule = $moduleobject;
$classfile = \str_replace('_', '', $tmpmodule);
$dir_part_file = \dol_buildpath('/' . $moduledirforclass . '/class/api_' . $classfile . '.class.php', 0, 2);
$classname = \ucwords($moduleobject);
$parameters = array('url' => $url, 'ip' => \getUserRemoteIP(), 'moduleobject' => $moduleobject, 'classfile' => $classfile, 'classname' => $classname);
$object = $api;
$action = $api->r->requestMethod;
// Note that $action and $object may be modified by some hooks
$reshook = $hookmanager->executeHooks('beforeApiCall', $parameters, $object, $action);
$res = \false;
//var_dump($api->r->apiVersionMap);
//exit;
// We do not want that restler outputs data if we use native compression (default behaviour) but we want to have it returned into a string.
// If API_DISABLE_COMPRESSION is set, returnResponse is false => It use default handling so output result directly.
$usecompression = !\getDolGlobalString('API_DISABLE_COMPRESSION') && !empty($_SERVER['HTTP_ACCEPT_ENCODING']);
$foundonealgorithm = 0;
// Call API (we suppose we found it).
// The handle will use the file api/temp/routes.php to get data to run the API. If the file exists and the entry for API is not found, it will return 404.
$responsedata = $api->r->handle();
$error = 0;
$userid = \DolibarrApiAccess::$user->id;
$sql = "SELECT up.value";
$result = $db->query($sql);
$terminateCall = '_terminate_' . $apiMethodInfo->methodName . '_' . $api->r->responseFormat->getExtension();