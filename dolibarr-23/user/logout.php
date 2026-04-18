<?php

\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define('EVEN_IF_ONLY_LOGIN_ALLOWED', '1');
/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
$error = 0;
// Call trigger
$result = $user->call_trigger('USER_LOGOUT', $user);
// End call triggers
// Hooks on logout
$action = '';
$parameters = array();
$reshook = $hookmanager->executeHooks('afterLogout', $parameters, $user, $action);
// Define url to go after disconnect
$urlfrom = empty($_SESSION["urlfrom"]) ? \GETPOST('urlfrom') : $_SESSION["urlfrom"];
// Define url to go
$url = \DOL_URL_ROOT . "/index.php";
$url = \getDolGlobalString('MAIN_AUTHENTICATION_OIDC_LOGOUT_URL') . '?client_id=' . \getDolGlobalString('MAIN_AUTHENTICATION_OIDC_CLIENT_ID') . '&returnTo=' . \urlencode($url);