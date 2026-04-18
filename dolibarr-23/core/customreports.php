<?php

// Initialise values
$search_groupby = array();
$tabfamily = \null;
$objecttype = \null;
// Get parameters
$action = \GETPOST('action', 'aZ09') ? \GETPOST('action', 'aZ09') : 'view';
// The action 'add', 'create', 'edit', 'update', 'view', ...
$massaction = \GETPOST('massaction', 'alpha');
// The bulk action (combo box choice into lists)
$mode = \GETPOST('mode', 'alpha');
$objecttype = (string) \GETPOST('objecttype', 'aZ09arobase');
$tabfamily = \GETPOST('tabfamily', 'aZ09');
$search_measures = \GETPOST('search_measures', 'array:alphanohtml');
$search_yaxis = \GETPOST('search_yaxis', 'array:alphanohtml');
$search_graph = (string) \GETPOST('search_graph', 'restricthtml');
$search_measures = \array_map(function ($value) {
    return \preg_replace('/[^a-z0-9\\._\\-]+/', '', $value);
}, $search_measures);
$search_xaxis = \array_map(function ($value) {
    return \preg_replace('/[^a-z0-9\\._\\-]+/', '', $value);
}, $search_xaxis);
$search_yaxis = \array_map(function ($value) {
    return \preg_replace('/[^a-z0-9\\._\\-]+/', '', $value);
}, $search_yaxis);
$search_groupby = \array_map(function ($value) {
    return \preg_replace('/[^a-z0-9\\._\\-]+/', '', $value);
}, $search_groupby);
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1 or if we click on clear filters or if we select empty mass action
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$object = \null;
$extrafields = new \ExtraFields($db);
// Note that conf->hooks_modules contains array
$title = '';
$picto = '';
$errormessage = \null;
$keyforlabeloffield = \null;
$head = array();
$ObjectClassName = '';
// Objects available by default
$arrayoftype = array('thirdparty' => array('label' => 'ThirdParties', 'picto' => 'company', 'ObjectClassName' => 'Societe', 'enabled' => \isModEnabled('societe'), 'ClassPath' => "/societe/class/societe.class.php", 'langs' => 'companies'), 'contact' => array('label' => 'Contacts', 'picto' => 'contact', 'ObjectClassName' => 'Contact', 'enabled' => \isModEnabled('societe'), 'ClassPath' => "/contact/class/contact.class.php"), 'proposal' => array('label' => 'Proposals', 'picto' => 'proposal', 'ObjectClassName' => 'Propal', 'enabled' => \isModEnabled('propal'), 'ClassPath' => "/comm/propal/class/propal.class.php", 'langs' => 'propal'), 'proposaldet' => array('label' => 'ProposalLines', 'picto' => 'proposal', 'ObjectClassName' => 'PropaleLigne', 'enabled' => \isModEnabled('propal'), 'ClassPath' => "/comm/propal/class/propaleligne.class.php", 'langs' => 'propal'), 'order' => array('label' => 'Orders', 'picto' => 'order', 'ObjectClassName' => 'Commande', 'enabled' => \isModEnabled('order'), 'ClassPath' => "/commande/class/commande.class.php", 'langs' => 'orders'), 'orderdet' => array('label' => 'SaleOrderLines', 'picto' => 'order', 'ObjectClassName' => 'OrderLine', 'enabled' => \isModEnabled('order'), 'ClassPath' => "/commande/class/orderline.class.php", 'langs' => 'orders'), 'invoice' => array('label' => 'Invoices', 'picto' => 'bill', 'ObjectClassName' => 'Facture', 'enabled' => \isModEnabled('invoice'), 'ClassPath' => "/compta/facture/class/facture.class.php", 'langs' => 'bills'), 'invoice_template' => array('label' => 'PredefinedInvoices', 'picto' => 'bill', 'ObjectClassName' => 'FactureRec', 'enabled' => \isModEnabled('invoice'), 'ClassPath' => "/compta/facture/class/facture-rec.class.php", 'langs' => 'bills'), 'contract' => array('label' => 'Contracts', 'picto' => 'contract', 'ObjectClassName' => 'Contrat', 'enabled' => \isModEnabled('contract'), 'ClassPath' => "/contrat/class/contrat.class.php", 'langs' => 'contracts'), 'contractdet' => array('label' => 'ContractLines', 'picto' => 'contract', 'ObjectClassName' => 'ContratLigne', 'enabled' => \isModEnabled('contract'), 'ClassPath' => "/contrat/class/contrat.class.php", 'langs' => 'contracts'), 'bom' => array('label' => 'BOM', 'picto' => 'bom', 'ObjectClassName' => 'Bom', 'enabled' => \isModEnabled('bom')), 'mrp' => array('label' => 'MO', 'picto' => 'mrp', 'ObjectClassName' => 'Mo', 'enabled' => \isModEnabled('mrp'), 'ClassPath' => "/mrp/class/mo.class.php"), 'ticket' => array('label' => 'Ticket', 'picto' => 'ticket', 'ObjectClassName' => 'Ticket', 'enabled' => \isModEnabled('ticket')), 'member' => array('langs' => 'members', 'label' => 'Adherent', 'picto' => 'member', 'ObjectClassName' => 'Adherent', 'enabled' => \isModEnabled('member'), 'ClassPath' => "/adherents/class/adherent.class.php"), 'cotisation' => array('langs' => 'members', 'label' => 'Subscriptions', 'picto' => 'member', 'ObjectClassName' => 'Subscription', 'enabled' => \isModEnabled('member'), 'ClassPath' => "/adherents/class/subscription.class.php"));
// Complete $arrayoftype by external modules
$parameters = array('objecttype' => $objecttype, 'tabfamily' => $tabfamily);
// @phan-suppress-next-line PhanTypeMismatchArgumentNullable
$reshook = $hookmanager->executeHooks('loadDataForCustomReports', $parameters, $object, $action);
// Security check
$socid = 0;
$search_component_params = array('');
$search_component_params_hidden = \trim(\GETPOST('search_component_params_hidden', 'alphanohtml'));
$search_component_params_input = \trim(\GETPOST('search_component_params_input', 'alphanohtml'));
//var_dump($search_component_params_hidden);
//var_dump($search_component_params_input);
// If string is not an universal filter string, we try to convert it into universal filter syntax string
$errorstr = '';
$arrayofandtagshidden = \dolForgeExplodeAnd($search_component_params_hidden);
$arrayofandtagsinput = \dolForgeExplodeAnd($search_component_params_input);
$search_component_params_hidden = \implode(' AND ', \array_merge($arrayofandtagshidden, $arrayofandtagsinput));
//var_dump($search_component_params_hidden);
$MAXUNIQUEVALFORGROUP = 20;
$MAXMEASURESINBARGRAPH = 20;
$SHOWLEGEND = isset($SHOWLEGEND) ? $SHOWLEGEND : 1;
$YYYY = \substr($langs->trans("Year"), 0, 1) . \substr($langs->trans("Year"), 0, 1) . \substr($langs->trans("Year"), 0, 1) . \substr($langs->trans("Year"), 0, 1);
$MM = \substr($langs->trans("Month"), 0, 1) . \substr($langs->trans("Month"), 0, 1);
$DD = \substr($langs->trans("Day"), 0, 1) . \substr($langs->trans("Day"), 0, 1);
$HH = \substr($langs->trans("Hour"), 0, 1) . \substr($langs->trans("Hour"), 0, 1);
$MI = \substr($langs->trans("Minute"), 0, 1) . \substr($langs->trans("Minute"), 0, 1);
$SS = \substr($langs->trans("Second"), 0, 1) . \substr($langs->trans("Second"), 0, 1);
$arrayoffilterfields = array();
$arrayofmesures = array();
$arrayofxaxis = array();
$arrayofgroupby = array();
$arrayofyaxis = array();
$arrayofvaluesforgroupby = array();
/*
 * Actions
 */
// None
/*
 * View
 */
$form = new \Form($db);
$formother = new \FormOther($db);
// Define $newarrayoftype that is array of object available for report
$newarrayoftype = array();
$count = 0;
$label = '';
$arrayoffilterfields = \fillArrayOfFilterFields($object, 't', $label, $arrayoffilterfields, 0, $count);
$arrayoffilterfields = \dol_sort_array($arrayoffilterfields, 'position', 'asc', 0, 0, 1);
$count = 0;
$arrayofmesures = \fillArrayOfMeasures($object, 't', $label, $arrayofmesures, 0, $count);
$arrayofmesures = \dol_sort_array($arrayofmesures, 'position', 'asc', 0, 0, 1);
$count = 0;
$arrayofxaxis = \fillArrayOfXAxis($object, 't', $label, $arrayofxaxis, 0, $count);
$arrayofxaxis = \dol_sort_array($arrayofxaxis, 'position', 'asc', 0, 0, 1);
$count = 0;
$arrayofgroupby = \fillArrayOfGroupBy($object, 't', $label, $arrayofgroupby, 0, $count);
$arrayofgroupby = \dol_sort_array($arrayofgroupby, 'position', 'asc', 0, 0, 1);
//var_dump($arrayofvaluesforgroupby);exit;
//$tmparray = dol_getdate(dol_now());
//$endyear = $tmparray['year'];
//$endmonth = $tmparray['mon'];
//$datelastday = dol_get_last_day($endyear, $endmonth, 1);
//$startyear = $endyear - 2;
$param = '';
$viewmode = '';
$arrayofgraphs = array('bars' => 'Bars', 'lines' => 'Lines');
$num = 0;
$massactionbutton = '';
$nav = '';
$newcardbutton = '';
$limit = 0;
// Generate the SQL request
$sql = '';
$errormessage = '';
$fieldid = 'rowid';
$sql = "SELECT ";
$sql = \preg_replace('/,\\s*$/', '', $sql);
// Init the list of tables added. We include by default always the main table.
$listoftablesalreadyadded = array($object->table_element => $object->table_element);
// Add the where here
$sqlfilters = $search_component_params_hidden;
$sql = \preg_replace('/,\\s*$/', '', $sql);
$sql = \preg_replace('/,\\s*$/', '', $sql);
$legend = array();
$useagroupby = \count($search_groupby);
//var_dump($useagroupby);
//var_dump($arrayofvaluesforgroupby);
// Execute the SQL request
$totalnbofrecord = 0;
$data = array();
$resql = $db->query($sql);
$WIDTH = '80%';
$HEIGHT = empty($_SESSION['dol_screenheight']) ? 400 : $_SESSION['dol_screenheight'] - 500;
// Show graph
$px1 = new \DolGraph();
$mesg = $px1->isGraphKo();