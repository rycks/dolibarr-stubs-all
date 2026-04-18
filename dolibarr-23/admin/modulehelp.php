<?php

\define('NOREQUIREMENU', '1');
\define('NOTOKENRENEWAL', '1');
$mode = \GETPOST('mode', 'alpha');
$action = \GETPOST('action', 'aZ09');
$id = \GETPOSTINT('id');
/*
 * Actions
 */
// Nothing
/*
 * View
 */
$form = new \Form($db);
$help_url = 'EN:First_setup|FR:Premiers_paramétrages|ES:Primeras_configuraciones';
$arrayofnatures = array('core' => $langs->transnoentitiesnoconv("Core"), 'external' => $langs->transnoentitiesnoconv("External") . ' - ' . $langs->trans("AllPublishers"));
// Search modules dirs
$modulesdir = \dolGetModulesDirs();
$filename = array();
$modules = array();
$orders = array();
$categ = array();
$dirmod = array();
$i = 0;
// is a sequencer of modules found
$j = 0;
// j is module number. Automatically affected if module number not defined.
$modNameLoaded = array();
$familyinfo = array();
//var_dump($orders);
//var_dump($categ);
//var_dump($modules);
$objMod = \null;
$dirofmodule = \null;
$key = -1;
$i = 0;
$value = $orders[$key];
$tab = \explode('_', $value);
$familyposition = $tab[0];
$familykey = $tab[1];
$module_position = $tab[2];
$numero = $tab[3];
$head = \modulehelp_prepare_head($objMod);
// Check filters
$modulename = $objMod->getName();
$moduledesc = $objMod->getDesc(1);
$moduleauthor = $objMod->getPublisher();
$moduledir = \strtolower(\preg_replace('/^mod/i', '', \get_class($objMod)));
$const_name = 'MAIN_MODULE_' . \strtoupper(\preg_replace('/^mod/i', '', \get_class($objMod)));
$text = '<span class="opacitymedium">' . $langs->trans("LastActivationDate") . ':</span> ';
$tmp = $objMod->getLastActivationInfo();
$authorid = empty($tmp['authorid']) ? '' : $tmp['authorid'];
$ip = empty($tmp['ip']) ? '' : $tmp['ip'];
$lastactivationversion = empty($tmp['lastactivationversion']) ? '' : $tmp['lastactivationversion'];
$moreinfo = $text;
$title = $modulename ? $modulename : $moduledesc;
$picto = 'object_' . $objMod->picto;
// Version (with picto warning or not)
$version = $objMod->getVersion(0);
$versiontrans = '';
// Define imginfo
$imginfo = "info";
// Define text of description of module
$text = '';
$moduledescriptorfile = \get_class($objMod) . '.class.php';
$textexternal = '';
$moduledesclong = $objMod->getDescLong();
$listofsqlfiles1 = \dol_dir_list(\DOL_DOCUMENT_ROOT . '/install/mysql/tables/', 'files', 0, 'llx.*-' . $moduledir . '\\.sql', array('\\.key\\.sql', '\\.sql\\.back'));
$listofsqlfiles2 = \dol_dir_list(\dol_buildpath($moduledir . '/sql/'), 'files', 0, 'llx.*\\.sql', array('\\.key\\.sql', '\\.sql\\.back'));
$sqlfiles = \array_merge($listofsqlfiles1, $listofsqlfiles2);
$filedata = \dol_buildpath($moduledir . '/sql/data.sql');
$moreinfoontriggerfile = '';
$interfaces = new \Interfaces($db);
$triggers = $interfaces->getTriggersList(array(($objMod->isCoreOrExternalModule() == 'external' ? '/' . $moduledir : '') . '/core/triggers'));
$changelog = $objMod->getChangeLog();