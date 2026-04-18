<?php

// Everybody should be able to go on this page
//if (! $user->admin)
//  accessforbidden();
// Map icons, array duplicated in import.php, was not synchronized, TODO put it somewhere only once
$entitytoicon = array('invoice' => 'bill', 'invoice_line' => 'bill', 'order' => 'order', 'order_line' => 'order', 'propal' => 'propal', 'propal_line' => 'propal', 'intervention' => 'intervention', 'inter_line' => 'intervention', 'member' => 'user', 'member_type' => 'group', 'subscription' => 'payment', 'payment' => 'payment', 'tax' => 'generic', 'tax_type' => 'generic', 'other' => 'generic', 'account' => 'account', 'product' => 'product', 'virtualproduct' => 'product', 'subproduct' => 'product', 'product_supplier_ref' => 'product', 'stock' => 'stock', 'warehouse' => 'stock', 'batch' => 'stock', 'stockbatch' => 'stock', 'category' => 'category', 'securityevent' => 'generic', 'shipment' => 'sending', 'shipment_line' => 'sending', 'reception' => 'sending', 'reception_line' => 'sending', 'expensereport' => 'trip', 'expensereport_line' => 'trip', 'holiday' => 'holiday', 'contract_line' => 'contract', 'translation' => 'generic', 'bomm' => 'bom', 'bomline' => 'bom', 'conferenceorboothattendee' => 'contact', 'inventory_line' => 'inventory', 'mrp_line' => 'mrp', 'task_time' => 'clock');
// Translation code, array duplicated in import.php, was not synchronized, TODO put it somewhere only once
$entitytolang = array('user' => 'User', 'company' => 'Company', 'contact' => 'Contact', 'invoice' => 'Bill', 'invoice_line' => 'InvoiceLine', 'order' => 'Order', 'order_line' => 'OrderLine', 'propal' => 'Proposal', 'propal_line' => 'ProposalLine', 'intervention' => 'Intervention', 'inter_line' => 'InterLine', 'member' => 'Member', 'member_type' => 'MemberType', 'subscription' => 'Subscription', 'tax' => 'SocialContribution', 'tax_type' => 'DictionarySocialContributions', 'account' => 'BankTransactions', 'payment' => 'Payment', 'product' => 'Product', 'virtualproduct' => 'AssociatedProducts', 'subproduct' => 'SubProduct', 'product_supplier_ref' => 'SupplierPrices', 'service' => 'Service', 'stock' => 'Stock', 'movement' => 'StockMovement', 'batch' => 'Batch', 'stockbatch' => 'StockDetailPerBatch', 'warehouse' => 'Warehouse', 'category' => 'Category', 'other' => 'Other', 'trip' => 'TripsAndExpenses', 'securityevent' => 'SecurityEvent', 'shipment' => 'Shipments', 'shipment_line' => 'ShipmentLine', 'project' => 'Projects', 'projecttask' => 'Tasks', 'resource' => 'Resource', 'task_time' => 'TaskTimeSpent', 'action' => 'Event', 'expensereport' => 'ExpenseReport', 'expensereport_line' => 'ExpenseReportLine', 'holiday' => 'TitreRequestCP', 'contract' => 'Contract', 'contract_line' => 'ContractLine', 'translation' => 'Translation', 'bom' => 'BOM', 'bomline' => 'BOMLine', 'mrp' => 'ManufacturingOrder', 'mrp_line' => 'ManufacturingOrderLine', 'conferenceorbooth' => 'ConferenceOrBooth', 'conferenceorboothattendee' => 'Attendee', 'inventory' => 'Inventory', 'inventory_line' => 'InventoryLine');
$array_selected = isset($_SESSION["export_selected_fields"]) ? $_SESSION["export_selected_fields"] : array();
$array_filtervalue = isset($_SESSION["export_filtered_fields"]) ? $_SESSION["export_filtered_fields"] : array();
$datatoexport = \GETPOST("datatoexport", "aZ09");
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$step = \GETPOSTINT("step") ? \GETPOSTINT("step") : 1;
$export_name = \GETPOST("export_name", "alphanohtml");
$hexa = \GETPOST("hexa", "alpha");
$exportmodelid = \GETPOSTINT("exportmodelid");
$field = (string) \GETPOST("field", "alpha");
$objexport = new \Export($db);
$objmodelexport = new \ModeleExports($db);
$form = new \Form($db);
$htmlother = new \FormOther($db);
$formfile = new \FormFile($db);
$sqlusedforexport = '';
$head = array();
$upload_dir = $conf->export->dir_temp . '/' . $user->id;
$usefilters = 1;
// Security check
$result = \restrictedArea($user, 'export');
// Selection of field at step 2
$fieldsarray = $objexport->array_export_fields[0];
$fieldsentitiesarray = $objexport->array_export_entities[0];
$fieldsdependenciesarray = $objexport->array_export_dependencies[0];
$newpos = -1;
$pos = $array_selected[\GETPOST("field")];
// Lookup code to switch with
$newcode = "";
$separator = \GETPOST('delimiter', 'alpha');
$max_execution_time_for_importexport = \getDolGlobalInt('EXPORT_MAX_EXECUTION_TIME', 300);
// 5mn if not defined
$max_time = @\ini_get("max_execution_time");
// Build export file
$result = $objexport->build_file($user, \GETPOST('model', 'alpha'), $datatoexport, $array_selected, $array_filtervalue, '', $separator);
$file = $upload_dir . "/" . \GETPOST('file');
$ret = \dol_delete_file($file);
$array_selected = array();
$array_filtervalue = array();
$result = $objexport->fetch($exportmodelid);
$h = 0;
$hselected = (string) $h;
// Define $nbmodulesnotautoenabled - TODO This code is at different places
$nbmodulesnotautoenabled = \count($conf->modules);
$listofmodulesautoenabled = array('user', 'agenda', 'fckeditor', 'export', 'import');
$h = 0;
$hselected = (string) $h;
$entity = \preg_replace('/:.*$/', '', $objexport->array_export_icon[0]);
$entityicon = \strtolower(!empty($entitytoicon[$entity]) ? $entitytoicon[$entity] : $entity);
$morecss = '';
$moretitle = '';
// Champs exportables
$fieldsarray = $objexport->array_export_fields[0];
// Select request if all fields are selected
$sqlmaxforexport = $objexport->build_sql(0, array(), array());
//    $this->array_export_module[0]=$module;
//    $this->array_export_code[0]=$module->export_code[$r];
//    $this->array_export_label[0]=$module->export_label[$r];
//    $this->array_export_sql[0]=$module->export_sql[$r];
//    $this->array_export_fields[0]=$module->export_fields_array[$r];
//    $this->array_export_entities[0]=$module->export_fields_entities[$r];
//    $this->array_export_alias[0]=$module->export_fields_alias[$r];
$i = 0;
$h = 0;
$hselected = (string) $h;
$entity = \preg_replace('/:.*$/', '', $objexport->array_export_icon[0]);
$entityicon = \strtolower(!empty($entitytoicon[$entity]) ? $entitytoicon[$entity] : $entity);
$list = '';
// Champs exportables
$fieldsarray = $objexport->array_export_fields[0];
// Champs filtrable
$Typefieldsarray = $objexport->array_export_TypeFields[0];
// valeur des filtres
$ValueFiltersarray = !empty($objexport->array_export_FilterValue[0]) ? $objexport->array_export_FilterValue[0] : '';
// Select request if all fields are selected
$sqlmaxforexport = $objexport->build_sql(0, array(), array());
$i = 0;
$stepoffset = 0;
$h = 0;
$hselected = (string) $h;
$entity = \preg_replace('/:.*$/', '', $objexport->array_export_icon[0]);
$entityicon = \strtolower(!empty($entitytoicon[$entity]) ? $entitytoicon[$entity] : $entity);
$list = '';
// Select request if all fields are selected
$sqlmaxforexport = $objexport->build_sql(0, array(), array());
$h = 0;
$stepoffset = 0;
$hselected = (string) $h;
$entity = \preg_replace('/:.*$/', '', $objexport->array_export_icon[0]);
$entityicon = \strtolower(!empty($entitytoicon[$entity]) ? $entitytoicon[$entity] : $entity);
$list = '';
// List of available export formats
$htmltabloflibs = '<!-- Table with available export formats --><br>';
$liste = $objmodelexport->listOfAvailableExportFormat($db);
$listeall = $liste;
// don't know why but apache hangs with php 5.3.10-1ubuntu3.12 and apache 2.2.2 if i remove this exit or replace with return
/**
 * 	Return table name of an alias. For this, we look for the "tablename as alias" in sql string.
 *
 * 	@param	string	$code				Alias.Fieldname
 * 	@param	string	$sqlmaxforexport	SQL request to parse
 * 	@return	string						Table name of field
 */
function getablenamefromfield($code, $sqlmaxforexport)
{
}