<?php

$id = \GETPOST('rowid') ? \GETPOSTINT('rowid') : \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$confirm = \GETPOST('confirm', 'alpha');
$backtopage = \GETPOST('backtopage', 'alpha');
$socid = \GETPOSTINT('socid');
$amount = \price2num(\GETPOST('amount', 'alphanohtml'), 'MT');
$donation_date = \dol_mktime(12, 0, 0, \GETPOSTINT('remonth'), \GETPOSTINT('reday'), \GETPOSTINT('reyear'));
$projectid = \GETPOST('projectid') ? \GETPOSTINT('projectid') : 0;
$public_donation = \GETPOSTINT("public");
$object = new \Don($db);
$soc = \null;
$soc = new \Societe($db);
$extrafields = new \ExtraFields($db);
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
$upload_dir = $conf->don->dir_output;
// Security check
$result = \restrictedArea($user, 'don', $object->id);
$permissiontoread = $user->hasRight('don', 'lire');
$permissiontoadd = $user->hasRight('don', 'creer');
$permissiontodelete = $user->hasRight('don', 'supprimer');
$permissiontoeditextra = $permissiontoadd;
/*
 * Actions
 */
$error = 0;
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$backurlforlist = \DOL_URL_ROOT . '/don/list.php';
/*
 * View
 */
$bankaccountstatic = new \Account($db);
$title = $langs->trans("Donation");
$help_url = 'EN:Module_Donations|FR:Module_Dons|ES:M&oacute;dulo_Donaciones|DE:Modul_Spenden';
$form = new \Form($db);
$formfile = new \FormFile($db);
$formcompany = new \FormCompany($db);
$formproject = \null;
$selected = \GETPOSTINT('modepayment');
$doleditor = new \DolEditor('note_public', $note_public, '', 80, 'dolibarr_notes', 'In', \false, \false, !\getDolGlobalString('FCKEDITOR_ENABLE_NOTE_PUBLIC') ? 0 : 1, \ROWS_3, '90%');
// Other attributes
$parameters = array();
$reshook = $hookmanager->executeHooks('formObjectOptions', $parameters, $object, $action);
$hselected = 'card';
$head = \donation_prepare_head($object);
// Other attributes
$parameters = array();
$reshook = $hookmanager->executeHooks('formObjectOptions', $parameters, $object, $action);
$totalpaid = 0;
$formconfirm = "";
$result = $object->fetch($id);
$result = $object->fetch_optionals();
$hselected = 'card';
$head = \donation_prepare_head($object);
$linkback = '<a href="' . \DOL_URL_ROOT . '/don/list.php' . (!empty($socid) ? '?socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
// Other attributes
$cols = 2;
/*
 * Payments
 */
$sql = "SELECT p.rowid, p.num_payment, p.datep as dp, p.amount,";
//print $sql;
$resql = $db->query($sql);
$remaintopay = \price2num($object->amount - $totalpaid, 'MT');
$parameters = array();
$reshook = $hookmanager->executeHooks('addMoreActionsButtons', $parameters, $object, $action);
/*
 * Generated documents
 */
$filename = \dol_sanitizeFileName((string) $object->id);
$filedir = $conf->don->dir_output . "/" . \dol_sanitizeFileName((string) $object->id);
$urlsource = $_SERVER['PHP_SELF'] . '?rowid=' . $object->id;
$genallowed = (int) (($object->paid == 0 || $user->admin) && $user->hasRight('don', 'lire'));
$delallowed = $user->hasRight('don', 'creer');
// Show links to link elements
$tmparray = $form->showLinkToObjectBlock($object, array(), array('don'), 1);
$linktoelem = $tmparray['linktoelem'];
$htmltoenteralink = $tmparray['htmltoenteralink'];
$somethingshown = $form->showLinkedObjectBlock($object, $linktoelem);
$validpaymentmethod = \getValidOnlinePaymentMethods('');
$useonlinepayment = \count($validpaymentmethod);