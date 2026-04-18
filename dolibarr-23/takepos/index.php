<?php

\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
$place = \GETPOST('place', 'aZ09') ? \GETPOST('place', 'aZ09') : 0;
// $place is id of table for Bar or Restaurant or multiple sales
$action = \GETPOST('action', 'aZ09');
$setterminal = \GETPOSTINT('setterminal');
$setcurrency = \GETPOST('setcurrency', 'aZ09');
$categorie = new \Categorie($db);
$maxcategbydefaultforthisdevice = 12;
$maxproductbydefaultforthisdevice = 24;
$MAXCATEG = \getDolGlobalInt('TAKEPOS_NB_MAXCATEG', $maxcategbydefaultforthisdevice);
$MAXPRODUCT = \getDolGlobalInt('TAKEPOS_NB_MAXPRODUCT', $maxproductbydefaultforthisdevice);
$term = empty($_SESSION['takeposterminal']) ? 1 : $_SESSION['takeposterminal'];
$socid = \getDolGlobalInt('CASHDESK_ID_THIRDPARTY' . $term);
/*
$constforcompanyid = 'CASHDESK_ID_THIRDPARTY'.$_SESSION["takeposterminal"];
$soc = new Societe($db);
if ($invoice->socid > 0) $soc->fetch($invoice->socid);
else $soc->fetch(getDolGlobalInt($constforcompanyid));
*/
// Security check
$result = \restrictedArea($user, 'takepos', 0, '');
/*
 * View
 */
$form = new \Form($db);
$disablejs = 0;
$disablehead = 0;
$arrayofjs = array('/takepos/js/jquery.colorbox-min.js');
// TODO It seems we don't need this
$arrayofcss = array('/takepos/css/pos.css.php', '/takepos/css/colorbox.css');
// Title
$title = 'TakePOS - Dolibarr ' . \DOL_VERSION;
$head = '<meta name="apple-mobile-web-app-title" content="TakePOS"/>
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="mobile-web-app-capable" content="yes">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>';
$categories = $categorie->get_full_arbo('product', \getDolGlobalInt('TAKEPOS_ROOT_CATEGORY_ID'), 1);
// Search root category to know its level
//$conf->global->TAKEPOS_ROOT_CATEGORY_ID=0;
$levelofrootcategory = 0;
$levelofmaincategories = $levelofrootcategory + 1;
// Main categories are categories just under the root categorie of POS products.
$maincategories = array();
$subcategories = array();
$maincategories = \dol_sort_array($maincategories, 'label');
$subcategories = \dol_sort_array($subcategories, 'label');
$keyCodeForEnter = '';
$titlestring = "'" . \dol_escape_js($langs->transnoentities('Ref') . ': ') . "' + data[idata]['ref']";
// Add js from hooks
$parameters = array();
$parameters = array();
$reshook = $hookmanager->executeHooks('paramsForCloseBill', $parameters, $obj, $action);
$alternative_payurl = \getDolGlobalString('TAKEPOS_ALTERNATIVE_PAYMENT_SCREEN');
$titlestring = "'" . \dol_escape_js($langs->transnoentities('Ref') . ': ') . "' + data[i]['ref']";
// Add js from hooks
$parameters = array();
$sql = "SELECT rowid, status FROM " . \MAIN_DB_PREFIX . "pos_cash_fence WHERE";
$resql = $db->query($sql);
$reshook = $hookmanager->executeHooks('takepos_login_block_other');
$nbloop = \getDolGlobalInt('TAKEPOS_NUM_TERMINALS');
$sql = 'SELECT code FROM ' . \MAIN_DB_PREFIX . 'multicurrency';
$resql = $db->query($sql);
$sql = "SELECT code, libelle FROM " . \MAIN_DB_PREFIX . "c_paiement";
$resql = $db->query($sql);
$paiementsModes = array();
// User menu and external TakePOS modules
$menus = array();
$r = 0;
$customprinterallowed = \false;
// Button to print receipt before payment
$customprinterallowed = \true;
$customprinttemplateallowed = \true;
$sql = "SELECT rowid, status, entity FROM " . \MAIN_DB_PREFIX . "pos_cash_fence WHERE";
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$parameters = array('menus' => $menus);
$reshook = $hookmanager->executeHooks('ActionButtons', $parameters);
$i = 0;
$count = 0;
$count = 0;