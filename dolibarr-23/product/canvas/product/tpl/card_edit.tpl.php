<?php

$object = $GLOBALS['object'];
/** @var Product $object */
$statutarray = array('1' => $langs->trans("OnSell"), '0' => $langs->trans("NotOnSell"));
$head = \product_prepare_head($object);
$titre = $langs->trans("CardProduct" . $object->type);