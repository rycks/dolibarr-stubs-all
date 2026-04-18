<?php

// Get Parameters
$action = \GETPOST('action', 'aZ09');
$backtopage = \GETPOST('backtopage', 'alpha');
$withtab = \GETPOSTINT('withtab');
/*
 * Actions
 */
$reg = array();
$code = $reg[1];
$values = \GETPOST($code);
$code = $reg[1];
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
$sql = "SELECT rowid, code as code_iso, code_iso as code_iso3, label, favorite";
$countryArray = array();
$resql = $db->query($sql);
$selected = !\getDolGlobalString('BLOCKEDLOG_DISABLE_NOT_ALLOWED_FOR_COUNTRY') ? array() : \explode(',', \getDolGlobalString('BLOCKEDLOG_DISABLE_NOT_ALLOWED_FOR_COUNTRY'));
// Can module be disabled
$canbedisabled = $block_static->canBeDisabled();
$arrayoftrackedevents = $block_static->trackedevents;