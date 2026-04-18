<?php

$error = 0;
$action = \GETPOST('action', 'aZ09');
$syslogModules = array();
$activeModules = array();
$activeModules = \json_decode($conf->global->SYSLOG_HANDLERS);
$dirsyslogs = \array_merge(array('/core/modules/syslog/'), $conf->modules_parts['syslog']);
$newActiveModules = array();
$selectedModules = \GETPOSTISSET('SYSLOG_HANDLERS') ? \GETPOST('SYSLOG_HANDLERS') : array();
$activeModules = $newActiveModules;
$error = 0;
$errors = [];
$level = \GETPOST("level");
$res = \dolibarr_set_const($db, "SYSLOG_LEVEL", $level, 'chaine', 0, '', 0);
$form = new \Form($db);
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$syslogfacility = $defaultsyslogfacility = \dolibarr_get_const($db, "SYSLOG_FACILITY", 0);
$syslogfile = $defaultsyslogfile = \dolibarr_get_const($db, "SYSLOG_FILE", 0);
$optionmc = '';