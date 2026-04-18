<?php

$usemargins = 0;
// Define colspan for the button 'Add'
$colspan = 3;
//print $object->element;
// Lines for extrafield
$objectline = \null;
$nolinesbefore = \count($this->lines) == 0 || $forcetoshowtitlelines;
$coldisplay = 0;
$freelines = \false;
$freelines = \true;
$forceall = 1;
// Select type of free line
$labelforempty = 1;
$labelforradio = '';
//print ' ';
$filtertype = '';
$parentId = \GETPOSTINT('parentId');
$addproducton = \isModEnabled('product') && $user->hasRight('produit', 'creer');
$addserviceon = \isModEnabled('service') && $user->hasRight('service', 'creer');
$parameters = array('fk_parent_line' => \GETPOSTINT('fk_parent_line'));
$reshook = $hookmanager->executeHooks('formCreateProductOptions', $parameters, $object, $action);
$parameters = array('htmlname' => 'addproduct');
$reshook = $hookmanager->executeHooks('formCreateProductSupplierOptions', $parameters, $object, $action);
$nbrows = \ROWS_2;
$enabled = \getDolGlobalString('FCKEDITOR_ENABLE_DETAILS', '0');
$toolbarname = 'dolibarr_details';
$doleditor = new \DolEditor('dp_desc', \GETPOST('dp_desc', 'restricthtml'), '', \getDolGlobalInt('MAIN_DOLEDITOR_HEIGHT', 100), $toolbarname, '', \false, \true, $enabled, $nbrows, '98%');
$temps = $objectline->showOptionals($extrafields, 'create', array(), '', '', '1', 'line');
$type_tva = 0;
$default_qty = !\getDolGlobalString('MAIN_OBJECTLINE_CREATE_EMPTY_QTY_BY_DEFAULT') ? 1 : '';
$remise_percent = $buyer->remise_percent;
$date_start = \dol_mktime(\GETPOSTINT('date_starthour'), \GETPOSTINT('date_startmin'), 0, \GETPOSTINT('date_startmonth'), \GETPOSTINT('date_startday'), \GETPOSTINT('date_startyear'));
$date_end = \dol_mktime(\GETPOSTINT('date_starthour'), \GETPOSTINT('date_startmin'), 0, \GETPOSTINT('date_endmonth'), \GETPOSTINT('date_endday'), \GETPOSTINT('date_endyear'));
$prefillDates = \false;
$date_start_prefill = 0;
$date_end_prefill = 0;