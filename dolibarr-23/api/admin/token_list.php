<?php

$error = 0;
// Retrieve needed GETPOSTS for this file
// Action / Massaction
$action = \GETPOST('action', 'aZ09');
$massaction = \GETPOST('massaction', 'alpha');
$confirm = \GETPOST('confirm', 'alpha');
$toselect = \GETPOST('toselect', 'array');
// List filters
$search_user = \GETPOST('search_user', 'alpha');
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
$arrayfields = array('u.login' => array('label' => "User", 'checked' => '1'), 'e.label' => array('label' => "Entity", 'checked' => '1'), 'oat.datec' => array('label' => "DateCreation", 'checked' => '1'), 'oat.tms' => array('label' => "DateModification", 'checked' => '1'));
$nbok = 0;
$TMsg = array();
//$toselect could contain duplicate entries, cf https://github.com/Dolibarr/dolibarr/issues/26244
$unique_arr = \array_unique($toselect);
/*
 *	View
 */
$nbtotalofrecords = '';
/* The fast and low memory method to get and count full list converts the sql into a sql count */
$sqlforcount = 'SELECT COUNT(*) as nbtotalofrecords';
$resql = $db->query($sqlforcount);
$sql = "SELECT oat.rowid, oat.tokenstring, oat.entity, oat.state as rights, oat.fk_user, oat.datec as date_creation, oat.tms as date_modification,";
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$param = '';
$arrayofselected = \is_array($toselect) ? $toselect : array();
$linkback = '<a href="' . \DOL_URL_ROOT . '/admin/modules.php?restore_lastsearch_values=1">' . $langs->trans("BackToModuleList") . '</a>';
$head = \api_admin_prepare_head();
$arrayofmassactions = array('predelete' => \img_picto('', 'delete', 'class="pictofixedwidth"') . $langs->trans("Delete"));
$massactionbutton = $form->selectMassAction('', $arrayofmassactions);
$morehtmlright = '';
$tmpurlforbutton = \DOL_URL_ROOT . '/user/api_token/card.php?action=create&backtopage=' . \urlencode(\DOL_URL_ROOT . '/api/admin/token_list.php');
$colspan = 6;