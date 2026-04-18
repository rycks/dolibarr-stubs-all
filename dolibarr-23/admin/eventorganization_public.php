<?php

// Parameters
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$backtopage = \GETPOST('backtopage', 'alpha');
$value = \GETPOST('value', 'alpha');
$label = \GETPOST('label', 'alpha');
$modulepart = \GETPOST('modulepart', 'aZ09');
// Used by actions_setmoduleoptions.inc.php
$scandir = \GETPOST('scan_dir', 'alpha');
$type = 'myobject';
$arrayofparameters = array('EVENTORGANIZATION_SECUREKEY' => array('type' => 'securekey', 'enabled' => 1, 'css' => ''));
$error = 0;
$setupnotempty = 0;
$dirmodels = \array_merge(array('/'), (array) $conf->modules_parts['models']);
/*
 * View
 */
$form = new \Form($db);
$page_name = "EventOrganizationSetup";
// Subheader
$linkback = '<a href="' . ($backtopage ? $backtopage : \DOL_URL_ROOT . '/admin/modules.php?restore_lastsearch_values=1') . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
// Configuration header
$head = \eventorganizationAdminPrepareHead();
// Define $urlwithroot
$urlwithouturlroot = \preg_replace('/' . \preg_quote(\DOL_URL_ROOT, '/') . '$/i', '', \trim($dolibarr_main_url_root));
$urlwithroot = $urlwithouturlroot . \DOL_URL_ROOT;