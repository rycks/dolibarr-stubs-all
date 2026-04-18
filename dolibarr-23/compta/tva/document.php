<?php

$id = \GETPOSTINT('id');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
// Get parameters
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$object = new \Tva($db);
$upload_dir = $conf->tax->dir_output . '/vat/' . \dol_sanitizeFileName($object->ref);
$modulepart = 'tax-vat';
$result = \restrictedArea($user, 'tax', '', 'tva', 'charges');
$permissiontoadd = $user->hasRight('tax', 'charges', 'creer');
$result = $object->setValueFrom('label', \GETPOST('lib', 'alpha'), '', \null, 'text', '', $user, 'TAX_MODIFY');
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans("VATPayment") . ' - ' . $langs->trans("Documents");
$help_url = 'EN:Module_Taxes_and_social_contributions|FR:Module Taxes et dividendes|ES:M&oacute;dulo Impuestos y cargas sociales (IVA, impuestos)';