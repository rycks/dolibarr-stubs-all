<?php

$id = \GETPOSTINT('id');
$action = \GETPOST('action', 'aZ09');
$save = \GETPOST('save', 'alpha');
$cancel = \GETPOST('cancel', 'alpha');
$selection = \GETPOSTINT('selection');
//Objects
$price_globals = new \PriceGlobalVariable($db);
$res = $price_globals->fetch($selection);
$price_updaters = new \PriceGlobalVariableUpdater($db);
$res = $price_updaters->fetch($selection);
/*
 * View
 */
$form = new \Form($db);
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$arrayglobalvars = $price_globals->listGlobalVariables();
$arraypriceupdaters = $price_updaters->listUpdaters();