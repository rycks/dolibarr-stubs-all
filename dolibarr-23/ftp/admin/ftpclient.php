<?php

$def = array();
$lastftpentry = 0;
$action = \GETPOST('action', 'aZ09');
$entry = \GETPOST('numero_entry', 'alpha');
// Initialise variables
$result1 = 0;
$result2 = 0;
$result3 = 0;
$result4 = 0;
$result5 = 0;
$result6 = 0;
/*
 * Action
 */
// Get value for $lastftpentry
$sql = "select MAX(name) as name from " . \MAIN_DB_PREFIX . "const";
$result = $db->query($sql);
$obj = $db->fetch_object($result);
$reg = array();
$ftp_name = "FTP_NAME_" . $entry;
$ftp_server = "FTP_SERVER_" . $entry;
$error = 0;
/*
 * View
 */
$form = new \Form($db);
$help_url = 'EN:Module_FTP_En|FR:Module_FTP|ES:Módulo_FTP';
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';