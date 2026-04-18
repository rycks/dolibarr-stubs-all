<?php

\define("NOLOGIN", 1);
\define("NOCSRFCHECK", 1);
\define('NOIPCHECK', '1');
\define('NOBROWSERNOTIF', '1');
// Get parameters
$action = \GETPOST('action', 'aZ09');
$mode = \GETPOST('mode', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$backtopage = '';
$id = \GETPOSTINT('id');
$securekey = \GETPOST('securekey', 'alpha');
$suffix = \GETPOST('suffix');
$object = new \User($db);
// Define $urlwithroot
//$urlwithouturlroot=preg_replace('/'.preg_quote(DOL_URL_ROOT,'/').'$/i','',trim($dolibarr_main_url_root));
//$urlwithroot=$urlwithouturlroot.DOL_URL_ROOT;		// This is to use external domain name found into config file
$urlwithroot = \DOL_MAIN_URL_ROOT;
$encodedsecurekey = \dol_hash($conf->file->instance_unique_id . 'uservirtualcard' . $object->id . '-' . $object->login, 'md5');
$action = 'view';
/*
 * View
 */
$v = new \vCard();
$company = $mysoc;
$modulepart = 'userphotopublic';
$dir = $conf->user->dir_output;
// Show logo (search order: logo defined by ONLINE_SIGN_LOGO_suffix, then ONLINE_SIGN_LOGO_, then small company logo, large company logo, theme logo, common logo)
// Define logo and logosmall
$logo = '';
$logosmall = '';
//print '<!-- Show logo (logosmall='.$logosmall.' logo='.$logo.') -->'."\n";
// Define urllogo
$urllogo = '';
$urllogofull = '';
$head = '';
$arrayofjs = array();
$arrayofcss = array();
$replacemainarea = (empty($conf->dol_hide_leftmenu) ? '<div>' : '') . '<div>';
// url for the download .vcf file link
$urlforqrcode = $object->getOnlineVirtualCardUrl('vcard');
$socialnetworksdict = \getArrayOfSocialNetworks();
// Show barcode
$showbarcode = \GETPOST('nobarcode') ? 0 : 1;
$outdir = $conf->user->dir_temp;
$filename = $v->buildVCardString($object, $company, $langs, '', $outdir);
$encodedsecurekey = \dol_hash($conf->file->instance_unique_id . 'uservirtualcard' . $object->id . '-' . $object->login, 'md5');
// Me section
$usersection = '';
$companysection = '';
// Show logo (search order: logo defined by ONLINE_SIGN_LOGO_suffix, then ONLINE_SIGN_LOGO_, then small company logo, large company logo, theme logo, common logo)
// Define logo and logosmall
$logosmall = $mysoc->logo_squarred_small ? $mysoc->logo_squarred_small : $mysoc->logo_small;
$logo = $mysoc->logo_squarred ? $mysoc->logo_squarred : $mysoc->logo;
$paramlogo = 'ONLINE_USER_LOGO_' . $suffix;
//print '<!-- Show logo (logosmall='.$logosmall.' logo='.$logo.') -->'."\n";
// Define urllogo
$urllogo = '';
$urllogofull = '';
// Description
$text = \getDolUserString('USER_PUBLIC_MORE', '', $object);
$fullexternaleurltovirtualcard = $object->getOnlineVirtualCardUrl('', 'external');
$fullinternalurltovirtualcard = $object->getOnlineVirtualCardUrl('', 'internal');