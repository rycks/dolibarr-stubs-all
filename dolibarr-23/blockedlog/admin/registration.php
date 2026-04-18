<?php

// Get Parameters
$action = \GETPOST('action', 'aZ09');
$backtopage = \GETPOST('backtopage', 'alpha');
$withtab = \GETPOSTINT('withtab');
/*
 * Actions
 */
// TODO
/*
 *	View
 */
$form = new \Form($db);
$block_static = new \BlockedLog($db);
$title = $langs->trans("ModuleSetup") . ' ' . $langs->trans('BlockedLog');
$help_url = "EN:Module_Unalterable_Archives_-_Logs|FR:Module_Archives_-_Logs_Inaltérable";
$linkback = '';
$morehtmlcenter = '';
$registrationnumber = \getHashUniqueIdOfRegistration();
$texttop = '<small class="opacitymedium">' . $langs->trans("RegistrationNumber") . ':</small> <small>' . \dol_trunc($registrationnumber, 10) . '</small>';