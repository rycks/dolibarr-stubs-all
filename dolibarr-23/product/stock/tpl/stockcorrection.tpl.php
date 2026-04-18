<?php

$productref = '';
$pdluoid = \GETPOSTINT('pdluoid');
$pdluo = new \Productbatch($db);
$result = $pdluo->fetch($pdluoid);
$sellByCss = '';
$eatByCss = '';
// A date is mandatory when we record the lot the first time. Then once lot and date is recorded
// a user should be able to manage the lot only (this is main goal of lot)
/*
if ($object->sell_or_eat_by_mandatory == Product::SELL_OR_EAT_BY_MANDATORY_ID_SELL_BY) {
	$sellByCss = 'fieldrequired';
} elseif ($object->sell_or_eat_by_mandatory == Product::SELL_OR_EAT_BY_MANDATORY_ID_EAT_BY) {
	$eatByCss = 'fieldrequired';
} elseif ($object->sell_or_eat_by_mandatory == Product::SELL_OR_EAT_BY_MANDATORY_ID_SELL_AND_EAT) {
	$sellByCss = 'fieldrequired';
	$eatByCss = 'fieldrequired';
}
*/
$disableSellBy = \getDolGlobalInt('PRODUCT_DISABLE_SELLBY');
$disableEatBy = \getDolGlobalInt('PRODUCT_DISABLE_EATBY');
$ident = \GETPOST("dwid") ? \GETPOSTINT("dwid") : (\GETPOST('id_entrepot') ? \GETPOSTINT('id_entrepot') : ($object->element == 'product' && $object->fk_default_warehouse ? $object->fk_default_warehouse : 'ifone'));
// Label for movement of id of inventory
$valformovementlabel = \GETPOST("label") && \GETPOST('label') != $langs->trans("MovementCorrectStock", '') ? \GETPOST("label") : $langs->trans("MovementCorrectStock", $productref);