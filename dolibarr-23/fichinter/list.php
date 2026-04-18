<?php

$action = \GETPOST('action', 'aZ09');
$massaction = \GETPOST('massaction', 'alpha');
$show_files = \GETPOSTINT('show_files');
$confirm = \GETPOST('confirm', 'alpha');
$toselect = \GETPOST('toselect', 'array:int');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'interventionlist';
$mode = \GETPOST('mode', 'alpha');
$search_ref = \GETPOST('search_ref') ? \GETPOST('search_ref', 'alpha') : \GETPOST('search_inter', 'alpha');
$search_ref_client = \GETPOST('search_ref_client', 'alpha');
$search_company = \GETPOST('search_company', 'alpha');
$search_desc = \GETPOST('search_desc', 'alpha');
$search_projet_ref = \GETPOST('search_projet_ref', 'alpha');
$search_contrat_ref = \GETPOST('search_contrat_ref', 'alpha');
$search_status = \GETPOST('search_status', 'alpha');
$search_signed_status = \GETPOST('search_signed_status', 'alpha');
$search_all = \trim(\GETPOST('search_all', 'alphanohtml'));
$search_date_startday = \GETPOSTINT('search_date_startday');
$search_date_startmonth = \GETPOSTINT('search_date_startmonth');
$search_date_startyear = \GETPOSTINT('search_date_startyear');
$search_date_endday = \GETPOSTINT('search_date_endday');
$search_date_endmonth = \GETPOSTINT('search_date_endmonth');
$search_date_endyear = \GETPOSTINT('search_date_endyear');
$search_date_start = \dol_mktime(0, 0, 0, $search_date_startmonth, $search_date_startday, $search_date_startyear);
// Use tzserver
$search_date_end = \dol_mktime(23, 59, 59, $search_date_endmonth, $search_date_endday, $search_date_endyear);
$optioncss = \GETPOST('optioncss', 'alpha');
$socid = \GETPOSTINT('socid');
$diroutputmassaction = $conf->ficheinter->dir_output . '/temp/massgeneration/' . $user->id;
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
// Initialize a technical object to manage hooks of page. Note that conf->hooks_modules contains an array of hook context
$object = new \Fichinter($db);
// Note that conf->hooks_modules contains array of activated contexes
$extrafields = new \ExtraFields($db);
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// List of fields to search into when doing a "search in all"
$fieldstosearchall = array('f.ref' => 'Ref', 's.nom' => "ThirdParty", 'f.description' => 'Description', 'f.note_public' => 'NotePublic', 'fd.description' => 'DescriptionOfLine');
// Definition of fields for list
$arrayfields = array('f.ref' => array('label' => 'Ref', 'checked' => '1'), 'f.ref_client' => array('label' => 'RefCustomer', 'checked' => '1'), 's.nom' => array('label' => 'ThirdParty', 'checked' => '1'), 'pr.ref' => array('label' => 'Project', 'checked' => '1', 'enabled' => !\isModEnabled('project') ? '0' : '1'), 'c.ref' => array('label' => 'Contract', 'checked' => '1', 'enabled' => empty($conf->contrat->enabled) ? '0' : '1'), 'f.description' => array('label' => 'Description', 'checked' => '1'), 'f.datec' => array('label' => 'DateCreation', 'checked' => '0', 'position' => 500), 'f.tms' => array('label' => 'DateModificationShort', 'checked' => '0', 'position' => 500), 'f.note_public' => array('label' => 'NotePublic', 'checked' => '0', 'position' => 510, 'enabled' => (string) (!\getDolGlobalInt('MAIN_LIST_HIDE_PUBLIC_NOTES'))), 'f.note_private' => array('label' => 'NotePrivate', 'checked' => '0', 'position' => 511, 'enabled' => (string) (!\getDolGlobalInt('MAIN_LIST_HIDE_PRIVATE_NOTES'))), 'f.fk_statut' => array('label' => 'Status', 'checked' => '1', 'position' => 1000), 'f.signed_status' => array('label' => 'SignedStatus', 'checked' => '0', 'position' => 1001), 'fd.description' => array('label' => "DescriptionOfLine", 'checked' => '1', 'enabled' => \getDolGlobalString('FICHINTER_DISABLE_DETAILS') != '1' ? '1' : '0'), 'fd.date' => array('label' => 'DateOfLine', 'checked' => '1', 'enabled' => \getDolGlobalString('FICHINTER_DISABLE_DETAILS') != '1' ? '1' : '0'), 'fd.duree' => array('label' => 'DurationOfLine', 'type' => 'duration', 'checked' => '1', 'enabled' => !\getDolGlobalString('FICHINTER_DISABLE_DETAILS') ? '1' : '0'));
$arrayfields = \dol_sort_array($arrayfields, 'position');
// Security check
$id = \GETPOSTINT('id');
$result = \restrictedArea($user, 'ficheinter', $id, 'fichinter');
$permissiontoreadallthirdparty = $user->hasRight('societe', 'client', 'voir');
$permissiontoread = $user->hasRight('ficheinter', 'lire');
$permissiontoadd = $user->hasRight('ficheinter', 'creer');
$permissiontodelete = $user->hasRight('ficheinter', 'supprimer');
$parameters = array('socid' => $socid, 'arrayfields' => &$arrayfields);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
// Mass actions
$objectclass = 'Fichinter';
$objectlabel = 'Interventions';
$uploaddir = $conf->ficheinter->dir_output;
/*
 *	View
 */
$form = new \Form($db);
$formfile = new \FormFile($db);
$objectstatic = new \Fichinter($db);
$companystatic = new \Societe($db);
$projetstatic = \null;
$contratstatic = \null;
$now = \dol_now();
$title = $langs->trans("Interventions");
$help_url = '';
$morejs = array();
$morecss = array();
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$selectedfields = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage);
// This also change content of $arrayfields
$atleastonefieldinlines = 0;
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
// Add GroupBy from hooks
$parameters = array('search_all' => $search_all, 'fieldstosearchall' => $fieldstosearchall);
$reshook = $hookmanager->executeHooks('printFieldListGroupBy', $parameters, $object);
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
$soc = new \Societe($db);
$param = '';
// Add $param from hooks
$parameters = array('param' => &$param);
$reshook = $hookmanager->executeHooks('printFieldListSearchParam', $parameters, $object, $action);
// List of mass actions available
$arrayofmassactions = array('generate_doc' => \img_picto('', 'pdf', 'class="pictofixedwidth"') . $langs->trans("ReGeneratePDF"), 'builddoc' => \img_picto('', 'pdf', 'class="pictofixedwidth"') . $langs->trans("PDFMerge"));
$massactionbutton = $form->selectMassAction('', $arrayofmassactions);
$newcardbutton = '';
$url = \DOL_URL_ROOT . '/fichinter/card.php?action=create';
$newcardbutton = '';
$topicmail = "Information";
$modelmail = "intervention";
$objecttmp = new \Fichinter($db);
$trackid = 'int' . $object->id;
$moreforfilter = '';
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldPreListTitle', $parameters, $object, $action);
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$htmlofselectarray = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage, \getDolGlobalString('MAIN_CHECKBOX_LEFT_COLUMN'));
// This also change content of $arrayfields with user setup
$selectedfields = $mode != 'kanban' ? $htmlofselectarray : '';
// Fields from hook
$parameters = array('arrayfields' => $arrayfields);
$reshook = $hookmanager->executeHooks('printFieldListOption', $parameters, $object, $action);
$liststatus = [$object::STATUS_DRAFT => $langs->transnoentitiesnoconv('Draft'), $object::STATUS_VALIDATED => $langs->transnoentitiesnoconv('Validated'), $object::STATUS_BILLED => $langs->transnoentitiesnoconv('StatusInterInvoiced'), $object::STATUS_CLOSED => $langs->transnoentitiesnoconv('Done')];
$totalarray = array();
// Hook fields
$parameters = array('arrayfields' => $arrayfields, 'param' => $param, 'sortfield' => $sortfield, 'sortorder' => $sortorder, 'totalarray' => &$totalarray);
$reshook = $hookmanager->executeHooks('printFieldListTitle', $parameters, $object, $action);
// Loop on record
// --------------------------------------------------------------------
$i = 0;
$savnbfield = $totalarray['nbfield'];
$totalarray = array();
$total = 0;
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