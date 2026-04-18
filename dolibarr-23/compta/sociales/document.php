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
$object = new \ChargeSociales($db);
$upload_dir = $conf->tax->dir_output . '/' . \dol_sanitizeFileName($object->ref);
$modulepart = 'tax';
$result = \restrictedArea($user, 'tax', $object->id, 'chargesociales', 'charges');
$permissiontoadd = $user->hasRight('tax', 'charges', 'creer');
$result = $object->setValueFrom('libelle', \GETPOST('lib'), '', \null, 'text', '', $user, 'TAX_MODIFY');
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans("SocialContribution") . ' - ' . $langs->trans("Documents");
$help_url = 'EN:Module_Taxes_and_social_contributions|FR:Module Taxes et dividendes|ES:M&oacute;dulo Impuestos y cargas sociales (IVA, impuestos)';
$alreadypayed = $object->getSommePaiement();
$head = \tax_prepare_head($object);
$morehtmlref = '<div class="refidno">';
$linkback = '<a href="' . \DOL_URL_ROOT . '/compta/sociales/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
// To give a chance to dol_banner_tab to use already paid amount to show correct status
$morehtmlstatus = '';
// Build file list
$filearray = \dol_dir_list($upload_dir, "files", 0, '', '(\\.meta|_preview.*\\.png)$', $sortfield, \strtolower($sortorder) == 'desc' ? \SORT_DESC : \SORT_ASC, 1);
$totalsize = 0;
$modulepart = 'tax';
$permissiontoadd = $user->hasRight('tax', 'charges', 'creer');
$permtoedit = $user->hasRight('tax', 'charges', 'creer');
$param = '&id=' . $object->id;