<?php

$action = \GETPOST('action', 'aZ09');
/*
 * Action
 */
$reg = array();
$code = $reg[1];
$code = $reg[1];
$error = 0;
/*
 * View
 */
$form = new \Form($db);
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \marges_admin_prepare_head();
// GLOBAL DISCOUNT MANAGEMENT
$methods = array(1 => $langs->trans('UseDiscountAsProduct'), 2 => $langs->trans('UseDiscountAsService'), 3 => $langs->trans('UseDiscountOnTotal'));
$formcompany = new \FormCompany($db);
$facture = new \Facture($db);