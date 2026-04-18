<?php

$objclassname = \get_class($object);
$isInvoice = \in_array($object->element, array('facture', 'invoice', 'facture_fourn', 'invoice_supplier'));
$isNewObject = empty($object->id) && empty($object->rowid);
// Relative and absolute discounts
$addrelativediscount = '<a class="editfielda" href="' . \DOL_URL_ROOT . '/comm/remise.php?id=' . (int) $thirdparty->id . '&backtopage=' . \urlencode($backtopage) . '&action=create&token=' . \newToken() . (!empty($discount_type) ? '&discount_type=1' : '') . '">' . \img_edit($langs->trans("EditRelativeDiscount")) . '</a>';
$addabsolutediscount = '<a class="editfielda" href="' . \DOL_URL_ROOT . '/comm/remx.php?id=' . (int) $thirdparty->id . '&backtopage=' . \urlencode($backtopage) . '&action=create&token=' . \newToken() . '">' . \img_edit($langs->trans("EditGlobalDiscounts")) . '</a>';
$viewabsolutediscount = '<a class="editfielda" href="' . \DOL_URL_ROOT . '/comm/remx.php?id=' . (int) $thirdparty->id . '&backtopage=' . \urlencode($backtopage) . '">' . $langs->trans("ViewAvailableGlobalDiscounts") . '</a>';
$fixedDiscount = $thirdparty->remise_percent;