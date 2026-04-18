<?php

$rowid = \GETPOSTINT("rowid");
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans('Subscription') . " - " . $langs->trans('Info');
$help_url = 'EN:Module_Foundations|FR:Module_Adh&eacute;rents|ES:M&oacute;dulo_Miembros|DE:Modul_Mitglieder';
$object = new \Subscription($db);
$result = $object->fetch($rowid);
$head = \subscription_prepare_head($object);
$linkback = '<a href="' . \DOL_URL_ROOT . '/adherents/subscription/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';