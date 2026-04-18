<?php

$action = \GETPOST('action', 'aZ09');
$value = \GETPOST('value', 'alpha');
$modulepart = \GETPOST('modulepart', 'aZ09');
$formcompany = new \FormCompany($db);
/*
 * Actions
 */
$error = 0;
$result = \dolibarr_set_const($db, "SOCIETE_CODECLIENT_ADDON", $value, 'chaine', 0, '', $conf->entity);
$result = \dolibarr_set_const($db, "SOCIETE_CODECOMPTA_ADDON", $value, 'chaine', 0, '', $conf->entity);
$label = \GETPOST('label', 'alpha');
$scandir = \GETPOST('scan_dir', 'alpha');
$type = 'company';
$ret = \delDocumentModel($value, $type);
$label = \GETPOST('label', 'alpha');
$scandir = \GETPOST('scan_dir', 'alpha');
// On active le modele
$type = 'company';
$ret = \delDocumentModel(\GETPOST('value', 'alpha'), $type);
$setaccountancycodecustomerinvoicemandatory = \GETPOSTINT('value');
$res = \dolibarr_set_const($db, "SOCIETE_ACCOUNTANCY_CODE_CUSTOMER_INVOICE_MANDATORY", $setaccountancycodecustomerinvoicemandatory, 'yesno', 0, '', $conf->entity);
$setaddrefinlist = \GETPOSTINT('value');
$res = \dolibarr_set_const($db, "SOCIETE_ADD_REF_IN_LIST", $setaddrefinlist, 'yesno', 0, '', $conf->entity);
$setvatinlist = \GETPOSTINT('value');
$res = \dolibarr_set_const($db, "SOCIETE_SHOW_VAT_IN_LIST", $setvatinlist, 'yesno', 0, '', $conf->entity);
$val = \GETPOSTINT('value');
$res = \dolibarr_set_const($db, "COMPANY_SHOW_ADDRESS_SELECTLIST", $val, 'yesno', 0, '', $conf->entity);
$val = \GETPOSTINT('value');
$res = \dolibarr_set_const($db, "CONTACT_SHOW_EMAIL_PHONE_TOWN_SELECTLIST", $val, 'yesno', 0, '', $conf->entity);
$setaskforshippingmet = \GETPOSTINT('value');
$res = \dolibarr_set_const($db, "SOCIETE_ASK_FOR_SHIPPING_METHOD", $setaskforshippingmet, 'yesno', 0, '', $conf->entity);
$setdisableprospectcustomer = \GETPOSTINT('value');
$res = \dolibarr_set_const($db, "SOCIETE_DISABLE_PROSPECTSCUSTOMERS", $setdisableprospectcustomer, 'yesno', 0, '', $conf->entity);
$status = \GETPOST('status', 'alpha');
$idprof = "SOCIETE_" . $value . "_UNIQUE";
$result = \dolibarr_set_const($db, $idprof, $status, 'chaine', 0, '', $conf->entity);
$status = \GETPOST('status', 'alpha');
$idprof = "SOCIETE_" . $value . "_MANDATORY";
$result = \dolibarr_set_const($db, $idprof, $status, 'chaine', 0, '', $conf->entity);
$status = \GETPOST('status', 'alpha');
$idprof = "SOCIETE_" . $value . "_INVOICE_MANDATORY";
$result = \dolibarr_set_const($db, $idprof, $status, 'chaine', 0, '', $conf->entity);
$status = \GETPOST('status', 'alpha');
$result = \dolibarr_set_const($db, "COMPANY_HIDE_INACTIVE_IN_COMBOBOX", $status, 'chaine', 0, '', $conf->entity);
$setonsearchandlistgooncustomerorsuppliercard = \GETPOSTINT('value');
$res = \dolibarr_set_const($db, "SOCIETE_ON_SEARCH_AND_LIST_GO_ON_CUSTOMER_OR_SUPPLIER_CARD", $setonsearchandlistgooncustomerorsuppliercard, 'yesno', 0, '', $conf->entity);
$form = new \Form($db);
$help_url = 'EN:Module Third Parties setup|FR:Paramétrage_du_module_Tiers|ES:Configuración_del_módulo_terceros';
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \societe_admin_prepare_head();
$dirsociete = \array_merge(array('/core/modules/societe/'), $conf->modules_parts['societe']);
$arrayofmodules = array();
$arrayofmodules = \dol_sort_array($arrayofmodules, 'position');
$arrayofmodules = array();
$arrayofmodules = \dol_sort_array($arrayofmodules, 'position');
// Load array def with activated templates
$def = array();
// TODO Replace with $def = getListOfModels($db, $type);
$sql = "SELECT nom";
$resql = $db->query($sql);
$profid = array('IDPROF1' => array(), 'IDPROF2' => array(), 'IDPROF3' => array(), 'IDPROF4' => array(), 'IDPROF5' => array(), 'IDPROF6' => array(), 'EMAIL' => array());
$nbofloop = \count($profid);
$key = 'VAT_INTRA';
// Autres options
$form = new \Form($db);