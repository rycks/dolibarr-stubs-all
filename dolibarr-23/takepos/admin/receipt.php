<?php

/*
 * Actions
 */
$error = 0;
$res = \dolibarr_set_const($db, "TAKEPOS_HEADER", \GETPOST('TAKEPOS_HEADER', 'restricthtml'), 'chaine', 0, '', $conf->entity);
$res = \dolibarr_set_const($db, "TAKEPOS_FOOTER", \GETPOST('TAKEPOS_FOOTER', 'restricthtml'), 'chaine', 0, '', $conf->entity);
$res = \dolibarr_set_const($db, "TAKEPOS_RECEIPT_NAME", \GETPOST('TAKEPOS_RECEIPT_NAME', 'alpha'), 'chaine', 0, '', $conf->entity);
$res = \dolibarr_set_const($db, "TAKEPOS_PRINT_SERVER", \GETPOST('TAKEPOS_PRINT_SERVER', 'alpha'), 'chaine', 0, '', $conf->entity);
$res = \dolibarr_set_const($db, 'TAKEPOS_PRINT_WITHOUT_DETAILS_LABEL_DEFAULT', \GETPOST('TAKEPOS_PRINT_WITHOUT_DETAILS_LABEL_DEFAULT', 'alphanohtml'), 'chaine', 0, '', $conf->entity);
/*
 * View
 */
$form = new \Form($db);
$linkback = '<a href="' . \DOL_URL_ROOT . '/admin/system/database.php?restore_lastsearch_values=1">' . \img_picto($langs->trans("GoBack"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("GoBack") . '</span></a>';
$head = \takepos_admin_prepare_head();
$substitutionarray = \pdf_getSubstitutionArray($langs, array('ticket', 'member', 'candidate'), \null, 2, array('company', 'user', 'object', 'system'));
$htmltext = '<i class="small">' . $langs->trans("AvailableVariables") . ':<br>';
$variablename = 'TAKEPOS_HEADER';
$variablename = 'TAKEPOS_FOOTER';