<?php

$extrafields = new \ExtraFields($db);
$action = \GETPOST('action', 'aZ09');
$value = \GETPOST('value', 'alpha');
$modulepart = \GETPOST('modulepart', 'aZ09');
// Used by actions_setmoduleoptions.inc.php
$type = 'group';
/*
 * View
 */
$help_url = 'EN:Module_Users|FR:Module_Utilisateurs|ES:M&oacute;dulo_Usuarios';
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \user_admin_prepare_head();
$dirmodels = \array_merge(array('/'), (array) $conf->modules_parts['models']);
$form = new \Form($db);
// Defini tableau def des modeles
$def = array();
$sql = "SELECT nom";
$resql = $db->query($sql);