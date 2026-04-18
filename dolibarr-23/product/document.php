<?php

// Get parameters
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
// Security check
$fieldvalue = !empty($id) ? $id : (!empty($ref) ? $ref : '');
$fieldtype = !empty($ref) ? 'ref' : 'rowid';
// Get parameters
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$upload_dir = \null;
$upload_dirold = \null;
// Initialize objects
$object = new \Product($db);
$result = $object->fetch($id, $ref);
$modulepart = 'product';
$permissiontoadd = $object->type == \Product::TYPE_PRODUCT && $user->hasRight('produit', 'creer') || $object->type == \Product::TYPE_SERVICE && $user->hasRight('service', 'creer');
/*
 * Actions
 */
$parameters = array('id' => $id);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$is_refresh = \GETPOST('refresh');
/*
 *	View
 */
$form = new \Form($db);
$title = $langs->trans('ProductServiceCard');
$helpurl = '';
$shortlabel = \dol_trunc($object->label, 16);
$head = \product_prepare_head($object);
$titre = $langs->trans("CardProduct" . $object->type);
$picto = $object->type == \Product::TYPE_SERVICE ? 'service' : 'product';
$parameters = array();
$reshook = $hookmanager->executeHooks('formObjectOptions', $parameters, $object, $action);
// Build file list
$filearray = \dol_dir_list($upload_dir, "files", 0, '', '(\\.meta|_preview.*\\.png)$', $sortfield, \strtolower($sortorder) == 'desc' ? \SORT_DESC : \SORT_ASC, 1);
$totalsize = 0;
$linkback = '<a href="' . \DOL_URL_ROOT . '/product/list.php?restore_lastsearch_values=1&type=' . $object->type . '">' . $langs->trans("BackToList") . '</a>';
$shownav = 1;
/* To move into tpl
	require_once DOL_DOCUMENT_ROOT.'/core/class/html.formmail.class.php';

	$formmail = new FormMail($db);
	$formmail->withaiprompt = 'text';
	$out = '';

	$showlinktoai = ($formmail->withaiprompt && isModEnabled('ai')) ? 'textgenerationemail' : '';
	$showlinktoailabel = $langs->trans("GenerateImage");

	$formatforouput = 'image';
	$htmlname = 'bodyemail';

	print load_fiche_titre($langs->trans('GenerateWithAI'), '', '');
	print '<table class="border centpercent">';

	// Fill $out
	require DOL_DOCUMENT_ROOT.'/core/tpl/formlayoutai.tpl.php';

	print $out;
	print '</table>';
	*/
$param = '&id=' . $object->id;