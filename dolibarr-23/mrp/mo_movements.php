<?php

// Get parameters
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'mostockmovement';
// To manage different context of search
$backtopage = \GETPOST('backtopage', 'alpha');
$optioncss = \GETPOST('optioncss', 'aZ');
// Option for the css output (always '' except when 'print')
$massaction = \GETPOST('massaction', 'aZ09');
$lineid = \GETPOSTINT('lineid');
$msid = \GETPOSTINT('msid');
$year = \GETPOST("year");
// TODO Rename into search_year
$month = \GETPOST("month");
// TODO Rename into search_month
$search_ref = \GETPOST('search_ref', 'alpha');
$search_movement = \GETPOST("search_movement", 'alpha');
$search_product_ref = \trim(\GETPOST("search_product_ref", 'alpha'));
$search_product = \trim(\GETPOST("search_product", 'alpha'));
$search_warehouse = \trim(\GETPOST("search_warehouse", 'alpha'));
$search_inventorycode = \trim(\GETPOST("search_inventorycode", 'alpha'));
$search_user = \trim(\GETPOST("search_user", 'alpha'));
$search_batch = \trim(\GETPOST("search_batch", 'alpha'));
$search_qty = \trim(\GETPOST("search_qty", 'alpha'));
$search_type_mouvement = \GETPOST('search_type_mouvement', "intcomma");
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
// If $page is not defined, or '' or -1
$offset = $limit * $page;
// Initialize a technical objects
$object = new \Mo($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->mrp->dir_output . '/temp/massgeneration/' . $user->id;
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// Initialize array of search criteria
$search_all = \trim(\GETPOST("search_all", 'alpha'));
$search = array();
// Must be 'include', not 'include_once'.
// Security check - Protection if external user
//if ($user->socid > 0) accessforbidden();
//if ($user->socid > 0) $socid = $user->socid;
$isdraft = $object->status == $object::STATUS_DRAFT ? 1 : 0;
$result = \restrictedArea($user, 'mrp', $object->id, 'mrp_mo', '', 'fk_soc', 'rowid', $isdraft);
$objectlist = new \MouvementStock($db);
// Definition of fields for list
$arrayfields = array(
    'm.rowid' => array('label' => "Ref", 'checked' => '1', 'position' => 1),
    'm.datem' => array('label' => "Date", 'checked' => '1', 'position' => 2),
    'p.ref' => array('label' => "ProductRef", 'checked' => '1', 'css' => 'maxwidth100', 'position' => 3),
    'p.label' => array('label' => "ProductLabel", 'checked' => '0', 'position' => 5),
    'm.batch' => array('label' => "BatchNumberShort", 'checked' => '1', 'position' => 8, 'enabled' => (string) (int) \isModEnabled('productbatch')),
    'pl.eatby' => array('label' => "EatByDate", 'checked' => '0', 'position' => 9, 'enabled' => (string) (int) \isModEnabled('productbatch')),
    'pl.sellby' => array('label' => "SellByDate", 'checked' => '0', 'position' => 10, 'enabled' => (string) (int) \isModEnabled('productbatch')),
    'e.ref' => array('label' => "Warehouse", 'checked' => '1', 'position' => 100, 'enabled' => (string) (int) (!($id > 0))),
    // If we are on specific warehouse, we hide it
    'm.fk_user_author' => array('label' => "Author", 'checked' => '0', 'position' => 120),
    'm.inventorycode' => array('label' => "InventoryCodeShort", 'checked' => '1', 'position' => 130),
    'm.label' => array('label' => "MovementLabel", 'checked' => '1', 'position' => 140),
    'm.type_mouvement' => array('label' => "TypeMovement", 'checked' => '0', 'position' => 150),
    'origin' => array('label' => "Origin", 'checked' => '1', 'position' => 155),
    'm.fk_projet' => array('label' => 'Project', 'checked' => '0', 'position' => 180),
    'm.value' => array('label' => "Qty", 'checked' => '1', 'position' => 200),
    'm.price' => array('label' => "UnitPurchaseValue", 'checked' => '0', 'position' => 210),
);
$arrayfields = \dol_sort_array($arrayfields, 'position');
// Permissions
$permissionnote = $user->hasRight('mrp', 'write');
// Used by the include of actions_setnotes.inc.php
$permissiondellink = $user->hasRight('mrp', 'write');
// Used by the include of actions_dellink.inc.php
$permissiontoadd = $user->hasRight('mrp', 'write');
// Used by the include of actions_addupdatedelete.inc.php and actions_lineupdown.inc.php
$permissiontodelete = $user->hasRight('mrp', 'delete') || $permissiontoadd && isset($object->status) && $object->status == $object::STATUS_DRAFT;
$upload_dir = $conf->mrp->multidir_output[isset($object->entity) ? $object->entity : 1];
$permissiontoproduce = $permissiontoadd;
$permissiontoupdatecost = $user->hasRight('bom', 'write');
$arrayofselected = array();
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$error = 0;
$backurlforlist = \dol_buildpath('/mrp/mo_list.php', 1);
$triggermodname = 'MO_MODIFY';
// Actions to send emails
$triggersendname = 'MO_SENTBYMAIL';
$autocopy = 'MAIN_MAIL_AUTOCOPY_MO_TO';
$trackid = 'mo' . $object->id;
/*
 * View
 */
$form = new \Form($db);
$formproject = new \FormProjets($db);
$formproduct = new \FormProduct($db);
$productstatic = new \Product($db);
$productlot = new \Productlot($db);
$warehousestatic = new \Entrepot($db);
$userstatic = new \User($db);
$title = $langs->trans('Mo');
$help_url = 'EN:Module_Manufacturing_Orders|FR:Module_Ordres_de_Fabrication|DE:Modul_Fertigungsauftrag';
$res = $object->fetch_thirdparty();
$res = $object->fetch_optionals();
$head = \moPrepareHead($object);
$formconfirm = '';
// Call Hook formConfirm
$parameters = array('formConfirm' => $formconfirm, 'lineid' => $lineid);
$reshook = $hookmanager->executeHooks('formConfirm', $parameters, $object, $action);
// Object card
// ------------------------------------------------------------
$linkback = '<a href="' . \dol_buildpath('/mrp/mo_list.php', 1) . '?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
// Common attributes
$keyforbreak = 'fk_warehouse';
/*
	print '<div class="tabsAction">';

	$parameters = array();
	// Note that $action and $object may be modified by hook
	$reshook = $hookmanager->executeHooks('addMoreActionsButtons', $parameters, $object, $action);
	if (empty($reshook)) {
		// Cancel - Reopen
		if ($permissiontoadd)
		{
			if ($object->status == $object::STATUS_VALIDATED || $object->status == $object::STATUS_INPROGRESS)
			{
				print '<a class="butActionDelete" href="'.$_SERVER["PHP_SELF"].'?id='.$object->id.'&action=confirm_close&confirm=yes">'.$langs->trans("Cancel").'</a>'."\n";
			}

			if ($object->status == $object::STATUS_CANCELED)
			{
				print '<a class="butAction" href="'.$_SERVER["PHP_SELF"].'?id='.$object->id.'&action=confirm_reopen&confirm=yes">'.$langs->trans("Re-Open").'</a>'."\n";
			}

			if ($object->status == $object::STATUS_PRODUCED) {
				if ($permissiontoproduce) {
					print '<a class="butAction" href="'.$_SERVER["PHP_SELF"].'?id='.$object->id.'&action=confirm_reopen">'.$langs->trans('ReOpen').'</a>';
				} else {
					print '<a class="butActionRefused classfortooltip" href="#" title="'.$langs->trans("NotEnoughPermissions").'">'.$langs->trans('ReOpen').'</a>';
				}
			}
		}
	}

	print '</div>';
*/
$sql = "SELECT p.rowid, p.ref as product_ref, p.label as produit, p.tobatch, p.fk_product_type as type, p.entity,";
// Add fields from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSelect', $parameters);
// Add where from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters);
$nbtotalofrecords = '';
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$param = '';
// List of mass actions available
$arrayofmassactions = array();
$massactionbutton = $form->selectMassAction('', $arrayofmassactions);
$moreforfilter = '';
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldPreListTitle', $parameters, $object, $action);
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$selectedfields = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage, \getDolGlobalString('MAIN_CHECKBOX_LEFT_COLUMN'));
// Fields from hook
$parameters = array('arrayfields' => $arrayfields);
$reshook = $hookmanager->executeHooks('printFieldListOption', $parameters);
$totalarray = array();
// Hook fields
$parameters = array('arrayfields' => $arrayfields, 'param' => $param, 'sortfield' => $sortfield, 'sortorder' => $sortorder);
$reshook = $hookmanager->executeHooks('printFieldListTitle', $parameters);
$i = 0;
$savnbfield = $totalarray['nbfield'];
$totalarray = array();
$imaxinloop = $limit ? \min($num, $limit) : $num;