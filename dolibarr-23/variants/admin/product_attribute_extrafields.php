<?php

$extrafields = new \ExtraFields($db);
$form = new \Form($db);
// List of supported format
$tmptype2label = \ExtraFields::$type2label;
$type2label = array('');
$action = \GETPOST('action', 'aZ09');
$attrname = \GETPOST('attrname', 'alpha');
$elementtype = 'product_attribute';
/*
 * View
 */
$title = $langs->trans("ProductAttributeExtrafieldsSetup");
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \adminProductAttributePrepareHead();