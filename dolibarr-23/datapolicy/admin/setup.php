<?php

// Parameters
$action = \GETPOST('action', 'aZ09');
$backtopage = \GETPOST('backtopage', 'alpha');
// Get the array $arrayofparameters from _getDataPolicies
$arrayofparameters = array();
$dataPolicyCron = new \DataPolicyCron($db);
$arrayofelem = $dataPolicyCron->getDataPolicies();
$arrayofparameters = array();
// Dropdown options for delay selection
$valTab = array('' => $langs->trans('Never'), '6' => $langs->trans('NB_MONTHS', 6), '12' => $langs->trans('ONE_YEAR'), '24' => $langs->trans('NB_YEARS', 2), '36' => $langs->trans('NB_YEARS', 3), '48' => $langs->trans('NB_YEARS', 4), '60' => $langs->trans('NB_YEARS', 5), '120' => $langs->trans('NB_YEARS', 10), '180' => $langs->trans('NB_YEARS', 15), '240' => $langs->trans('NB_YEARS', 20));
$nbdone = 0;
$error = 0;
$action = 'edit';
/*
 * View
 */
$page_name = "datapolicySetup";
$linkback = '<a href="' . ($backtopage ? $backtopage : \DOL_URL_ROOT . '/admin/modules.php?restore_lastsearch_values=1') . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \datapolicyAdminPrepareHead();