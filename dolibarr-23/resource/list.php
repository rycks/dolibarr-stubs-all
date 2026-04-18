<?php

// Get parameters
$id = \GETPOSTINT('id');
$action = \GETPOST('action', 'alpha');
$massaction = \GETPOST('massaction', 'alpha');
// The bulk action (combo box choice into lists)
$confirm = \GETPOST('confirm', 'alpha');
$toselect = \GETPOST('toselect', 'array:int');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'interventionlist';
$lineid = \GETPOSTINT('lineid');
$element = \GETPOST('element', 'alpha');
$element_id = \GETPOSTINT('element_id');
$resource_id = \GETPOSTINT('resource_id');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$optioncss = \GETPOST('optioncss', 'alpha');
// Initialize context for list
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'resourcelist';
// Initialize a technical objects
$object = new \Dolresource($db);
$extrafields = new \ExtraFields($db);
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
$search_all = \trim(\GETPOST('search_all', 'alphanohtml'));
$search_ref = \GETPOST("search_ref", 'alpha');
$search_type = \GETPOST("search_type", 'alpha');
$search_address = \GETPOST("search_address", 'alpha');
$search_zip = \GETPOST("search_zip", 'alpha');
$search_town = \GETPOST("search_town", 'alpha');
$search_state = \GETPOST("search_state", 'alpha');
$search_country = \GETPOST("search_country", 'alpha');
$search_phone = \GETPOST("search_phone", 'alpha');
$search_email = \GETPOST("search_email", 'alpha');
$search_max_users = \GETPOST("search_max_users", 'alpha');
$search_url = \GETPOST("search_url", 'alpha');
$filter = array();
$search_all = \trim(\GETPOST('search_all', 'alphanohtml'));
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
// List of fields to search into when doing a "search in all"
$fieldstosearchall = array('t.ref' => 'Ref', 't.description' => 'Description');
$arrayfields = array('t.ref' => array('label' => $langs->trans("Ref"), 'checked' => '1', 'position' => 1), 'ty.label' => array('label' => $langs->trans("Type"), 'checked' => '1', 'position' => 2), 't.address' => array('label' => $langs->trans("Address"), 'checked' => '0', 'position' => 3), 't.zip' => array('label' => $langs->trans("Zip"), 'checked' => '0', 'position' => 4), 't.town' => array('label' => $langs->trans("Town"), 'checked' => '1', 'position' => 5), 'st.nom' => array('label' => $langs->trans("State"), 'checked' => '0', 'position' => 6), 'co.label' => array('label' => $langs->trans("Country"), 'checked' => '1', 'position' => 7), 't.phone' => array('label' => $langs->trans("Phone"), 'checked' => '0', 'position' => 8), 't.email' => array('label' => $langs->trans("Email"), 'checked' => '0', 'position' => 9), 't.max_users' => array('label' => $langs->trans("MaxUsersLabel"), 'checked' => '1', 'position' => 10), 't.url' => array('label' => $langs->trans("URL"), 'checked' => '0', 'position' => 11));
$arrayfields = \dol_sort_array($arrayfields, 'position');
$permissiontoread = $user->hasRight('resource', 'read');
$permissiontoadd = $user->hasRight('resource', 'write');
$permissiontodelete = $user->hasRight('resource', 'delete');
// Mass actions
$objectclass = 'Dolresource';
$objectlabel = 'Resources';
$uploaddir = $conf->resource->dir_output;
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$objectstatic = new \Dolresource($db);
$help_url = '';
$title = $langs->trans('Resources');
$morejs = array();
$morecss = array();
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$selectedfields = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage);
// This also change content of $arrayfields
$sql = "SELECT";
// Add fields from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSelect', $parameters, $object, $action);
$sqlfields = $sql;
// Add table from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListFrom', $parameters, $object, $action);
// Add where from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters, $object, $action);
// Count total nb of records
$nbtotalofrecords = '';
/* The fast and low memory method to get and count full list converts the sql into a sql count */
$sqlforcount = \preg_replace('/^' . \preg_quote($sqlfields, '/') . '/', 'SELECT COUNT(*) as nbtotalofrecords', $sql);
$sqlforcount = \preg_replace('/GROUP BY .*$/', '', $sqlforcount);
$resql = $db->query($sqlforcount);
$resql = $db->query($sql);
$num = $db->num_rows($resql);
// Can use also classforhorizontalscrolloftabs instead of bodyforlist for no horizontal scroll
$arrayofselected = \is_array($toselect) ? $toselect : array();
$param = '';
// List of mass actions available
$arrayofmassactions = array();
$massactionbutton = $form->selectMassAction('', $arrayofmassactions);
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$selectedfields = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage, \getDolGlobalString('MAIN_CHECKBOX_LEFT_COLUMN'));
$newcardbutton = '';
$url = \DOL_URL_ROOT . '/resource/card.php?action=create';
$newcardbutton = \dolGetButtonTitle($langs->trans('NewResource'), '', 'fa fa-plus-circle', $url, '', $permissiontoadd);
$objecttmp = new \Dolresource($db);
$trackid = 'int' . $object->id;
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$selectedfields = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage, \getDolGlobalString('MAIN_CHECKBOX_LEFT_COLUMN'));
$totalarray = array();
// Loop on record
$i = 0;
$savnbfield = $totalarray['nbfield'];
$totalarray = array();
$imaxinloop = $limit ? \min($num, $limit) : $num;
$parameters = array('arrayfields' => $arrayfields, 'sql' => $sql);
$reshook = $hookmanager->executeHooks('printFieldListFooter', $parameters, $object, $action);