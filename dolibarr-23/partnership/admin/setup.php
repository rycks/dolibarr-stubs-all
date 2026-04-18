<?php

$action = \GETPOST('action', 'aZ09');
$value = \GETPOST('value', 'alpha');
$error = 0;
/*
 * Actions
 */
$nomessageinsetmoduleoptions = 1;
$modulemenu = \GETPOST('PARTNERSHIP_IS_MANAGED_FOR', 'alpha') == 'member' ? 'member' : 'thirdparty';
$res = \dolibarr_set_const($db, "PARTNERSHIP_IS_MANAGED_FOR", $modulemenu, 'chaine', 0, '', $conf->entity);
$partnership = new \modPartnership($db);
/*
 * View
 */
$help_url = '';
$title = $langs->trans('PartnershipSetup');
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \partnershipAdminPrepareHead();
$form = new \Form($db);
// Module to manage partnership / services code
$dirpartnership = array('/core/modules/partnership/');
$dirmodels = \array_merge(array('/'), (array) $conf->modules_parts['models']);
$dnbdays = '30';
$backlinks = \getDolGlobalString('PARTNERSHIP_NBDAYS_AFTER_MEMBER_EXPIRATION_BEFORE_CANCEL') ? $conf->global->PARTNERSHIP_NBDAYS_AFTER_MEMBER_EXPIRATION_BEFORE_CANCEL : $dnbdays;
$backlinks = \getDolGlobalString('PARTNERSHIP_BACKLINKS_TO_CHECK');