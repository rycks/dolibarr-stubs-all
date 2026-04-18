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
 *  \file       htdocs/modulebuilder/template/myobject_agenda.php
 *  \ingroup    mymodule
 *  \brief      Tab of events on MyObject
 */
//if (! defined('NOREQUIREDB'))              define('NOREQUIREDB', '1');				// Do not create database handler $db
//if (! defined('NOREQUIREUSER'))            define('NOREQUIREUSER', '1');				// Do not load object $user
//if (! defined('NOREQUIRESOC'))             define('NOREQUIRESOC', '1');				// Do not load object $mysoc
//if (! defined('NOREQUIRETRAN'))            define('NOREQUIRETRAN', '1');				// Do not load object $langs
//if (! defined('NOSCANGETFORINJECTION'))    define('NOSCANGETFORINJECTION', '1');		// Do not check injection attack on GET parameters
//if (! defined('NOSCANPOSTFORINJECTION'))   define('NOSCANPOSTFORINJECTION', '1');		// Do not check injection attack on POST parameters
//if (! defined('NOTOKENRENEWAL'))           define('NOTOKENRENEWAL', '1');				// Do not roll the Anti CSRF token (used if MAIN_SECURITY_CSRF_WITH_TOKEN is on)
//if (! defined('NOSTYLECHECK'))             define('NOSTYLECHECK', '1');				// Do not check style html tag into posted data
//if (! defined('NOREQUIREMENU'))            define('NOREQUIREMENU', '1');				// If there is no need to load and show top and left menu
//if (! defined('NOREQUIREHTML'))            define('NOREQUIREHTML', '1');				// If we don't need to load the html.form.class.php
//if (! defined('NOREQUIREAJAX'))            define('NOREQUIREAJAX', '1');       	  	// Do not load ajax.lib.php library
//if (! defined("NOLOGIN"))                  define("NOLOGIN", '1');					// If this page is public (can be called outside logged session). This include the NOIPCHECK too.
//if (! defined('NOIPCHECK'))                define('NOIPCHECK', '1');					// Do not check IP defined into conf $dolibarr_main_restrict_ip
//if (! defined("MAIN_LANG_DEFAULT"))        define('MAIN_LANG_DEFAULT', 'auto');					// Force lang to a particular value
//if (! defined("MAIN_AUTHENTICATION_MODE")) define('MAIN_AUTHENTICATION_MODE', 'aloginmodule');	// Force authentication handler
//if (! defined("MAIN_SECURITY_FORCECSP"))   define('MAIN_SECURITY_FORCECSP', 'none');	// Disable all Content Security Policies
//if (! defined('CSRFCHECK_WITH_TOKEN'))     define('CSRFCHECK_WITH_TOKEN', '1');		// Force use of CSRF protection with tokens even for GET
//if (! defined('NOBROWSERNOTIF'))     		 define('NOBROWSERNOTIF', '1');				// Disable browser notification
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
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : \getDolDefaultContextPage(__FILE__);
// To manage different context of search
$backtopage = \GETPOST('backtopage', 'alpha');
$actioncode = \GETPOST('actioncode', 'array:alpha', 3);
$search_rowid = \GETPOST('search_rowid');
$search_agenda_label = \GETPOST('search_agenda_label');
$search_complete = \GETPOST('search_complete');
$search_filtert = \GETPOSTINT('search_filtert');
$search_dateevent_start = \GETPOSTDATE('dateevent_start');
$search_dateevent_end = \GETPOSTDATE('dateevent_end');
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
// Initialize a technical objects
$object = new \MyObject($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->mymodule->dir_output . '/temp/massgeneration/' . $user->id;
// There is several ways to check permission.
// Set $enablepermissioncheck to 1 to enable a minimum low level of checks
$enablepermissioncheck = \getDolGlobalInt('MYMODULE_ENABLE_PERMISSION_CHECK');
/*
 *  Actions
 */
$parameters = array('id' => $id);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 *	View
 */
$form = new \Form($db);
$title = $langs->trans("MyObject") . " - " . $langs->trans('Agenda');
//$title = $object->ref." - ".$langs->trans("Agenda");
$help_url = 'EN:Module_Agenda_En|DE:Modul_Terminplanung';
$head = \myobjectPrepareHead($object);
// Object card
// ------------------------------------------------------------
$linkback = '<a href="' . \dol_buildpath('/mymodule/myobject_list.php', 1) . '?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
// Actions buttons
$objthirdparty = $object;
$objcon = new \stdClass();
$out = '&origin=' . \urlencode($object->element . (!empty($object->module) ? '@' . $object->module : '')) . '&originid=' . \urlencode((string) $object->id);
$urlbacktopage = $_SERVER['PHP_SELF'] . '?id=' . $object->id;
$permok = $user->hasRight('agenda', 'myactions', 'create');
$morehtmlright = '';