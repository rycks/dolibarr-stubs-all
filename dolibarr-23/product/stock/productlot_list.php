<?php

// Get parameters
$action = \GETPOST('action', 'aZ09');
$massaction = \GETPOST('massaction', 'alpha');
$backtopage = \GETPOST('backtopage', 'alpha');
$toselect = \GETPOST('toselect', 'array:int');
// Array of ids of elements selected into a list
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'productlotlist';
// To manage different context of search
$optioncss = \GETPOST('optioncss', 'alpha');
$mode = \GETPOST('mode', 'alpha');
$id = \GETPOSTINT('id');
$search_entity = \GETPOSTINT('search_entity');
$search_product = \GETPOST('search_product', 'alpha');
$search_batch = \GETPOST('search_batch', 'alpha');
$search_fk_user_creat = \GETPOSTINT('search_fk_user_creat');
$search_fk_user_modif = \GETPOSTINT('search_fk_user_modif');
$search_import_key = \GETPOSTINT('search_import_key');
$show_files = \GETPOSTINT('show_files');
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
// Initialize a technical object to manage hooks. Note that conf->hooks_modules contains array
$object = new \Productlot($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->productbatch->dir_output . '/temp/massgeneration/' . $user->id;
//$extrafields->fetch_name_optionals_label($object->table_element_line);
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// Initialize array of search criteria
$search_all = \trim(\GETPOST('search_all', 'alphanohtml'));
$search = array();
// List of fields to search into when doing a "search in all"
$fieldstosearchall = array();
// Definition of array of fields for columns
$tableprefix = 't';
$arrayfields = array();
$arrayfields = \dol_sort_array($arrayfields, 'position');
$usercanread = $user->hasRight('produit', 'lire');
$usercancreate = $user->hasRight('produit', 'creer');
$usercandelete = $user->hasRight('produit', 'supprimer');
$upload_dir = $conf->productbatch->multidir_output[$conf->entity];
$permissiontoread = $usercanread;
$permissiontoadd = $usercancreate;
$socid = 0;
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
// Mass actions
$objectclass = 'ProductLot';
$objectlabel = 'LotSerial';
$uploaddir = $conf->productbatch->dir_output;
/*
 * View
 */
$form = new \Form($db);
$now = \dol_now();
$help_url = 'EN:Module_Lot_/_Serial|FR:Module_Lot_/_Série';
$title = $langs->trans('LotSerialList');
$morejs = array();
$morecss = array();
// Build and execute select
// --------------------------------------------------------------------
$sql = 'SELECT ';
// Add fields from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSelect', $parameters, $object);
$sql = \preg_replace('/,\\s*$/', '', $sql);
$sqlfields = $sql;
// Add table from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListFrom', $parameters, $object);
// Add where from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters, $object);
/* If a group by is required
$sql.= " GROUP BY ";
foreach($object->fields as $key => $val) {
	$sql .= "t.".$db->escape($key).", ";
}
// Add fields from extrafields
if (!empty($extrafields->attributes[$object->table_element]['label'])) {
	foreach ($extrafields->attributes[$object->table_element]['label'] as $key => $val) {
		$sql .= ($extrafields->attributes[$object->table_element]['type'][$key] != 'separate' ? "ef.".$key.', ' : '');
	}
}
// Add where from hooks
$parameters=array();
$reshook=$hookmanager->executeHooks('printFieldListGroupBy', $parameters, $object);    // Note that $action and $object may have been modified by hook
$sql.=$hookmanager->resPrint;
$sql=preg_replace('/,\s*$/','', $sql);
*/
// Count total nb of records
$nbtotalofrecords = '';
/* This old and fast method to get and count full list returns all record so use a high amount of memory.
	 $resql = $db->query($sql);
	 $nbtotalofrecords = $db->num_rows($resql);
	 */
/* The slow method does not consume memory on mysql (not tested on pgsql) */
/*$resql = $db->query($sql, 0, 'auto', 1);
	while ($db->fetch_object($resql)) {
		if (empty($nbtotalofrecords)) {
			$nbtotalofrecords = 1;    // We can't make +1 because init value is ''
		 } else {
			 $nbtotalofrecords++;
		 }
	}*/
/* The fast and low memory method to get and count full list converts the sql into a sql count */
$sqlforcount = \preg_replace('/^' . \preg_quote($sqlfields, '/') . '/', 'SELECT COUNT(*) as nbtotalofrecords', $sql);
$sqlforcount = \preg_replace('/GROUP BY .*$/', '', $sqlforcount);
$resql = $db->query($sqlforcount);
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$i = 0;
$arrayofselected = \is_array($toselect) ? $toselect : array();
$param = '';
// Add $param from hooks
$parameters = array('param' => &$param);
$reshook = $hookmanager->executeHooks('printFieldListSearchParam', $parameters, $object);
// List of mass actions available
$arrayofmassactions = array();
$massactionbutton = $form->selectMassAction('', $arrayofmassactions);
$newcardbutton = '';
// Add code for pre mass action (confirmation or email presend form)
$topicmail = "Information";
$modelmail = "productlot";
$objecttmp = new \Productlot($db);
$trackid = 'lot' . $object->id;
// Filter on categories
$moreforfilter = '';
/*$moreforfilter.='<div class="divsearchfield">';
 $moreforfilter.= $langs->trans('MyFilter') . ': <input type="text" name="search_myfield" value="'.dol_escape_htmltag($search_myfield).'">';
 $moreforfilter.= '</div>';*/
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldPreListTitle', $parameters, $object, $action);
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$selectedfields = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage, \getDolGlobalString('MAIN_CHECKBOX_LEFT_COLUMN'));
// Fields from hook
$parameters = array('arrayfields' => $arrayfields);
$reshook = $hookmanager->executeHooks('printFieldListOption', $parameters, $object);
$totalarray = array();
// Hook fields
$parameters = array('arrayfields' => $arrayfields, 'param' => $param, 'sortfield' => $sortfield, 'sortorder' => $sortorder, 'totalarray' => &$totalarray);
$reshook = $hookmanager->executeHooks('printFieldListTitle', $parameters, $object);
// Detect if we need a fetch on each output line
$needToFetchEachLine = 0;
// Loop on record
// --------------------------------------------------------------------
$i = 0;
$savnbfield = $totalarray['nbfield'];
$imaxinloop = $limit ? \min($num, $limit) : $num;
$parameters = array('arrayfields' => $arrayfields, 'sql' => $sql);
$reshook = $hookmanager->executeHooks('printFieldListFooter', $parameters, $object, $action);
$hidegeneratedfilelistifempty = 1;
$formfile = new \FormFile($db);
// Show list of available documents
$urlsource = $_SERVER['PHP_SELF'] . '?sortfield=' . $sortfield . '&sortorder=' . $sortorder;
$filedir = $diroutputmassaction;
$genallowed = $permissiontoread;
$delallowed = $permissiontoadd;