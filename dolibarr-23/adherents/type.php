<?php

$rowid = \GETPOSTINT('rowid');
$action = \GETPOST('action', 'aZ09');
$massaction = \GETPOST('massaction', 'alpha');
$cancel = \GETPOST('cancel', 'alpha');
$toselect = \GETPOST('toselect', 'array:int');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : \str_replace('_', '', \basename(\dirname(__FILE__)) . \basename(__FILE__, '.php'));
// To manage different context of search
$backtopage = \GETPOST('backtopage', 'alpha');
$mode = \GETPOST('mode', 'alpha');
$sall = \GETPOST("sall", "alpha");
$filter = \GETPOST("filter", 'alpha');
$search_ref = \GETPOST('search_ref', 'alpha');
$search_lastname = \GETPOST('search_lastname', 'alpha');
$search_login = \GETPOST('search_login', 'alpha');
$search_email = \GETPOST('search_email', 'alpha');
$type = \GETPOST('type', 'intcomma');
$status = \GETPOST('status', 'alpha');
$optioncss = \GETPOST('optioncss', 'alpha');
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$label = \GETPOST("label", "alpha");
$morphy = \GETPOST("morphy", "alpha");
$status = \GETPOST("status", "intcomma");
$subscription = \GETPOSTINT("subscription");
$amount = \GETPOST('amount', 'alpha');
$duration_value = \GETPOSTINT('duration_value');
$duration_unit = \GETPOST('duration_unit', 'alpha');
$vote = \GETPOSTINT("vote");
$comment = \GETPOST("comment", 'restricthtml');
$mail_valid = \GETPOST("mail_valid", 'restricthtml');
$caneditamount = \GETPOSTINT("caneditamount");
// Initialize a technical object
$object = new \AdherentType($db);
$extrafields = new \ExtraFields($db);
// Definition of array of fields for columns
$tableprefix = 't';
$arrayfields = array();
//$arrayfields['anotherfield'] = array('type'=>'integer', 'label'=>'AnotherField', 'checked'=>1, 'enabled'=>1, 'position'=>90, 'csslist'=>'right');
$arrayfields = \dol_sort_array($arrayfields, 'position');
// Security check
$result = \restrictedArea($user, 'adherent', $rowid, 'adherent_type');
/*
 *	Actions
 */
$error = 0;
$action = '';
// $vote is already int
// Fill array 'array_options' with data from add form
$ret = $extrafields->setOptionalsFromPost(\null, $object);
// $vote is already int.
// Fill array 'array_options' with data from add form
$ret = $extrafields->setOptionalsFromPost(\null, $object, '@GETPOSTISSET');
$ret = $object->update($user);
$res = $object->delete($user);
/*
 * View
 */
$form = new \Form($db);
$formproduct = new \FormProduct($db);
$title = $langs->trans("MembersTypeSetup");
$help_url = 'EN:Module_Foundations|FR:Module_Adh&eacute;rents|ES:M&oacute;dulo_Miembros|DE:Modul_Mitglieder';
$arrayofselected = \is_array($toselect) ? $toselect : array();
$totalarray = ['nbfield' => 0];
//print dol_get_fiche_head([]);
$sql = "SELECT d.rowid, d.libelle as label, d.subscription, d.amount, d.caneditamount, d.vote,";
$result = $db->query($sql);