<?php

$usemargins = 0;
// add html5 elements
$domData = ' data-element="' . $line->element . '"';
$sign = 1;
$coldisplay = 0;
$parameters = ['line' => $line, 'i' => &$i, 'coldisplay' => &$coldisplay];
$reshook = $hookmanager->executeHooks('objectLineView_BeforeProduct', $parameters, $object, $action);
$txt = '';
$parameters = ['line' => $line, 'i' => &$i, 'coldisplay' => &$coldisplay];
$reshook = $hookmanager->executeHooks('objectLineView_ProductSupplier', $parameters, $object, $action);
// Set the text for tooltip.
// The value of maount must be shown with price(..., 0, '', 0, 0) so value will be visible exactly like it is into database.
$tooltiponprice = '';
$tooltiponpricemultiprice = '';
$tooltiponpriceend = '';
$tooltiponpriceendmultiprice = '';
$tooltiponprice = '<span class="classfortooltip" title="' . \dol_escape_htmltag($tooltiponprice) . '">';
$tooltiponpricemultiprice = '<span class="classfortooltip" title="' . \dol_escape_htmltag($tooltiponpricemultiprice) . '">';
$tooltiponpriceend = '</span>';
$tooltiponpriceendmultiprice = '</span>';
$positiverates = '';
$upinctax = isset($line->subprice_ttc) ? $line->subprice_ttc : \null;
$multicurrency_upinctax = isset($line->multicurrency_subprice_ttc) ? $line->multicurrency_subprice_ttc : \null;
$colspanOptions = '';
// TODO Replace this with $permissiontoedit ?
$objectRights = $this->getRights();
$tmppermtoedit = $objectRights->creer;
$situationinvoicelinewithparent = 0;