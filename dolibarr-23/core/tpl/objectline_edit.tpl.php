<?php

$usemargins = 0;
// Define colspan for the button 'Add'
$colspan = 3;
$coldisplay = 0;
$situationinvoicelinewithparent = 0;
$nbrows = \ROWS_2;
$enable = \getDolGlobalInt('FCKEDITOR_ENABLE_DETAILS');
$toolbarname = 'dolibarr_details';
$doleditor = new \DolEditor('product_desc', \GETPOSTISSET('product_desc') ? \GETPOST('product_desc', 'restricthtml') : $line->description, '', \getDolGlobalInt('MAIN_DOLEDITOR_HEIGHT', 164), $toolbarname, '', \false, \true, $enable, $nbrows, '98%');
$temps = $line->showOptionals($extrafields, 'edit', array('class' => 'tredited'), '', '', '1', 'line');
$type_tva = \null;
$upinctax = isset($line->pu_ttc) ? $line->pu_ttc : \null;
$multicurrency_upinctax = $line->multicurrency_subprice_ttc ? $line->multicurrency_subprice_ttc : \null;
$unit_type = \false;
$prefillDates = \false;
$date_start_prefill = 0;
$date_end_prefill = 0;
$hourmin = \getDolGlobalInt('MAIN_USE_HOURMIN_IN_DATE_RANGE');