<?php

$action = \GETPOST('action', 'alpha');
$massaction = \GETPOST('massaction', 'alpha');
$show_files = \GETPOSTINT('show_files');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel', 'alpha');
$toselect = \GETPOST('toselect', 'array:int');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'supplierinvoicestemplatelist';
// To manage different context of search
$optioncss = \GETPOST('optioncss', 'aZ');
// Option for the css output (always '' except when 'print')
$mode = \GETPOST('mode', 'aZ');
// The output mode ('list', 'kanban', 'hierarchy', 'calendar', ...)
$socid = \GETPOSTINT('socid');
$id = \GETPOSTINT('facid') ? \GETPOSTINT('facid') : \GETPOSTINT('id');
$lineid = \GETPOSTINT('lineid');
$ref = \GETPOST('ref', 'alpha');
$objecttype = 'facture_fourn_rec';
$search_ref = \GETPOST('search_ref');
$search_societe = \GETPOST('search_societe');
$search_montant_ht = \GETPOST('search_montant_ht');
$search_montant_vat = \GETPOST('search_montant_vat');
$search_montant_ttc = \GETPOST('search_montant_ttc');
$search_payment_mode = \GETPOST('search_payment_mode');
$search_payment_term = \GETPOST('search_payment_term', 'int');
$search_date_startday = \GETPOSTINT('search_date_startday');
$search_date_startmonth = \GETPOSTINT('search_date_startmonth');
$search_date_startyear = \GETPOSTINT('search_date_startyear');
$search_date_endday = \GETPOSTINT('search_date_endday');
$search_date_endmonth = \GETPOSTINT('search_date_endmonth');
$search_date_endyear = \GETPOSTINT('search_date_endyear');
$search_date_start = \dol_mktime(0, 0, 0, $search_date_startmonth, $search_date_startday, $search_date_startyear);
// Use tzserver
$search_date_end = \dol_mktime(23, 59, 59, $search_date_endmonth, $search_date_endday, $search_date_endyear);
$search_date_when_startday = \GETPOSTINT('search_date_when_startday');
$search_date_when_startmonth = \GETPOSTINT('search_date_when_startmonth');
$search_date_when_startyear = \GETPOSTINT('search_date_when_startyear');
$search_date_when_endday = \GETPOSTINT('search_date_when_endday');
$search_date_when_endmonth = \GETPOSTINT('search_date_when_endmonth');
$search_date_when_endyear = \GETPOSTINT('search_date_when_endyear');
$search_date_when_start = \dol_mktime(0, 0, 0, $search_date_when_startmonth, $search_date_when_startday, $search_date_when_startyear);
// Use tzserver
$search_date_when_end = \dol_mktime(23, 59, 59, $search_date_when_endmonth, $search_date_when_endday, $search_date_when_endyear);
$search_recurring = \GETPOST('search_recurring', 'intcomma');
$search_frequency = \GETPOST('search_frequency', 'alpha');
$search_unit_frequency = \GETPOST('search_unit_frequency', 'alpha');
$search_nb_gen_done = \GETPOST('search_nb_gen_done', 'alpha');
$search_status = \GETPOST('search_status', 'intcomma');
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
// Initialize a technical objects
$object = new \FactureFournisseurRec($db);
$extrafields = new \ExtraFields($db);
$ret = $object->fetch($id, $ref);
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
$arrayfields = array('f.titre' => array('label' => 'Ref', 'checked' => '1'), 's.nom' => array('label' => 'ThirdParty', 'checked' => '1'), 'f.total_ht' => array('label' => 'AmountHT', 'checked' => '1'), 'f.total_tva' => array('label' => 'AmountVAT', 'checked' => '1'), 'f.total_ttc' => array('label' => 'AmountTTC', 'checked' => '1'), 'f.fk_mode_reglement' => array('label' => 'PaymentMode', 'checked' => '0'), 'f.fk_cond_reglement' => array('label' => 'PaymentTerm', 'checked' => '0'), 'recurring' => array('label' => 'RecurringInvoice', 'checked' => '1'), 'f.frequency' => array('label' => 'Frequency', 'checked' => '1'), 'f.unit_frequency' => array('label' => 'FrequencyUnit', 'checked' => '1'), 'f.nb_gen_done' => array('label' => 'NbOfGenerationDoneShort', 'checked' => '1'), 'f.date_last_gen' => array('label' => 'DateLastGenerationShort', 'checked' => '1'), 'f.date_when' => array('label' => 'NextDateToExecutionShort', 'checked' => '1'), 'f.fk_user_author' => array('label' => 'UserCreation', 'checked' => '0', 'position' => 500), 'f.fk_user_modif' => array('label' => 'UserModification', 'checked' => '0', 'position' => 505), 'f.datec' => array('label' => 'DateCreation', 'checked' => '0', 'position' => 520), 'f.tms' => array('label' => 'DateModificationShort', 'checked' => '0', 'position' => 525), 'status' => array('label' => 'Status', 'checked' => '1', 'position' => 1000));
$arrayfields = \dol_sort_array($arrayfields, 'position');
$tmpthirdparty = new \Societe($db);
$res = $tmpthirdparty->fetch($socid);
$objecttype = 'facture_fourn_rec';
$permissionnote = $user->hasRight('facture', 'creer');
// Used by the include of actions_setnotes.inc.php
$permissiondellink = $user->hasRight('facture', 'creer');
// Used by the include of actions_dellink.inc.php
$permissiontoedit = $user->hasRight('facture', 'creer');
// Used by the include of actions_lineupdonw.inc.php
// Security check
$result = \restrictedArea($user, 'supplier_invoicerec', $object->id, $objecttype);
$parameters = array('socid' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 *	View
 */
$form = new \Form($db);
$formother = new \FormOther($db);
$companystatic = new \Societe($db);
$supplierinvoicerectmp = new \FactureFournisseurRec($db);
$tmpuser = new \User($db);
$now = \dol_now();
$help_url = '';
$title = $langs->trans("RepeatableSupplierInvoices");
$morejs = array();
$morecss = array();
$tmparray = \dol_getdate($now);
$today = \dol_mktime(23, 59, 59, $tmparray['mon'], $tmparray['mday'], $tmparray['year']);
// Today is last second of current day
// Build and execute select
// --------------------------------------------------------------------
$sql = "SELECT s.nom as name, s.rowid as socid, f.rowid as facid, f.titre as title, f.total_ht, f.total_tva, f.total_ttc, f.frequency, f.unit_frequency,";
// Add fields from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSelect', $parameters, $object);
$sql = \preg_replace('/,\\s*$/', '', $sql);
$sqlfields = $sql;
// Add table from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListFrom', $parameters, $object);
// Count total nb of records
$nbtotalofrecords = '';
/* The fast and low memory method to get and count full list converts the sql into a sql count */
$sqlforcount = \preg_replace('/^' . \preg_quote($sqlfields, '/') . '/', 'SELECT COUNT(*) as nbtotalofrecords', $sql);
$sqlforcount = \preg_replace('/GROUP BY .*$/', '', $sqlforcount);
$resql = $db->query($sqlforcount);
$tmpsortfield = $sortfield;
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$arrayofselected = \is_array($toselect) ? $toselect : array();
$param = '';
// Add $param from hooks
$parameters = array('param' => &$param);
$reshook = $hookmanager->executeHooks('printFieldListSearchParam', $parameters, $object);
// List of mass actions available
$arrayofmassactions = array();
$massactionbutton = $form->selectMassAction('', $massaction == 'presend' ? array() : array('presend' => $langs->trans("SendByMail"), 'builddoc' => $langs->trans("PDFMerge")));
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$htmlofselectarray = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage, \getDolGlobalString('MAIN_CHECKBOX_LEFT_COLUMN'));
// This also change content of $arrayfields with user setup
$selectedfields = $mode != 'kanban' ? $htmlofselectarray : '';
$i = 0;
$moreforfilter = '';
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldPreListTitle', $parameters, $object, $action);
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$selectedfields = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage, \getDolGlobalString('MAIN_CHECKBOX_LEFT_COLUMN'));
// Fields from hook
$parameters = array('arrayfields' => $arrayfields);
$reshook = $hookmanager->executeHooks('printFieldListOption', $parameters, $object);
$totalarray = array();
$i = 0;
$savnbfield = $totalarray['nbfield'];
$totalarray = array();
$imaxinloop = $limit ? \min($num, $limit) : $num;
$parameters = array('arrayfields' => $arrayfields, 'sql' => $sql);
$reshook = $hookmanager->executeHooks('printFieldListFooter', $parameters, $object, $action);