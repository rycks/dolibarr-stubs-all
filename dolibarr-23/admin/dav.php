<?php

// Parameters
$action = \GETPOST('action', 'aZ09');
$backtopage = \GETPOST('backtopage', 'alpha');
$arrayofparameters = array('DAV_RESTICT_ON_IP' => array('css' => 'minwidth200', 'enabled' => 1), 'DAV_ALLOW_PRIVATE_DIR' => array('css' => 'minwidth200', 'enabled' => 2), 'DAV_ALLOW_PUBLIC_DIR' => array('css' => 'minwidth200', 'enabled' => 1), 'DAV_ALLOW_ECM_DIR' => array('css' => 'minwidth200', 'enabled' => \isModEnabled('ecm')));
/*
 * View
 */
$help_url = 'EN:Module_DAV';
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \dav_admin_prepare_head();
// Define $urlwithroot
$urlwithouturlroot = \preg_replace('/' . \preg_quote(\DOL_URL_ROOT, '/') . '$/i', '', \trim($dolibarr_main_url_root));
$urlwithroot = $urlwithouturlroot . \DOL_URL_ROOT;
// This is to use external domain name found into config file
//$urlwithroot=DOL_MAIN_URL_ROOT;					// This is to use same domain name than current
// Show message
$message = '';
$url = '<a href="' . $urlwithroot . '/dav/fileserver.php" target="_blank" rel="noopener noreferrer">' . $urlwithroot . '/dav/fileserver.php</a>';
$version = \Sabre\DAV\Version::VERSION;