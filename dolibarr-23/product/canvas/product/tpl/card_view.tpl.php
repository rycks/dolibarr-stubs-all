<?php

$object = $GLOBALS['object'];
$head = \product_prepare_head($object);
$titre = $langs->trans("CardProduct" . $object->type);
$linkback = '<a href="' . \DOL_URL_ROOT . '/product/list.php?restore_lastsearch_values=1&type=' . $object->type . '">' . $langs->trans("BackToList") . '</a>';
$shownav = 1;