<?php

$adh = new \Adherent($db);
$adht = new \AdherentType($db);
$object = new \Subscription($db);
$errmsg = '';
$action = \GETPOST("action", 'alpha');
$rowid = \GETPOSTINT("rowid") ? \GETPOSTINT("rowid") : \GETPOSTINT("id");
$typeid = \GETPOSTINT("typeid");
$cancel = \GETPOST('cancel', 'alpha');
$confirm = \GETPOST('confirm');
$note = \GETPOST('note', 'alpha');
$typeid = \GETPOSTINT('typeid');
$amount = (float) \price2num(\GETPOST('amount', 'alpha'), 'MT');
$permissionnote = $user->hasRight('adherent', 'cotisation', 'creer');
// Used by the include of actions_setnotes.inc.php
$permissiondellink = $user->hasRight('adherent', 'cotisation', 'creer');
// Used by the include of actions_dellink.inc.php
$permissiontoedit = $user->hasRight('adherent', 'cotisation', 'creer');
// Security check
$result = \restrictedArea($user, 'subscription', 0);
// Load current object
$result = $object->fetch($rowid);
$result = $object->fetch($rowid);
$result = $object->delete($user);
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans("SubscriptionCard");
$help_url = 'EN:Module_Foundations|FR:Module_Adh&eacute;rents|ES:M&oacute;dulo_Miembros|DE:Modul_Mitglieder';
$result = $adh->fetch($object->fk_adherent);
$head = \subscription_prepare_head($object);
$linkback = '<a href="' . \DOL_URL_ROOT . '/adherents/subscription/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
/********************************************
 *
 * Subscription card in view mode
 *
 ********************************************/
$result = $object->fetch($rowid);
$result = $adh->fetch($object->fk_adherent);
$head = \subscription_prepare_head($object);
$linkback = '<a href="' . \DOL_URL_ROOT . '/adherents/subscription/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
// ancre
// Generated documents
/*
$filename = dol_sanitizeFileName($object->ref);
$filedir = $conf->facture->dir_output . '/' . dol_sanitizeFileName($object->ref);
$urlsource = $_SERVER['PHP_SELF'] . '?facid=' . $object->id;
$genallowed = $user->hasRight('facture', 'lire');
$delallowed = $user->hasRight('facture', 'creer');

print $formfile->showdocuments('facture', $filename, $filedir, $urlsource, $genallowed, $delallowed, $object->model_pdf, 1, 0, 0, 28, 0, '', '', '', $soc->default_lang);
$somethingshown = $formfile->numoffiles;
*/
// Show links to link elements
//$tmparray = $form->showLinkToObjectBlock($object, null, array('subscription'), 1);
$somethingshown = $form->showLinkedObjectBlock($object, '');