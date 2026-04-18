<?php

$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$search_event = \GETPOST('search_event', 'alpha');
// Get list of triggers available
$triggers = array();
$sql = "SELECT a.rowid, a.code, a.label, a.elementtype, a.rang as position";
$resql = $db->query($sql);
//$triggers = dol_sort_array($triggers, 'code', 'asc', 0, 0, 1);
/*
 *	Actions
 */
$error = 0;
$i = 0;
/**
 * View
 */
$form = new \Form($db);
$title = $langs->trans("AgendaSetup");
$help_url = 'EN:Module_Agenda_En|FR:Module_Agenda|ES:Módulo_Agenda|DE:Modul_Terminplanung';
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$param = '';
$head = \agenda_prepare_head();
$searchpicto = $form->showFilterButtons();