<?php

$action = \GETPOST('action', 'aZ09');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'admincompany';
// To manage different context of search
$page_y = \GETPOSTINT('page_y');
$error = 0;
$tmparraysize = \getDefaultImageSizes();
$maxwidthsmall = $tmparraysize['maxwidthsmall'];
$maxheightsmall = $tmparraysize['maxheightsmall'];
$maxwidthmini = $tmparraysize['maxwidthmini'];
$maxheightmini = $tmparraysize['maxheightmini'];
$quality = $tmparraysize['quality'];
$object = new \Societe($db);
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$tmparray = \getCountry(\GETPOSTINT('country_id'), 'all', $db, $langs, 0);
$tmparray = \getState(\GETPOSTINT('state_id'), 'all', $db, 0, $langs, 0);
$dirforimage = $conf->mycompany->dir_output . '/logos/';
$arrayofimages = array('logo', 'logo_squarred');
// Sale tax options
$usevat = \GETPOST("optiontva", 'aZ09');
$uselocaltax1 = \GETPOST("optionlocaltax1", 'aZ09');
$uselocaltax2 = \GETPOST("optionlocaltax2", 'aZ09');
$constant = "MAIN_INFO_SOCIETE_LOGO";
$logofilename = $mysoc->logo;
$logofilenamebis = $mysoc->logo_squarred;
$logofile = $conf->mycompany->dir_output . '/logos/' . $logofilename;
$logofilename = $mysoc->logo_small;
$logofilenamebis = $mysoc->logo_squarred_small;
$logosmallfile = $conf->mycompany->dir_output . '/logos/thumbs/' . $logofilename;
$logofilename = $mysoc->logo_mini;
$logofilenamebis = $mysoc->logo_squarred_mini;
$logominifile = $conf->mycompany->dir_output . '/logos/thumbs/' . $logofilename;
/*
 * View
 */
$wikihelp = 'EN:First_setup|FR:Premiers_paramétrages|ES:Primeras_configuraciones';
$form = new \Form($db);
$formother = new \FormOther($db);
$formcompany = new \FormCompany($db);
$formfile = new \FormFile($db);
$countrynotdefined = '<span class="error">' . $langs->trans("ErrorSetACountryFirst") . ' <a href="" onclick="window.scrollTo({top: 0, behavior: \'smooth\'}); return false;">(' . $langs->trans("SeeAbove") . ')</a></span>';
$head = \company_admin_prepare_head();
$state_id = 0;
// Tooltip for both Logo and LogSquarred
$maxfilesizearray = \getMaxFileSizeArray();
$maxmin = $maxfilesizearray['maxmin'];
$tooltiplogo = $langs->trans('AvailableFormats') . ' : png, jpg, jpeg';
$modulepart = 'mycompany';
$dirformainimage = $conf->mycompany->dir_output;
$subdirformainimage = 'logos/';
$fileformainimage = $mysoc->logo;
$modulepart = 'mycompany';
$dirformainimage = $conf->mycompany->dir_output;
$subdirformainimage = 'logos/';
$fileformainimage = $mysoc->logo_squarred;
$tooltiphelp = $langs->trans("VATIsUsedDesc");
$tooltiphelp = '';
$tooltiphelp = $langs->transcountry("LocalTax1IsUsedExample", $mysoc->country_code);
$tooltiphelp = $tooltiphelp != "LocalTax1IsUsedExample" ? "<i>" . $langs->trans("Example") . ': ' . $langs->transcountry("LocalTax1IsUsedExample", $mysoc->country_code) . "</i>\n" : "";
$options = array($langs->trans("CalcLocaltax1") . ' ' . $langs->trans("CalcLocaltax1Desc"), $langs->trans("CalcLocaltax2") . ' - ' . $langs->trans("CalcLocaltax2Desc"), $langs->trans("CalcLocaltax3") . ' - ' . $langs->trans("CalcLocaltax3Desc"));
$tooltiphelp = $langs->transcountry("LocalTax1IsNotUsedExample", $mysoc->country_code);
$tooltiphelp = $tooltiphelp != "LocalTax1IsNotUsedExample" ? "<i>" . $langs->trans("Example") . ': ' . $langs->transcountry("LocalTax1IsNotUsedExample", $mysoc->country_code) . "</i>\n" : "";
$tooltiphelp = $langs->transcountry("LocalTax2IsUsedExample", $mysoc->country_code);
$tooltiphelp = $tooltiphelp != "LocalTax2IsUsedExample" ? "<i>" . $langs->trans("Example") . ': ' . $langs->transcountry("LocalTax2IsUsedExample", $mysoc->country_code) . "</i>\n" : "";
$options = array($langs->trans("CalcLocaltax1") . ' ' . $langs->trans("CalcLocaltax1Desc"), $langs->trans("CalcLocaltax2") . ' - ' . $langs->trans("CalcLocaltax2Desc"), $langs->trans("CalcLocaltax3") . ' - ' . $langs->trans("CalcLocaltax3Desc"));
$tooltiphelp = $langs->transcountry("LocalTax2IsNotUsedExample", $mysoc->country_code);
$tooltiphelp = $tooltiphelp != "LocalTax2IsNotUsedExample" ? "<i>" . $langs->trans("Example") . ': ' . $langs->transcountry("LocalTax2IsNotUsedExample", $mysoc->country_code) . "</i>\n" : "";