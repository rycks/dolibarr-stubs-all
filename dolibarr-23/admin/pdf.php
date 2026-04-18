<?php

$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
/*
 * View
 */
$wikihelp = 'EN:First_setup|FR:Premiers_param&eacute;trages|ES:Primeras_configuraciones';
$form = new \Form($db);
$formother = new \FormOther($db);
$formadmin = new \FormAdmin($db);
$arraydetailsforpdffoot = array(0 => $langs->transnoentitiesnoconv('NoDetails'), 1 => $langs->transnoentitiesnoconv('DisplayCompanyInfo'), 2 => $langs->transnoentitiesnoconv('DisplayCompanyManagers'), 3 => $langs->transnoentitiesnoconv('DisplayCompanyInfoAndManagers'));
$arraylistofpdfformat = array(0 => $langs->transnoentitiesnoconv('PDF 1.7'), 1 => $langs->transnoentitiesnoconv('PDF/A-1b'), 3 => $langs->transnoentitiesnoconv('PDF/A-3b'));
$s = $langs->trans("LibraryToBuildPDF") . "<br>";
$i = 0;
$pdf = \pdf_getInstance(array(210, 297));
$head = \pdf_admin_prepare_head();
$noCountryCode = empty($mysoc->country_code);
$selected = \getDolGlobalString('MAIN_PDF_FORMAT');
$keyforconstant = 'MAIN_LEGALFORM_IN_ADDRESS';
// Localtaxes
$locales = '';
$text = '';
$title = $langs->trans("PDFRulesForSalesTax");
$selected = \GETPOSTISSET('PDF_USE_ALSO_LANGUAGE_CODE') ? \GETPOST('PDF_USE_ALSO_LANGUAGE_CODE') : \getDolGlobalString('PDF_USE_ALSO_LANGUAGE_CODE');
$arrval = array('0', '1', '2', '3');
//$pdfa = false; // PDF default version
$pdfa = \getDolGlobalInt('PDF_USE_A', 0);