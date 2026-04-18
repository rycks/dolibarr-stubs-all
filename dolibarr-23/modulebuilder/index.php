<?php

\define('NOSCANPOSTFORINJECTION', '1');
// GET Parameters
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel', 'alpha');
$sortfield = \GETPOST('sortfield', 'alpha');
$sortorder = \GETPOST('sortorder', 'aZ09');
$module = (string) \GETPOST('module', 'alpha');
$tab = (string) \GETPOST('tab', 'aZ09');
$tabobj = \GETPOST('tabobj', 'alpha');
$tabdic = \GETPOST('tabdic', 'alpha');
$propertykey = \GETPOST('propertykey', 'alpha');
$file = \GETPOST('file', 'alpha');
$find = \GETPOST('find', 'alpha');
$modulename = \dol_sanitizeFileName(\GETPOST('modulename', 'alpha'));
$objectname = \dol_sanitizeFileName(\GETPOST('objectname', 'alpha'));
$dicname = \dol_sanitizeFileName(\GETPOST('dicname', 'alpha'));
$editorname = (string) \GETPOST('editorname', 'alpha');
$editorurl = (string) \GETPOST('editorurl', 'alpha');
$version = (string) \GETPOST('version', 'alpha');
$family = (string) \GETPOST('family', 'alpha');
$picto = (string) \GETPOST('idpicto', 'alpha');
$idmodule = (string) \GETPOST('idmodule', 'alpha');
$format = '';
// Dir for custom dirs
$tmp = \explode(',', $dolibarr_main_document_root_alt);
$dirins = $tmp[0];
$dirread = $dirins;
$forceddirread = 0;
$tmpdir = \explode('@', $module);
$FILEFLAG = 'modulebuilder.txt';
$now = \dol_now();
$newmask = 0;
$result = \restrictedArea($user, 'modulebuilder', 0);
$error = 0;
$param = '';
$form = new \Form($db);
// Define $listofmodules
$dirsrootforscan = array($dirread);
// Search modules to edit
$textforlistofdirs = '<!-- Directory scanned -->' . "\n";
$listofmodules = array();
$i = 0;
/**
 * Add management to catch fatal errors - shutdown handler
 *
 * @return	void
 */
function moduleBuilderShutdownFunction()
{
}
/**
 * Produce copyright replacement string for user
 *
 * @param	User		$user	User to produce the copyright notice for.
 * @param	Translate	$langs	Translation object to use.
 * @param	int			$now	Date for which the copyright will be generated.
 *
 * @return	string	String to be used as replacement after Copyright (C)
 */
function getLicenceHeader($user, $langs, $now)
{
}
$modulename = \ucfirst($modulename);
// Force first letter in uppercase
$destdir = '/not_set/';
$destdir = '/not_set/';
// Initialize (for static analysis)
$destfile = '/not_set/';
// Initialize (for static analysis)
$srcfile = '/not_set/';
$modulename = \ucfirst($module);
// Force first letter in uppercase
$objectname = $tabobj;
$varnametoupdate = '';
$dirins = $listofmodules[\strtolower($module)]['moduledescriptorrootpath'];
$destdir = $dirins . '/' . \strtolower($module);
// Get list of existing objects
$objects = \dolGetListOfObjectClasses($destdir);
$modulename = \ucfirst($module);
// Force first letter in uppercase
$objectname = $tabobj;
$srcdir = \DOL_DOCUMENT_ROOT . '/modulebuilder/template';
$srcfile1 = $srcdir . '/sql/llx_mymodule_myobject_extrafields.sql';
$destfile1 = $dirins . '/' . \strtolower($module) . '/sql/llx_' . \strtolower($module) . '_' . \strtolower($objectname) . '_extrafields.sql';
$result1 = \dol_copy($srcfile1, $destfile1, '0', 0);
$srcfile2 = $srcdir . '/sql/llx_mymodule_myobject_extrafields.key.sql';
$destfile2 = $dirins . '/' . \strtolower($module) . '/sql/llx_' . \strtolower($module) . '_' . \strtolower($objectname) . '_extrafields.key.sql';
$result2 = \dol_copy($srcfile2, $destfile2, '0', 0);
// Now we update the object file to set $this->isextrafieldmanaged to 1
$srcfile = $dirins . '/' . \strtolower($module) . '/class/' . \strtolower($objectname) . '.class.php';
$arrayreplacement = array('/\\$this->isextrafieldmanaged = 0;/' => '$this->isextrafieldmanaged = 1;');
$arrayreplacement = array('/\\$isextrafieldmanaged = 0;/' => '$isextrafieldmanaged = 1;');
$srcdir = \DOL_DOCUMENT_ROOT . '/modulebuilder/template';
$srcfile = $srcdir . '/class/actions_mymodule.class.php';
$destfile = $dirins . '/' . \strtolower($module) . '/class/actions_' . \strtolower($module) . '.class.php';
$result = \dol_copy($srcfile, $destfile, '0', 0);
$srcdir = \DOL_DOCUMENT_ROOT . '/modulebuilder/template';
$srcfile = $srcdir . '/core/triggers/interface_99_modMyModule_MyModuleTriggers.class.php';
$destfile = $dirins . '/' . \strtolower($module) . '/core/triggers/interface_99_mod' . $module . '_' . $module . 'Triggers.class.php';
$result = \dol_copy($srcfile, $destfile, '0', 0);
$srcdir = \DOL_DOCUMENT_ROOT . '/modulebuilder/template';
$srcfile = $srcdir . '/core/boxes/mymodulewidget1.php';
$destfile = $dirins . '/' . \strtolower($module) . '/core/boxes/' . \strtolower($module) . 'widget1.php';
$result = \dol_copy($srcfile, $destfile, '0', 0);
$srcdir = \DOL_DOCUMENT_ROOT . '/modulebuilder/template';
$srcfile = $srcdir . '/core/modules/mailings/mailing_mymodule_selector1.modules.php';
$destfile = $dirins . '/' . \strtolower($module) . '/core/modules/mailings/mailing_' . \strtolower($module) . '_selector1.modules.php';
$result = \dol_copy($srcfile, $destfile, '0', 0);
$srcdir = \DOL_DOCUMENT_ROOT . '/modulebuilder/template';
$srcfile = $srcdir . '/css/mymodule.css.php';
$destfile = $dirins . '/' . \strtolower($module) . '/css/' . \strtolower($module) . '.css.php';
$result = \dol_copy($srcfile, $destfile, '0', 0);
$srcdir = \DOL_DOCUMENT_ROOT . '/modulebuilder/template';
$srcfile = $srcdir . '/js/mymodule.js.php';
$destfile = $dirins . '/' . \strtolower($module) . '/js/' . \strtolower($module) . '.js.php';
$result = \dol_copy($srcfile, $destfile, '0', 0);
$srcdir = \DOL_DOCUMENT_ROOT . '/modulebuilder/template';
$srcfile = $srcdir . '/scripts/mymodule.php';
$destfile = $dirins . '/' . \strtolower($module) . '/scripts/' . \strtolower($module) . '.php';
$result = \dol_copy($srcfile, $destfile, '0', 0);
$moduledescriptorfile = '/not_set/';
$modulelowercase = \null;
$srcdir = \DOL_DOCUMENT_ROOT . '/modulebuilder/template';
$srcfile = $srcdir . '/doc/Documentation.asciidoc';
$destfile = $dirins . '/' . \strtolower($module) . '/doc/Documentation.asciidoc';
$result = \dol_copy($srcfile, $destfile, '0', 0);
$newlangcode = \GETPOST('newlangcode', 'aZ09');
$objectname = $tabobj;
$dirins = $listofmodules[\strtolower($module)]['moduledescriptorrootpath'];
$destdir = $dirins . '/' . \strtolower($module);
$relativefilename = \dol_sanitizePathName(\GETPOST('file', 'restricthtml'));
$warning = 0;
$objectname = \ucfirst($objectname);
$dirins = $dirread = $listofmodules[\strtolower($module)]['moduledescriptorrootpath'];
$moduletype = $listofmodules[\strtolower($module)]['moduletype'];
$srcdir = \DOL_DOCUMENT_ROOT . '/modulebuilder/template';
$destdir = $dirins . '/' . \strtolower($module);
// If we must reuse an existing table for properties, define $stringforproperties
// Generate class file from the table
$stringforproperties = '';
$tablename = \GETPOST('initfromtablename', 'alpha');
$filetogenerate = array();
$pathtofile = $listofmodules[\strtolower($module)]['moduledescriptorrelpath'];
$destdir = $dirins . '/' . \strtolower($module);
$moduledescriptorfile = $dirins . '/' . \strtolower($module) . '/core/modules/mod' . $module . '.class.php';
$objectname = $tabobj;
$arrayoftables = array();
$error = 0;
$objectname = \GETPOST('obj') ? \GETPOST('obj') : $tabobj;
$dirins = $dirread = $listofmodules[\strtolower($module)]['moduledescriptorrootpath'];
$moduletype = $listofmodules[\strtolower($module)]['moduletype'];
$srcdir = $dirread . '/' . \strtolower($module);
$destdir = $dirins . '/' . \strtolower($module);
$objects = \dolGetListOfObjectClasses($destdir);
$addfieldentry = array();
/*if (GETPOST('regeneratemissing'))
	{
		setEventMessages($langs->trans("FeatureNotYetAvailable"), null, 'warnings');
		$error++;
	}*/
$moduletype = $listofmodules[\strtolower($module)]['moduletype'];
$objectname = $tabobj;
$dirins = $dirread = $listofmodules[\strtolower($module)]['moduledescriptorrootpath'];
$moduletype = $listofmodules[\strtolower($module)]['moduletype'];
$srcdir = $dirread . '/' . \strtolower($module);
$destdir = $dirins . '/' . \strtolower($module);
$action = '';
$module = 'deletemodule';
$action = '';
$pathtofile = $listofmodules[\strtolower($module)]['moduledescriptorrelpath'];
$destdir = $dirins . '/' . \strtolower($module);
$moduledescriptorfile = $dirins . '/' . \strtolower($module) . '/core/modules/mod' . $module . '.class.php';
$class = 'mod' . $module;
$dicts = $moduleobj->dictionaries;
$checkComment = \checkExistComment($moduledescriptorfile, 2);
// Lookup the table dicname
$checkTable = \false;
// search the key by name
$keyToDelete = \null;
$keydict = \GETPOSTINT('dictionnarykey') - 1;
$pathtofile = $listofmodules[\strtolower($module)]['moduledescriptorrelpath'];
$destdir = $dirins . '/' . \strtolower($module);
$moduledescriptorfile = $dirins . '/' . \strtolower($module) . '/core/modules/mod' . $module . '.class.php';
$class = 'mod' . $module;
$dicts = $moduleobj->dictionaries;
$modulelowercase = \strtolower($module);
// Dir for module
$dirofmodule = \dol_buildpath($modulelowercase, 0) . '/doc';
$FILENAMEDOC = \strtolower($module) . '.html';
$util = new \Utils($db);
$result = $util->generateDoc($module);
$modulelowercase = \strtolower($module);
$pathtofile = $listofmodules[\strtolower($module)]['moduledescriptorrelpath'];
// Dir for module
$dir = \dol_buildpath($modulelowercase, 0);
// Zip file to build
$FILENAMEZIP = '';
$class = 'mod' . $module;
$arrayversion = \explode('.', $moduleobj->version, 3);
$error = 0;
// load class and check if right exist
$pathtofile = $listofmodules[\strtolower($module)]['moduledescriptorrelpath'];
$class = 'mod' . $module;
$moduleobj = \null;
$id = \GETPOST('id', 'alpha');
$label = \GETPOST('label', 'alpha');
$objectForPerms = \strtolower(\GETPOST('permissionObj', 'alpha'));
$crud = \GETPOST('crud', 'alpha');
//check existing object permission
$counter = 0;
$permsForObject = array();
$allObject = array();
$countPerms = \count($permissions);
// check if label of object already exists
$countPermsObj = \count($permsForObject);
$rightToAdd = array();
$error = 0;
// load class and check if right exist
$pathtofile = $listofmodules[\strtolower($module)]['moduledescriptorrelpath'];
$class = 'mod' . $module;
$moduleobj = \null;
$label = \GETPOST('label', 'alpha');
$objectForPerms = \strtolower(\GETPOST('permissionObj', 'alpha'));
$crud = \GETPOST('crud', 'alpha');
$key = \GETPOSTINT('counter') - 1;
//check existing object permission
$counter = 0;
$permsForObject = array();
// $permissions = $moduleobj->rights;  // Already fetched above
$firstRight = 0;
$existRight = 0;
$allObject = array();
$countPerms = \count($permissions);
$error = 0;
// load class and check if right exist
$pathtofile = $listofmodules[\strtolower($module)]['moduledescriptorrelpath'];
$class = 'mod' . $module;
$moduleobj = \null;
$permissions = $moduleobj->rights;
$key = \GETPOSTINT('permskey') - 1;
$relofcustom = \basename($dirins);
$param = '';
$value = \GETPOST('value', 'alpha');
$resarray = \activateModule($value);
$param = '';
$value = \GETPOST('value', 'alpha');
$result = \unActivateModule(\strtolower($value));
// load class and check if menu exist
$pathtofile = $listofmodules[\strtolower($module)]['moduledescriptorrelpath'];
$class = 'mod' . $module;
$moduleobj = \null;
// get all objects and convert value to lower case for compare
$dir = $listofmodules[\strtolower($module)]['moduledescriptorrootpath'];
$destdir = $dir . '/' . \strtolower($module);
$objects = \dolGetListOfObjectClasses($destdir);
$result = \array_map('strtolower', $objects);
$menus = $moduleobj->menu;
$key = \GETPOSTINT('menukey');
$moduledescriptorfile = $dirins . '/' . \strtolower($module) . '/core/modules/mod' . $module . '.class.php';
$checkcomment = \checkExistComment($moduledescriptorfile, 0);
$error = 0;
// load class and check if right exist
$pathtofile = $listofmodules[\strtolower($module)]['moduledescriptorrelpath'];
$class = 'mod' . $module;
$moduleobj = \null;
// get all menus
$menus = $moduleobj->menu;
$dirins = $listofmodules[\strtolower($module)]['moduledescriptorrootpath'];
$destdir = $dirins . '/' . \strtolower($module);
$objects = \dolGetListOfObjectClasses($destdir);
$moduledescriptorfile = $dirins . '/' . \strtolower($module) . '/core/modules/mod' . $module . '.class.php';
$objectname = \GETPOST('tabobj');
$dirins = $listofmodules[\strtolower($module)]['moduledescriptorrootpath'];
$destdir = $dirins . '/' . \strtolower($module);
$objects = \dolGetListOfObjectClasses($destdir);
$pathtofile = $listofmodules[\strtolower($module)]['moduledescriptorrelpath'];
$moduledescriptorfile = $dirins . '/' . \strtolower($module) . '/core/modules/mod' . $module . '.class.php';
$modulelogfile = $dirins . '/' . \strtolower($module) . '/ChangeLog.md';
$class = 'mod' . $module;
$moduleobj = \null;
$keydescription = \GETPOST('keydescription', 'alpha');
/*
 * View
 */
$form = new \Form($db);
$formadmin = new \FormAdmin($db);
$dirins_ok = \dol_is_dir($dirins);
$help_url = '';
$morejs = array('/includes/ace/src/ace.js', '/includes/ace/src/ext-statusbar.js', '/includes/ace/src/ext-language_tools.js');
$morecss = array();
$text = $langs->trans("ModuleBuilder");
$morehtmlright = '<a href="' . \DOL_URL_ROOT . '/admin/tools/ui/index.php" target="_blank" rel="noopener">' . \img_picto('', 'book', 'class="pictofixedwidth"') . $langs->trans("UxComponentsDoc") . '</a>';
//print $textforlistofdirs;
//print '<br>';
$message = '';
//print $langs->trans("ModuleBuilderDesc3", count($listofmodules), $FILEFLAG).'<br>';
$infomodulesfound = '<div style="padding: 12px 9px 12px">' . $form->textwithpicto('', $langs->trans("ModuleBuilderDesc3", \count($listofmodules)) . '<br><br>' . $langs->trans("ModuleBuilderDesc4", $FILEFLAG) . '<br>' . $textforlistofdirs) . '</div>';
$dolibarrdataroot = \preg_replace('/([\\/]+)$/i', '', \DOL_DATA_ROOT);
$allowonlineinstall = \true;
// Load module descriptor
$error = 0;
$moduleobj = \null;
$modulelowercase = \strtolower($module);
$loadclasserrormessage = '';
$moduleobj = \null;
// Tabs for all modules
$head = array();
$h = 0;
$linktoenabledisable = '';
// Define $linktoenabledisable
$modulelowercase = \strtolower($module);
$param = '';
$urltomodulesetup = '<a href="' . \DOL_URL_ROOT . '/admin/modules.php?search_keyword=' . \urlencode($module) . '">' . $langs->trans('Home') . '-' . $langs->trans("Setup") . '-' . $langs->trans("Modules") . '</a>';