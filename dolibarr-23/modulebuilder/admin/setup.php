<?php

$action = \GETPOST('action', 'aZ09');
$backtopage = \GETPOST('backtopage', 'alpha');
$head = [];
$res1 = \dolibarr_set_const($db, 'MODULEBUILDER_SPECIFIC_README', \GETPOST('MODULEBUILDER_SPECIFIC_README', 'restricthtml'), 'chaine', 0, '', $conf->entity);
$res2 = \dolibarr_set_const($db, 'MODULEBUILDER_ASCIIDOCTOR', \GETPOST('MODULEBUILDER_ASCIIDOCTOR', 'alphanohtml'), 'chaine', 0, '', $conf->entity);
$res3 = \dolibarr_set_const($db, 'MODULEBUILDER_ASCIIDOCTORPDF', \GETPOST('MODULEBUILDER_ASCIIDOCTORPDF', 'alphanohtml'), 'chaine', 0, '', $conf->entity);
$res4 = \dolibarr_set_const($db, 'MODULEBUILDER_SPECIFIC_EDITOR_NAME', \GETPOST('MODULEBUILDER_SPECIFIC_EDITOR_NAME', 'alphanohtml'), 'chaine', 0, '', $conf->entity);
$res5 = \dolibarr_set_const($db, 'MODULEBUILDER_SPECIFIC_EDITOR_URL', \GETPOST('MODULEBUILDER_SPECIFIC_EDITOR_URL', 'alphanohtml'), 'chaine', 0, '', $conf->entity);
$res6 = \dolibarr_set_const($db, 'MODULEBUILDER_SPECIFIC_FAMILY', \GETPOST('MODULEBUILDER_SPECIFIC_FAMILY', 'alphanohtml'), 'chaine', 0, '', $conf->entity);
$res7 = \dolibarr_set_const($db, 'MODULEBUILDER_SPECIFIC_AUTHOR', \GETPOST('MODULEBUILDER_SPECIFIC_AUTHOR', 'restricthtml'), 'chaine', 0, '', $conf->entity);
$res8 = \dolibarr_set_const($db, 'MODULEBUILDER_SPECIFIC_VERSION', \GETPOST('MODULEBUILDER_SPECIFIC_VERSION', 'alphanohtml'), 'chaine', 0, '', $conf->entity);
$reg = array();
$code = $reg[1];
$values = \GETPOST($code);
$code = $reg[1];
/*
 * 	View
 */
$form = new \Form($db);
$help_url = '';
$linkback = '<a href="' . ($backtopage ? $backtopage : \DOL_URL_ROOT . '/admin/modules.php?restore_lastsearch_values=1') . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';