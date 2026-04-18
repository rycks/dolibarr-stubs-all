<?php

$action = \GETPOST('action', 'aZ09');
$error = 0;
$result = \dolibarr_set_const($db, "NOTIFICATION_EMAIL_FROM", \GETPOST("email_from", "alphawithlgt"), 'chaine', 0, '', $conf->entity);
$result = \dolibarr_set_const($db, "NOTIFICATION_EMAIL_DISABLE_CONFIRM_MESSAGE", \GETPOST("notif_disable", "alphawithlgt"), 'chaine', 0, '', $conf->entity);
/*
 *	View
 */
$form = new \Form($db);
$notify = new \Notify($db);
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$title = $langs->trans("TemplatesForNotifications");
// Load array of available notifications
$notificationtrigger = new \InterfaceNotification($db);
$listofnotifiedevents = $notificationtrigger->getListOfManagedEvents();
// Editing global variables not related to a specific theme
$constantes = array();
$helptext = $langs->trans("EmailTemplateHelp", $langs->transnoentitiesnoconv("Tools"), $langs->transnoentitiesnoconv("EMailTemplates"));