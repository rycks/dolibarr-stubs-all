<?php

$action = \GETPOST('action', 'aZ09');
$modulepart = \GETPOST('modulepart', 'aZ09');
$diroffile = '';
$varname = '';
$filename = \getDolGlobalString($varname);
/*
 * View
 */
$wikihelp = 'EN:First_setup|FR:Premiers_param&eacute;trages|ES:Primeras_configuraciones';
$form = new \Form($db);
$formother = new \FormOther($db);
$formadmin = new \FormAdmin($db);
$formfile = new \FormFile($db);
$head = \pdf_admin_prepare_head();
$tooltiptext = '';
$maxfilesizearray = \getMaxFileSizeArray();
$tooltipconcatpdf = $maxfilesizearray['maxmin'] > 0 ? $langs->trans('MaxSize') . ' : ' . $maxfilesizearray['maxmin'] . ' ' . $langs->trans('Kb') : '';
$documenturl = \getDolGlobalString('DOL_URL_ROOT_DOCUMENT_PHP', \DOL_URL_ROOT . '/document.php');
$arrval = array('0' => $langs->trans("No"), '1' => $langs->trans("Yes"));
$arrval = array('0' => $langs->trans("No"), '1' => $langs->trans("InvoiceOptionCategoryOfOperationsYes1"), '2' => $langs->trans("InvoiceOptionCategoryOfOperationsYes2"));