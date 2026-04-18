<?php

$action = \GETPOST('action', 'alphanohtml');
$error = 0;
$value = \GETPOST('PRODUIT_ATTRIBUTES_HIDECHILD');
$title = $langs->trans('ModuleSetup') . ' ' . $langs->trans('Module610Name');
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \adminProductAttributePrepareHead();
$separator = \getDolGlobalString('PRODUIT_ATTRIBUTES_SEPARATOR', '_');