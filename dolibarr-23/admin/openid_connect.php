<?php

$action = \GETPOST('action', 'alpha');
/*
 *	Actions
 */
$errors = [];
$error = 0;
$client_id = \GETPOST('MAIN_AUTHENTICATION_OIDC_LOGIN_CLAIM', 'alpha');
$res = \dolibarr_set_const($db, 'MAIN_AUTHENTICATION_OIDC_LOGIN_CLAIM', $client_id, 'chaine', 0, '', 0);
$client_id = \GETPOST('MAIN_AUTHENTICATION_OIDC_CLIENT_ID', 'alpha');
$res = \dolibarr_set_const($db, 'MAIN_AUTHENTICATION_OIDC_CLIENT_ID', $client_id, 'chaine', 0, '', 0);
$client_secret = \GETPOST('MAIN_AUTHENTICATION_OIDC_CLIENT_SECRET', 'alpha');
$res = \dolibarr_set_const($db, 'MAIN_AUTHENTICATION_OIDC_CLIENT_SECRET', $client_secret, 'chaine', 0, '', 0);
$scopes = \GETPOST('MAIN_AUTHENTICATION_OIDC_SCOPES', 'alpha');
$res = \dolibarr_set_const($db, 'MAIN_AUTHENTICATION_OIDC_SCOPES', $scopes, 'chaine', 0, '', 0);
$authorize_url = \GETPOST('MAIN_AUTHENTICATION_OIDC_AUTHORIZE_URL', 'alpha');
$res = \dolibarr_set_const($db, 'MAIN_AUTHENTICATION_OIDC_AUTHORIZE_URL', $authorize_url, 'chaine', 0, '', 0);
$value = \GETPOST('MAIN_AUTHENTICATION_OIDC_TOKEN_URL', 'alpha');
$res = \dolibarr_set_const($db, 'MAIN_AUTHENTICATION_OIDC_TOKEN_URL', $value, 'chaine', 0, '', 0);
$value = \GETPOST('MAIN_AUTHENTICATION_OIDC_USERINFO_URL', 'alpha');
$res = \dolibarr_set_const($db, 'MAIN_AUTHENTICATION_OIDC_USERINFO_URL', $value, 'chaine', 0, '', 0);
$logout_url = \GETPOST('MAIN_AUTHENTICATION_OIDC_LOGOUT_URL', 'alpha');
$res = \dolibarr_set_const($db, 'MAIN_AUTHENTICATION_OIDC_LOGOUT_URL', $logout_url, 'chaine', 0, '', 0);
/*
 *	View
 */
$wikihelp = 'EN:Setup_Security|FR:Paramétrage_Sécurité|ES:Configuración_Seguridad';
$head = \security_prepare_head();
$urlforwikidoc = \img_picto('', 'url', 'class="pictofixedwidth"') . '<a target="_blank" href="https://wiki.dolibarr.org/index.php?title=Authentication,_SSO_and_SSL#Mode_openid_connect">';