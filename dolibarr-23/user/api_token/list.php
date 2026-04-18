<?php

$error = 0;
// Security check
$id = \GETPOSTINT('id');
$socid = 0;
$feature2 = $socid && $user->hasRight("user", "self", "write") ? '' : 'user';
$result = \restrictedArea($user, 'user', $id, 'user&user', $feature2);
// $user is current user, $id is id of edited user
$canreaduser = $user->admin || $user->id == $id;
$canedittoken = $user->admin || $user->id == $id && $user->hasRight("user", "self", "write");
// Retrieve needed GETPOSTS for this file
// Action / Massaction
$action = \GETPOST('action', 'aZ09');
$massaction = \GETPOST('massaction', 'alpha');
$confirm = \GETPOST('confirm', 'alpha');
$toselect = \GETPOST('toselect', 'array');
// List filters
$search_entity = \GETPOST('search_entity', 'alpha');
$search_datec_startday = \GETPOSTINT('search_datec_startday');
$search_datec_startmonth = \GETPOSTINT('search_datec_startmonth');
$search_datec_startyear = \GETPOSTINT('search_datec_startyear');
$search_datec_endday = \GETPOSTINT('search_datec_endday');
$search_datec_endmonth = \GETPOSTINT('search_datec_endmonth');
$search_datec_endyear = \GETPOSTINT('search_datec_endyear');
$search_datec_start = \dol_mktime(0, 0, 0, $search_datec_startmonth, $search_datec_startday, $search_datec_startyear);
$search_datec_end = \dol_mktime(23, 59, 59, $search_datec_endmonth, $search_datec_endday, $search_datec_endyear);
$search_tms_startday = \GETPOSTINT('search_tms_startday');
$search_tms_startmonth = \GETPOSTINT('search_tms_startmonth');
$search_tms_startyear = \GETPOSTINT('search_tms_startyear');
$search_tms_endday = \GETPOSTINT('search_tms_endday');
$search_tms_endmonth = \GETPOSTINT('search_tms_endmonth');
$search_tms_endyear = \GETPOSTINT('search_tms_endyear');
$search_tms_start = \dol_mktime(0, 0, 0, $search_tms_startmonth, $search_tms_startday, $search_tms_startyear);
$search_tms_end = \dol_mktime(23, 59, 59, $search_tms_endmonth, $search_tms_endday, $search_tms_endyear);
// Pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$arrayfields = array('oat.datec' => array('label' => "DateCreation", 'checked' => '1'), 'oat.tms' => array('label' => "DateModification", 'checked' => '1'));
$object = new \User($db);
$form = new \Form($db);
/*
 * Actions
 */
$parameters = array('id' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$person_name = !empty($object->firstname) ? $object->lastname . ", " . $object->firstname : $object->lastname;
$title = $person_name . " - " . $langs->trans('ApiTokens');
$help_url = '';
$nbtotalofrecords = '';
/* The fast and low memory method to get and count full list converts the sql into a sql count */
$sqlforcount = 'SELECT COUNT(*) as nbtotalofrecords';
$resql = $db->query($sqlforcount);
$sql = "SELECT oat.rowid, oat.token, oat.entity, oat.state as rights, oat.datec as date_creation, oat.tms as date_modification";
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$param = '&id=' . $id;
$arrayofselected = \is_array($toselect) ? $toselect : array();
$head = \user_prepare_head($object);
$linkback = '<a href="' . \DOL_URL_ROOT . '/user/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<a href="' . \DOL_URL_ROOT . '/user/vcard.php?id=' . $object->id . '&output=file&file=' . \urlencode(\dol_sanitizeFileName($object->getFullName($langs) . '.vcf')) . '" class="refid" rel="noopener">';
$urltovirtualcard = '/user/virtualcard.php?id=' . (int) $object->id;
$arrayofmassactions = array('predelete' => \img_picto('', 'delete', 'class="pictofixedwidth"') . $langs->trans("Delete"));
$massactionbutton = $form->selectMassAction('', $arrayofmassactions);
$tmpurlforbutton = \DOL_URL_ROOT . '/user/api_token/card.php?id=' . $id . '&action=create';
$morehtmlright = \dolGetButtonTitle($langs->trans('New'), '', 'fa fa-plus-circle', $tmpurlforbutton);
$colspan = 5;