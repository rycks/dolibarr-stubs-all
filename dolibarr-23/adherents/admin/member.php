<?php

$choices = array('yesno', 'texte', 'chaine');
$value = \GETPOST('value', 'alpha');
$label = \GETPOST('label', 'alpha');
$scandir = \GETPOST('scandir', 'alpha');
$type = 'member';
$action = \GETPOST('action', 'aZ09');
$modulepart = \GETPOST('modulepart', 'aZ09');
$reg = array();
$error = 0;
$maskconst = \GETPOST('maskconst', 'aZ09');
$maskvalue = \GETPOST('maskvalue', 'alpha');
$res = 0;
$result = \dolibarr_set_const($db, \GETPOST('name', 'alpha'), \GETPOST('value'), '', 0, '', $conf->entity);
$result = \dolibarr_del_const($db, \GETPOST('name', 'alpha'), $conf->entity);
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans("MembersSetup");
$help_url = 'EN:Module_Foundations|FR:Module_Adh&eacute;rents|ES:M&oacute;dulo_Miembros|DE:Modul_Mitglieder';
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \member_admin_prepare_head();
$dirModMember = \array_merge(array('/core/modules/member/'), (array) $conf->modules_parts['member']);
$arrayofmodules = array();
$arrayofmodules = \dol_sort_array($arrayofmodules, 'position');
// Document templates for documents generated from member record
$dirmodels = \array_merge(array('/'), (array) $conf->modules_parts['models']);
// Defined model definition table
$def = array();
// TODO Replace with $def = getListOfModels($db, $type);
$sql = "SELECT nom as name";
$resql = $db->query($sql);
// Start date of new membership
$startpoint = array();
$startfirstdayof = !\getDolGlobalString('MEMBER_SUBSCRIPTION_START_FIRST_DAY_OF') ? 0 : \getDolGlobalString('MEMBER_SUBSCRIPTION_START_FIRST_DAY_OF');
$arraychoices = array('0' => $langs->trans("None"));
$helptext = $langs->trans("FollowingConstantsWillBeSubstituted") . '<br>';
$now = \dol_now();
$year = \dol_print_date($now, '%Y');
$month = \dol_print_date($now, '%m');
$day = \dol_print_date($now, '%d');
// List of values to scan for a replacement (Must be samevalues than into adherents/cartes/carte.php and pdf_standard_members.class.php)
$substitutionarray = array('__MEMBER_ID__' => 'MemberID', '__MEMBER_REF__' => 'MemberRef', '__MEMBER_LOGIN__' => 'MemberLogin', '__MEMBER_TITLE__' => 'MemberLogin', '__MEMBER_FIRSTNAME__' => 'MemberFirstname', '__MEMBER_LASTNAME__' => 'MemberLastname', '__MEMBER_FULLNAME__' => 'MemberFullname', '__MEMBER_COMPANY__' => 'Company', '__MEMBER_ADDRESS__' => 'MemberAddress', '__MEMBER_ZIP__' => 'MemberZip', '__MEMBER_TOWN__' => 'MemberTown', '__MEMBER_COUNTRY__' => 'MemberCountry', '__MEMBER_COUNTRY_CODE__' => 'MemberCountryCode', '__MEMBER_EMAIL__' => 'MemberEmail', '__MEMBER_BIRTH__' => 'MemberBirthdate', '__MEMBER_TYPE__' => 'MemberType', '__MEMBER_PHOTO__' => 'MemberPhoto', '__YEAR__' => $year, '__MONTH__' => $month, '__DAY__' => $day, '__DOL_MAIN_URL_ROOT__' => (string) \DOL_MAIN_URL_ROOT, '__SERVER__' => "https://" . $_SERVER["SERVER_NAME"] . "/");
// List of possible labels (defined into $_Avery_Labels variable set into format_cards.lib.php)
$arrayoflabels = array();
// List of possible labels (defined into $_Avery_Labels variable set into format_cards.lib.php)
$arrayoflabels = array();