<?php

$extrafields = new \ExtraFields($db);
$form = new \Form($db);
// List of supported format
$type2label = \ExtraFields::getListOfTypesLabels();
$action = \GETPOST('action', 'aZ09');
$attrname = \GETPOST('attrname', 'alpha');
$elementtype = 'adherent_type';
/*
 * View
 */
$textobject = $langs->transnoentitiesnoconv("MembersTypes");
$title = $langs->trans("MembersSetup");
$help_url = 'EN:Module_Foundations|FR:Module_Adh&eacute;rents|ES:M&oacute;dulo_Miembros|DE:Modul_Mitglieder';
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \member_admin_prepare_head();