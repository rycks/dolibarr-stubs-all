<?php

/* Copyright (C) 2017       Laurent Destailleur     <eldy@users.sourceforge.net>
 * Copyright (C) 2024-2025  Frédéric France         <frederic.france@free.fr>
 * Copyright (C) ---Replace with your own copyright and developer email---
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
 *    \file       htdocs/modulebuilder/template/myobject_card.php
 *    \ingroup    mymodule
 *    \brief      Page to create/edit/view myobject
 */
// General defined Options
//if (! defined('CSRFCHECK_WITH_TOKEN'))     define('CSRFCHECK_WITH_TOKEN', '1');					// Force use of CSRF protection with tokens even for GET
//if (! defined('MAIN_AUTHENTICATION_MODE')) define('MAIN_AUTHENTICATION_MODE', 'aloginmodule');	// Force authentication handler
//if (! defined('MAIN_LANG_DEFAULT'))        define('MAIN_LANG_DEFAULT', 'auto');					// Force LANG (language) to a particular value
//if (! defined('MAIN_SECURITY_FORCECSP'))   define('MAIN_SECURITY_FORCECSP', 'none');				// Disable all Content Security Policies
//if (! defined('NOBROWSERNOTIF'))     		 define('NOBROWSERNOTIF', '1');					// Disable browser notification
//if (! defined('NOIPCHECK'))                define('NOIPCHECK', '1');						// Do not check IP defined into conf $dolibarr_main_restrict_ip
//if (! defined('NOLOGIN'))                  define('NOLOGIN', '1');						// Do not use login - if this page is public (can be called outside logged session). This includes the NOIPCHECK too.
//if (! defined('NOREQUIREAJAX'))            define('NOREQUIREAJAX', '1');       	  		// Do not load ajax.lib.php library
//if (! defined('NOREQUIREDB'))              define('NOREQUIREDB', '1');					// Do not create database handler $db
//if (! defined('NOREQUIREHTML'))            define('NOREQUIREHTML', '1');					// Do not load html.form.class.php
//if (! defined('NOREQUIREMENU'))            define('NOREQUIREMENU', '1');					// Do not load and show top and left menu
//if (! defined('NOREQUIRESOC'))             define('NOREQUIRESOC', '1');					// Do not load object $mysoc
//if (! defined('NOREQUIRETRAN'))            define('NOREQUIRETRAN', '1');					// Do not load object $langs
//if (! defined('NOREQUIREUSER'))            define('NOREQUIREUSER', '1');					// Do not load object $user
//if (! defined('NOSCANGETFORINJECTION'))    define('NOSCANGETFORINJECTION', '1');			// Do not check injection attack on GET parameters
//if (! defined('NOSCANPOSTFORINJECTION'))   define('NOSCANPOSTFORINJECTION', '1');			// Do not check injection attack on POST parameters
//if (! defined('NOSESSION'))                define('NOSESSION', '1');						// On CLI mode, no need to use web sessions
//if (! defined('NOSTYLECHECK'))             define('NOSTYLECHECK', '1');					// Do not check style html tag into posted data
//if (! defined('NOTOKENRENEWAL'))           define('NOTOKENRENEWAL', '1');					// Do not roll the Anti CSRF token (used if MAIN_SECURITY_CSRF_WITH_TOKEN is on)
// Load Dolibarr environment
$res = 0;
// Try main.inc.php into web root detected using web root calculated from SCRIPT_FILENAME
$tmp = empty($_SERVER['SCRIPT_FILENAME']) ? '' : $_SERVER['SCRIPT_FILENAME'];
$tmp2 = \realpath(__FILE__);
$i = \strlen($tmp) - 1;
$j = \strlen($tmp2) - 1;
// Get parameters
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$lineid = \GETPOSTINT('lineid');
//$socid = GETPOSTINT('socid');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : \getDolDefaultContextPage(__FILE__);
// To manage different context of search
$backtopage = \GETPOST('backtopage', 'alpha');
// if not set, a default page will be used
$backtopageforcancel = \GETPOST('backtopageforcancel', 'alpha');
// if not set, $backtopage will be used
$optioncss = \GETPOST('optioncss', 'aZ');
// Option for the css output (always '' except when 'print')
$dol_openinpopup = \GETPOST('dol_openinpopup', 'aZ09');
// Initialize a technical objects
$object = new \MyObject($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->mymodule->dir_output . '/temp/massgeneration/' . $user->id;
// Note that conf->hooks_modules contains array
$soc = \null;
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// Initialize array of search criteria
$search_all = \trim(\GETPOST("search_all", 'alpha'));
$search = array();
// Must be 'include', not 'include_once'.
// There is several ways to check permission.
// Set $enablepermissioncheck to 1 to enable a minimum low level of checks
$enablepermissioncheck = \getDolGlobalInt('MYMODULE_ENABLE_PERMISSION_CHECK');
$upload_dir = $conf->mymodule->multidir_output[isset($object->entity) ? $object->entity : 1] . '/myobject';
$error = 0;
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$backurlforlist = \dol_buildpath('/mymodule/myobject_list.php', 1);
$triggermodname = $object->TRIGGER_PREFIX . '_MODIFY';
// Other special actions
/*
if ($action == 'set_thirdparty' && $permissiontoadd) {
	$object->setValueFrom('fk_soc', GETPOSTINT('fk_soc'), '', null, 'date', '', $user, $triggermodname);
}
if ($action == 'classin' && $permissiontoadd) {
	$object->setProject(GETPOSTINT('projectid'));
}
*/
// Actions to send emails
$triggersendname = 'MYMODULE_MYOBJECT_SENTBYMAIL';
$autocopy = 'MAIN_MAIL_AUTOCOPY_MYOBJECT_TO';
$trackid = 'myobject' . $object->id;
/*
 * View
 */
$form = new \Form($db);
$formfile = new \FormFile($db);
$title = $langs->trans("MyObject") . " - " . $langs->trans('Card');
$help_url = '';
$head = \myobjectPrepareHead($object);
$formconfirm = '';
// Confirmation of action xxxx (You can use it for xxx = 'close', xxx = 'reopen', ...)
// if ($action == 'xxx') {
// 	$text = $langs->trans('ConfirmActionXxx', $object->ref);
// 	if (isModEnabled('notification')) {
// 		require_once DOL_DOCUMENT_ROOT . '/core/class/notify.class.php';
// 		$notify = new Notify($db);
// 		$text .= '<br>';
// 		$text .= $notify->confirmMessage('MYOBJECT_CLOSE', $object->socid, $object);
// 	}
// 	$formquestion = array();
// 	$forcecombo=0;
// 	if ($conf->browser->name == 'ie') $forcecombo = 1;	// There is a bug in IE10 that make combo inside popup crazy
// 	$formquestion = array(
// 		// 'text' => $langs->trans("ConfirmClone"),
// 		// array('type' => 'checkbox', 'name' => 'clone_content', 'label' => $langs->trans("CloneMainAttributes"), 'value' => 1),
// 		// array('type' => 'checkbox', 'name' => 'update_prices', 'label' => $langs->trans("PuttingPricesUpToDate"), 'value' => 1),
// 		// array('type' => 'other',    'name' => 'idwarehouse',   'label' => $langs->trans("SelectWarehouseForStockDecrease"), 'value' => $formproduct->selectWarehouses(GETPOST('idwarehouse')?GETPOST('idwarehouse'):'ifone', 'idwarehouse', '', 1, 0, 0, '', 0, $forcecombo))
// 	);
// 	$formconfirm = $form->formconfirm($_SERVER["PHP_SELF"].'?id='.$object->id, $langs->trans('XXX'), $text, 'confirm_xxx', $formquestion, 0, 1, 220);
// }
// Call Hook formConfirm
$parameters = array('formConfirm' => $formconfirm, 'lineid' => $lineid);
$reshook = $hookmanager->executeHooks('formConfirm', $parameters, $object, $action);
// Object card
// ------------------------------------------------------------
$linkback = '<a href="' . \dol_buildpath('/mymodule/myobject_list.php', 1) . '?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
// Presend form
$modelmail = 'myobject';
$defaulttopic = 'InformationMessage';
$diroutput = $conf->mymodule->dir_output;
$trackid = 'myobject' . $object->id;