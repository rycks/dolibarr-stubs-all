<?php

// Security check
$result = \restrictedArea($user, 'import');
// Map icons, array duplicated in export.php, was not synchronized, TODO put it somewhere only once
$entitytoicon = array('invoice' => 'bill', 'invoice_line' => 'bill', 'order' => 'order', 'order_line' => 'order', 'propal' => 'propal', 'propal_line' => 'propal', 'intervention' => 'intervention', 'inter_line' => 'intervention', 'member' => 'user', 'member_type' => 'group', 'subscription' => 'payment', 'payment' => 'payment', 'tax' => 'bill', 'tax_type' => 'generic', 'other' => 'generic', 'account' => 'account', 'product' => 'product', 'virtualproduct' => 'product', 'subproduct' => 'product', 'product_supplier_ref' => 'product', 'stock' => 'stock', 'warehouse' => 'stock', 'batch' => 'stock', 'stockbatch' => 'stock', 'category' => 'category', 'shipment' => 'sending', 'shipment_line' => 'sending', 'project' => 'project', 'task' => 'tasks', 'reception' => 'sending', 'reception_line' => 'sending', 'expensereport' => 'trip', 'expensereport_line' => 'trip', 'holiday' => 'holiday', 'contract_line' => 'contract', 'translation' => 'generic', 'bomm' => 'bom', 'bomline' => 'bom');
// Translation code, array duplicated in export.php, was not synchronized, TODO put it somewhere only once
$entitytolang = array('user' => 'User', 'company' => 'Company', 'contact' => 'Contact', 'invoice' => 'Bill', 'invoice_line' => 'InvoiceLine', 'order' => 'Order', 'order_line' => 'OrderLine', 'propal' => 'Proposal', 'propal_line' => 'ProposalLine', 'intervention' => 'Intervention', 'inter_line' => 'InterLine', 'member' => 'Member', 'member_type' => 'MemberType', 'subscription' => 'Subscription', 'tax' => 'SocialContribution', 'tax_type' => 'DictionarySocialContributions', 'account' => 'BankTransactions', 'payment' => 'Payment', 'product' => 'Product', 'virtualproduct' => 'AssociatedProducts', 'subproduct' => 'SubProduct', 'product_supplier_ref' => 'SupplierPrices', 'service' => 'Service', 'stock' => 'Stock', 'movement' => 'StockMovement', 'batch' => 'Batch', 'stockbatch' => 'StockDetailPerBatch', 'warehouse' => 'Warehouse', 'category' => 'Category', 'other' => 'Other', 'trip' => 'TripsAndExpenses', 'shipment' => 'Shipments', 'shipment_line' => 'ShipmentLine', 'project' => 'Projects', 'projecttask' => 'Tasks', 'task_time' => 'TaskTimeSpent', 'action' => 'Event', 'expensereport' => 'ExpenseReport', 'expensereport_line' => 'ExpenseReportLine', 'holiday' => 'TitreRequestCP', 'contract' => 'Contract', 'contract_line' => 'ContractLine', 'translation' => 'Translation', 'bom' => 'BOM', 'bomline' => 'BOMLine');
$datatoimport = \GETPOST('datatoimport');
$format = \GETPOST('format');
$filetoimport = \GETPOST('filetoimport');
$action = \GETPOST('action', 'alpha');
$confirm = \GETPOST('confirm', 'alpha');
$step = \GETPOST('step') ? \GETPOST('step') : 1;
$import_name = \GETPOST('import_name');
$hexa = \GETPOST('hexa');
$importmodelid = \GETPOSTINT('importmodelid');
$excludefirstline = \GETPOST('excludefirstline') ? \GETPOST('excludefirstline') : 2;
$endatlinenb = \GETPOST('endatlinenb') ? \GETPOST('endatlinenb') : '';
$updatekeys = \GETPOST('updatekeys', 'array') ? \GETPOST('updatekeys', 'array') : array();
$separator = \GETPOST('separator', 'nohtml') ? \GETPOST('separator', 'nohtml', 3) : '';
$enclosure = \GETPOST('enclosure', 'nohtml') ? \GETPOST('enclosure', 'nohtml') : '"';
// We must use 'nohtml' and not 'alphanohtml' because we must accept "
$charset = \GETPOST('charset', 'aZ09');
$separator_used = \str_replace('\\t', "\t", $separator);
$relativepath = '';
$objimport = new \Import($db);
$objmodelimport = new \ModeleImports();
$form = new \Form($db);
$htmlother = new \FormOther($db);
$formfile = new \FormFile($db);
$serialized_array_match_file_to_database = '';
$array_match_file_to_database = array();
// Load model from $importmodelid and set $array_match_file_to_database
// and $_SESSION["dol_array_match_file_to_database"]
$result = $objimport->fetch($importmodelid);
/*
 * View
 */
$help_url = 'EN:Module_Imports_En|FR:Module_Imports|ES:M&oacute;dulo_Importaciones';
// Clean saved file-database matching
$serialized_array_match_file_to_database = '';
$array_match_file_to_database = array();
$param = '';
$head = \import_prepare_head($param, 1);
// Define $nbmodulesnotautoenabled - TODO This code is at different places
$nbmodulesnotautoenabled = \count($conf->modules);
$listofmodulesautoenabled = array('user', 'agenda', 'fckeditor', 'export', 'import');
$param = '&datatoimport=' . \urlencode($datatoimport);
$head = \import_prepare_head($param, 2);
$titleofmodule = $objimport->array_import_module[0]['module']->getName();
$entity = \preg_replace('/:.*$/', '', $objimport->array_import_icon[0]);
$entityicon = \strtolower(!empty($entitytoicon[$entity]) ? $entitytoicon[$entity] : $entity);
$s = $langs->trans("ChooseFormatOfFileToImport", '{s1}');
$s = \str_replace('{s1}', \img_picto('', 'next'), $s);
$filetoimport = '';
$list = $objmodelimport->listOfAvailableImportFormat($db);
$param = '&datatoimport=' . \urlencode($datatoimport) . '&format=' . \urlencode($format);
$list = $objmodelimport->listOfAvailableImportFormat($db);
$head = \import_prepare_head($param, 3);
$titleofmodule = $objimport->array_import_module[0]['module']->getName();
$entity = \preg_replace('/:.*$/', '', $objimport->array_import_icon[0]);
$entityicon = \strtolower(!empty($entitytoicon[$entity]) ? $entitytoicon[$entity] : $entity);
$text = $objmodelimport->getDriverDescForKey($format);
$filename = $langs->transnoentitiesnoconv("ExampleOfImportFile") . '_' . $datatoimport . '.' . $format;
$s = $langs->trans("ChooseFileToImport", '{s1}');
$s = \str_replace('{s1}', \img_picto('', 'next'), $s);
$filetoimport = '';
$maxfilesizearray = \getMaxFileSizeArray();
$maxmin = $maxfilesizearray['maxmin'];
$out = !\getDolGlobalString('MAIN_UPLOAD_DOC') ? ' disabled' : '';
$out = '';
// Search available imports
$filearray = \dol_dir_list($conf->import->dir_temp, 'files', 0, '', '', 'name', \SORT_DESC);
//var_dump($_SESSION["dol_array_match_file_to_database_select"]);
$serialized_array_match_file_to_database = isset($_SESSION["dol_array_match_file_to_database_select"]) ? $_SESSION["dol_array_match_file_to_database_select"] : '';
$fieldsarray = \explode(',', $serialized_array_match_file_to_database);
$array_match_file_to_database = array();
//var_dump($serialized_array_match_file_to_database);
//var_dump($fieldsarray);
//var_dump($array_match_file_to_database);
$model = $format;
$list = $objmodelimport->listOfAvailableImportFormat($db);
// The value to use
$separator_used = \str_replace('\\t', "\t", $separator);
// Create class to use for import
$dir = \DOL_DOCUMENT_ROOT . "/core/modules/import/";
$file = "import_" . $model . ".modules.php";
$classname = "Import" . \ucfirst($model);
$obj = new $classname($db, $datatoimport);
// Load the source fields from input file into variable $arrayrecord
$fieldssource = array();
/** @var array<string,string> $fieldssource */
$result = $obj->import_open_file($conf->import->dir_temp . '/' . $filetoimport);
// Load targets fields in database
$fieldstarget = $objimport->array_import_fields[0];
$minpos = \min(\count($fieldssource), \count($fieldstarget));
//var_dump($array_match_file_to_database);
$initialloadofstep4 = \false;
$array_match_database_to_file = \array_flip($array_match_file_to_database);
//var_dump($array_match_database_to_file);
//var_dump($_SESSION["dol_array_match_file_to_database_select"]);
$fieldstarget_tmp = array();
$arraykeysfieldtarget = \array_keys($fieldstarget);
$position = 0;
$fieldstarget = $fieldstarget_tmp;
//print $serialized_array_match_file_to_database;
//print $_SESSION["dol_array_match_file_to_database"];
//print $_SESSION["dol_array_match_file_to_database_select"];
//var_dump($array_match_file_to_database);exit;
// Now $array_match_file_to_database contains  fieldnb(1,2,3...)=>fielddatabase(key in $array_match_file_to_database)
$param = '&format=' . $format . '&datatoimport=' . \urlencode($datatoimport) . '&filetoimport=' . \urlencode($filetoimport);
$head = \import_prepare_head($param, 4);
$titleofmodule = $objimport->array_import_module[0]['module']->getName();
$entity = \preg_replace('/:.*$/', '', $objimport->array_import_icon[0]);
$entityicon = \strtolower(!empty($entitytoicon[$entity]) ? $entitytoicon[$entity] : $entity);
$text = $objmodelimport->getDriverDescForKey($format);
$modulepart = 'import';
$relativepath = \GETPOST('filetoimport');
$s = $langs->trans("SelectImportFieldsSource", '{s1}');
$s = \str_replace('{s1}', \img_picto('', 'grip_title', '', 0, 0, 0, '', '', 0), $s);
$fieldsplaced = array();
$valforsourcefieldnb = array();
$listofkeys = array();
// List of source fields
$lefti = 1;
// Set the list of all possible target fields in Dolibarr.
$optionsall = array();
// $optionsall is an array of all possible target fields. key=>array('label'=>..., 'xxx')
$height = '32px';
//needs px for css height attribute below
$i = 0;
$mandatoryfieldshavesource = \true;
//var_dump($fieldstarget);
//var_dump($optionsall);
//exit;
//var_dump($_SESSION['dol_array_match_file_to_database']);
//var_dump($_SESSION['dol_array_match_file_to_database_select']);
//exit;
//var_dump($optionsall);
//var_dump($fieldssource);
//var_dump($fieldstarget);
$modetoautofillmapping = 'session';
$max_execution_time_for_importexport = \getDolGlobalInt('IMPORT_MAX_EXECUTION_TIME', 300);
// 5mn if not defined
$max_time = @\ini_get("max_execution_time");
$model = $format;
$list = $objmodelimport->listOfAvailableImportFormat($db);
// Create class to use for import
$dir = \DOL_DOCUMENT_ROOT . "/core/modules/import/";
$file = "import_" . $model . ".modules.php";
$classname = "Import" . \ucfirst($model);
$obj = new $classname($db, $datatoimport);
// Load source fields in input file
$fieldssource = array();
$result = $obj->import_open_file($conf->import->dir_temp . '/' . $filetoimport);
$nboflines = $obj->import_get_nb_of_lines($conf->import->dir_temp . '/' . $filetoimport);
$param = '&leftmenu=import&format=' . \urlencode($format) . '&datatoimport=' . \urlencode($datatoimport) . '&filetoimport=' . \urlencode($filetoimport) . '&nboflines=' . (int) $nboflines . '&separator=' . \urlencode($separator) . '&enclosure=' . \urlencode($enclosure);
$param2 = $param;
$head = \import_prepare_head($param, 5);
$titleofmodule = $objimport->array_import_module[0]['module']->getName();
$entity = \preg_replace('/:.*$/', '', $objimport->array_import_icon[0]);
$entityicon = \strtolower(!empty($entitytoicon[$entity]) ? $entitytoicon[$entity] : $entity);
$text = $objmodelimport->getDriverDescForKey($format);
$modulepart = 'import';
$relativepath = \GETPOST('filetoimport');
$listtables = array();
$sort_array_match_file_to_database = $array_match_file_to_database;
$listfields = array();
$i = 0;
//print 'fieldsource='.$fieldssource;
$sort_array_match_file_to_database = $array_match_file_to_database;
$max_execution_time_for_importexport = \getDolGlobalInt('IMPORT_MAX_EXECUTION_TIME', 300);
// 5mn if not defined
$max_time = @\ini_get("max_execution_time");
$model = $format;
$list = $objmodelimport->listOfAvailableImportFormat($db);
$importid = \GETPOST("importid", 'alphanohtml');
// Create class to use for import
$dir = \DOL_DOCUMENT_ROOT . "/core/modules/import/";
$file = "import_" . $model . ".modules.php";
$classname = "Import" . \ucfirst($model);
$obj = new $classname($db, $datatoimport);
// Load source fields in input file
$fieldssource = array();
$result = $obj->import_open_file($conf->import->dir_temp . '/' . $filetoimport);
$nboflines = \GETPOSTISSET("nboflines") ? \GETPOSTINT("nboflines") : \dol_count_nb_of_line($conf->import->dir_temp . '/' . $filetoimport);
$param = '&format=' . $format . '&datatoimport=' . \urlencode($datatoimport) . '&filetoimport=' . \urlencode($filetoimport) . '&nboflines=' . (int) $nboflines;
$head = \import_prepare_head($param, 6);
$titleofmodule = $objimport->array_import_module[0]['module']->getName();
$entity = \preg_replace('/:.*$/', '', $objimport->array_import_icon[0]);
$entityicon = \strtolower(!empty($entitytoicon[$entity]) ? $entitytoicon[$entity] : $entity);
$text = $objmodelimport->getDriverDescForKey($format);
$modulepart = 'import';
$relativepath = \GETPOST('filetoimport');
$listtables = array();
$listfields = array();
$i = 0;
$sort_array_match_file_to_database = $array_match_file_to_database;
// Launch import
$arrayoferrors = array();
$arrayofwarnings = array();
$maxnboferrors = !\getDolGlobalString('IMPORT_MAX_NB_OF_ERRORS') ? 50 : $conf->global->IMPORT_MAX_NB_OF_ERRORS;
$maxnbofwarnings = !\getDolGlobalString('IMPORT_MAX_NB_OF_WARNINGS') ? 50 : $conf->global->IMPORT_MAX_NB_OF_WARNINGS;
$nboferrors = 0;
$nbofwarnings = 0;
$importid = \dol_print_date(\dol_now(), '%Y%m%d%H%M%S');
// Open input file
$nbok = 0;
$pathfile = $conf->import->dir_temp . '/' . $filetoimport;
$result = $obj->import_open_file($pathfile);
/**
 * Function to put the movable box of a source field
 *
 * @param	array<int|string,array{label?:string,example1?:string,required?:bool,imported?:bool|int<0,1>,position?:int}>		$fieldssource	List of source fields
 * @param	int		$pos			Pos
 * @param	string	$key			Key
 * @return	void
 */
function show_elem($fieldssource, $pos, $key)
{
}
/**
 * Return not used field number
 *
 * @param 	array<int,mixed|mixed[]>	$fieldssource	Array of field source
 * @param	array<int,mixed|mixed[]>	$listofkey		Array of keys
 * @return	int
 */
function getnewkey(&$fieldssource, &$listofkey)
{
}
/**
 * Return array with element inserted in it at position $position
 *
 * @param	array<int|string,array{label?:string,example1?:string,required?:bool,imported?:bool|int<0,1>,position?:int}>		$array			Array of field source
 * @param	int		$position		key of position to insert to
 * @param	array{label?:string,example1?:string,required?:bool,imported?:bool|int<0,1>,position?:int}		$insertArray	Array to insert
 * @return	array<int|string,array{label?:string,example1?:string,required?:bool,imported?:bool|int<0,1>,position?:int}>
 */
function arrayInsert($array, $position, $insertArray)
{
}