<?php

$actionsave = \GETPOST('save', 'alpha');
// Get value in setup
$MAIN_AGENDA_XCAL_EXPORTKEY = \getDolGlobalString('MAIN_AGENDA_XCAL_EXPORTKEY');
$MAIN_AGENDA_EXPORT_PAST_DELAY = \getDolGlobalInt('MAIN_AGENDA_EXPORT_PAST_DELAY', 100);
$MAIN_AGENDA_EXPORT_CACHE = \getDolGlobalInt('MAIN_AGENDA_EXPORT_CACHE');
$AGENDA_EXPORT_FIX_TZ = \getDolGlobalString('AGENDA_EXPORT_FIX_TZ');
$i = 0;
/**
 * View
 */
$form = new \Form($db);
$wikihelp = 'EN:Module_Agenda_En|FR:Module_Agenda|ES:Módulo_Agenda|DE:Modul_Terminplanung';
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \agenda_prepare_head();
// Define $urlwithroot
$urlwithouturlroot = \preg_replace('/' . \preg_quote(\DOL_URL_ROOT, '/') . '$/i', '', \trim($dolibarr_main_url_root));
$urlwithroot = $urlwithouturlroot . \DOL_URL_ROOT;
// This is to use external domain name found into config file
//$urlwithroot=DOL_MAIN_URL_ROOT;					// This is to use same domain name than current
$getentity = $conf->entity > 1 ? "&entity=" . $conf->entity : "";
// Show message
$message = '';
$urlvcal = '<a href="' . $urlwithroot . '/public/agenda/agendaexport.php?format=vcal' . $getentity . '&exportkey=' . \urlencode(\getDolGlobalString('MAIN_AGENDA_XCAL_EXPORTKEY', '...')) . '" target="_blank" rel="noopener noreferrer">';
$urlical = '<a href="' . $urlwithroot . '/public/agenda/agendaexport.php?format=ical&type=event' . $getentity . '&exportkey=' . \urlencode(\getDolGlobalString('MAIN_AGENDA_XCAL_EXPORTKEY', '...')) . '" target="_blank" rel="noopener noreferrer">';
$urlrss = '<a href="' . $urlwithroot . '/public/agenda/agendaexport.php?format=rss' . $getentity . '&exportkey=' . \urlencode(\getDolGlobalString('MAIN_AGENDA_XCAL_EXPORTKEY', '...')) . '" target="_blank" rel="noopener noreferrer">';
$message = $langs->trans("AgendaUrlOptions1", $user->login, $user->login) . '<br>';
$constname = 'MAIN_AGENDA_XCAL_EXPORTKEY';