<?php

$error = 0;
$outlangs = \null;
$array_options = array();
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$socid = \GETPOSTINT('socid');
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$origin = \GETPOST('origin', 'alpha');
$originid = \GETPOSTINT('originid');
$renewal = \GETPOST('renewal');
// for contract renewal
$confirm = \GETPOST('confirm', 'alpha');
$backtopage = \GETPOST('backtopage', 'alpha');
// Go back to a dedicated page
$lineid = \GETPOSTINT('lineid');
$contactid = \GETPOSTINT('contactid');
$projectid = \GETPOSTINT('projectid');
$rank = \GETPOSTINT('rank') > 0 ? \GETPOSTINT('rank') : -1;
// PDF
$hidedetails = \GETPOSTINT('hidedetails') ? \GETPOSTINT('hidedetails') : (\getDolGlobalString('MAIN_GENERATE_DOCUMENTS_HIDE_DETAILS') ? 1 : 0);
$hidedesc = \GETPOSTINT('hidedesc') ? \GETPOSTINT('hidedesc') : (\getDolGlobalString('MAIN_GENERATE_DOCUMENTS_HIDE_DESC') ? 1 : 0);
$hideref = \GETPOSTINT('hideref') ? \GETPOSTINT('hideref') : (\getDolGlobalString('MAIN_GENERATE_DOCUMENTS_HIDE_REF') ? 1 : 0);
$object = new \Propal($db);
$extrafields = new \ExtraFields($db);
$ret = $object->fetch($id, $ref);
$usercanread = $user->hasRight("propal", "lire");
$usercancreate = $user->hasRight("propal", "creer");
$usercandelete = $user->hasRight("propal", "supprimer");
$usercanclose = !\getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && $usercancreate || \getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && $user->hasRight('propal', 'propal_advance', 'close');
$usercanvalidate = !\getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && $usercancreate || \getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && $user->hasRight('propal', 'propal_advance', 'validate');
$usercansend = !\getDolGlobalString('MAIN_USE_ADVANCED_PERMS') || \getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && $user->hasRight('propal', 'propal_advance', 'send');
$usermustrespectpricemin = \getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && !$user->hasRight('produit', 'ignore_price_min_advance') || !\getDolGlobalString('MAIN_USE_ADVANCED_PERMS');
$usercancreateorder = $user->hasRight('commande', 'creer') == 1;
$usercancreateinvoice = $user->hasRight('facture', 'creer') == 1;
$usercancreatecontract = $user->hasRight('contrat', 'creer') == 1;
$usercancreateintervention = $user->hasRight('ficheinter', 'creer') == 1;
$usercancreatepurchaseorder = $user->hasRight('fournisseur', 'commande', 'creer') || $user->hasRight('supplier_order', 'creer');
$usercanreopen = !\getDolGlobalBool('MAIN_USE_ADVANCED_PERMS') && $usercanclose || \getDolGlobalBool('MAIN_USE_ADVANCED_PERMS') && $user->hasRight('propal', 'propal_advance', 'reopen');
$permissiontoadd = $usercancreate;
$permissionnote = $usercancreate;
// Used by the include of actions_setnotes.inc.php
$permissiondellink = $usercancreate;
// Used by the include of actions_dellink.inc.php
$permissiontoedit = $usercancreate;
// Used by the include of actions_lineupdown.inc.php
$permissiontoeditextra = $permissiontoadd;
$price_base_type = \null;
$shipping_method_id = \null;
$warehouse_id = -1;
/*
 * Actions
 */
$parameters = array('socid' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$backurlforlist = \DOL_URL_ROOT . '/comm/propal/list.php';
// Actions to send emails
$actiontypecode = 'AC_OTH_AUTO';
$triggersendname = 'PROPAL_SENTBYMAIL';
$autocopy = 'MAIN_MAIL_AUTOCOPY_PROPOSAL_TO';
$trackid = 'pro' . $object->id;
// Actions to build doc
$upload_dir = !empty($conf->propal->multidir_output[$object->entity ?? $conf->entity]) ? $conf->propal->multidir_output[$object->entity ?? $conf->entity] : $conf->propal->dir_output;
$permissiontoadd = $usercancreate;
/*
 * View
 */
$form = new \Form($db);
$formfile = new \FormFile($db);
$formpropal = new \FormPropal($db);
$formmargin = new \FormMargin($db);
$formproject = \null;
$title = $object->ref . " - " . $langs->trans('Card');
$help_url = 'EN:Commercial_Proposals|FR:Proposition_commerciale|ES:Presupuestos|DE:Modul_Angebote';
$now = \dol_now();
$currency_code = \getDolCurrency();
$soc = new \Societe($db);
$cond_reglement_id = \GETPOSTINT('cond_reglement_id');
$deposit_percent = \GETPOSTFLOAT('cond_reglement_id_deposit_percent');
$mode_reglement_id = \GETPOSTINT('mode_reglement_id');
$fk_account = \GETPOSTINT('fk_account');
$datepropal = \getDolGlobalString('MAIN_DO_NOT_AUTOFILL_DATE_PROPOSAL') ? -1 : '';
// By default '' so we will autofill date. -1 means keep empty.
// Load objectsrc
$objectsrc = \null;
// Call Hook tabContentCreateProposal
$parameters = array();
// Note that $action and $object may be modified by hook
$reshook = $hookmanager->executeHooks('tabContentCreateProposal', $parameters, $object, $action);