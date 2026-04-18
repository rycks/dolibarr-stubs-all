<?php

$id = \GETPOSTINT('id');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm');
$cancel = \GETPOST('cancel', 'alpha');
$projectid = \GETPOSTINT('projectid');
$result = \restrictedArea($user, 'loan', $id, '', '');
$object = new \Loan($db);
$permissiontoadd = $user->hasRight('loan', 'write');
$error = 0;
$staytopay = 0;
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$formproject = new \FormProjets($db);
$morehtmlstatus = '';
$outputlangs = $langs;
$formaccounting = \null;
$title = $langs->trans("Loan") . ' - ' . $langs->trans("Card");
$help_url = 'EN:Module_Loan|FR:Module_Emprunt';
$doleditor = new \DolEditor('note_private', \GETPOST('note_private', 'alpha'), '', 160, 'dolibarr_notes', 'In', \false, \true, !\getDolGlobalString('FCKEDITOR_ENABLE_NOTE_PUBLIC') ? 0 : 1, \ROWS_6, '90%');
$doleditor = new \DolEditor('note_public', \GETPOST('note_public', 'alpha'), '', 160, 'dolibarr_notes', 'In', \false, \true, !\getDolGlobalString('FCKEDITOR_ENABLE_NOTE_PRIVATE') ? 0 : 1, \ROWS_6, '90%');
$object = new \Loan($db);
$result = $object->fetch($id);