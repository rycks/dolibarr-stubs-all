<?php

\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define("NOLOGIN", 1);
\define("NOCSRFCHECK", 1);
//require_once DOL_DOCUMENT_ROOT.'/includes/autoload.php';
/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
$user = new \User($db);
$allowedip = \explode(' ', \getDolGlobalString('DAV_RESTRICT_ON_IP'));
$ipremote = \getUserRemoteIP();
$entity = \GETPOSTINT('entity') ? \GETPOSTINT('entity') : (!empty($conf->entity) ? $conf->entity : 1);
// settings
$publicDir = \DOL_DATA_ROOT . '/dav/public';
$privateDir = \DOL_DATA_ROOT . '/dav/private';
$ecmDir = \DOL_DATA_ROOT . '/ecm';
$tmpDir = \DOL_DATA_ROOT . '/ecm/temp';
//var_dump($tmpDir);mkdir($tmpDir);exit;
// Authentication callback function
$authBackend = new \Sabre\DAV\Auth\Backend\BasicCallBack(
    /**
     * @param string	$username	Username to validate as a login
     * @param string	$password	Password to validate for $username
     * @return bool					True if login ok, false if not
     */
    static function ($username, $password) {
        global $user, $conf;
        global $dolibarr_main_authentication, $dolibarr_auto_user;
        $authmode = \explode(',', $dolibarr_main_authentication);
        $entity = \GETPOSTINT('entity') ? \GETPOSTINT('entity') : (!empty($conf->entity) ? $conf->entity : 1);
        return true;
    }
);
/*
 * Actions and View
 */
// Create the root node
// Setting up the directory tree //
$nodes = array();
// Principals Backend
//$principalBackend = new \Sabre\DAVACL\PrincipalBackend\Dolibarr($user,$db);
// /principals
//$nodes[] = new \Sabre\DAVACL\PrincipalCollection($principalBackend);
// CardDav & CalDav Backend
//$carddavBackend   = new \Sabre\CardDAV\Backend\Dolibarr($user,$db,$langs);
//$caldavBackend    = new \Sabre\CalDAV\Backend\Dolibarr($user,$db,$langs, $cdavLib);
// /addressbook
//$nodes[] = new \Sabre\CardDAV\AddressBookRoot($principalBackend, $carddavBackend);
// /calendars
//$nodes[] = new \Sabre\CalDAV\CalendarRoot($principalBackend, $caldavBackend);
// The rootnode needs in turn to be passed to the server class
$server = new \Sabre\DAV\Server($nodes);
// If you want to run the SabreDAV server in a custom location (using mod_rewrite for instance)
// You can override the baseUri here.
$baseUri = \DOL_URL_ROOT . '/dav/fileserver.php/';
// Support for LOCK and UNLOCK
$lockBackend = new \Sabre\DAV\Locks\Backend\File($tmpDir . '/.locksdb');
$lockPlugin = new \Sabre\DAV\Locks\Plugin($lockBackend);