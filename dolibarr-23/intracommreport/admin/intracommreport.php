<?php

// Get Parameters
$action = \GETPOST('action', 'aZ09');
// Parameters INTRACOMMREPORT_* and others
$list_DEB = array('INTRACOMMREPORT_NUM_AGREMENT');
$list_DES = array('INTRACOMMREPORT_NUM_DECLARATION');
$error = 0;
/*
 * View
 */
$form = new \Form($db);
$formother = new \FormOther($db);
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \intracommreportAdminPrepareHead();
$arraychoices = array('' => $langs->trans("None"), 'PSI' => 'Déclarant pour son compte', 'TDP' => 'Tiers déclarant');
$arraychoices = array('' => $langs->trans("None"), 'sender' => 'Emetteur', 'PSI' => 'Déclarant');
$arraychoices = array(1 => 'Seuil de 460 000 €', 2 => 'En dessous de 460 000 €');
$arraychoices = array(3 => 'Seuil de 460 000 €', 4 => 'En dessous de 460 000 €');