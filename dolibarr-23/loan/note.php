<?php

/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
$action = \GETPOST('action', 'aZ09');
// Security check
$id = \GETPOSTINT('id');
$result = \restrictedArea($user, 'loan', $id, '&loan');
$object = new \Loan($db);
$permissionnote = $user->hasRight('loan', 'write');
// Used by the include of actions_setnotes.inc.php
$morehtmlright = '';
/*
 * Actions
 */
$reshook = $hookmanager->executeHooks('doActions', array(), $object, $action);
/*
 * View
 */
$morehtmlright = '';
$form = new \Form($db);
$title = $langs->trans("Loan") . ' - ' . $langs->trans("Notes");
$help_url = 'EN:Module_Loan|FR:Module_Emprunt';
/*
 * Show tabs
 */
$totalpaid = $object->getSumPayment();
$head = \loan_prepare_head($object);
$morehtmlref = '<div class="refidno">';
$linkback = '<a href="' . \DOL_URL_ROOT . '/loan/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
// To give a chance to dol_banner_tab to use already paid amount to show correct status
$morehtmlstatus = $morehtmlright;
$cssclass = 'titlefield';
$permission = $user->hasRight('loan', 'write');