<?php

// Get parameters
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : \str_replace('_', '', \basename(\dirname(__FILE__)) . \basename(__FILE__, '.php'));
// To manage different context of search
$backtopage = \GETPOST('backtopage', 'alpha');
$actioncode = \GETPOST('actioncode', 'array', 3);
$search_rowid = \GETPOST('search_rowid');
$search_agenda_label = \GETPOST('search_agenda_label');
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
// Initialize a technical objects
$object = new \FactureFournisseur($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->facture->multidir_output[$conf->entity] . '/temp/massgeneration/' . $user->id;
// Note that conf->hooks_modules contains array
$object = new \FactureFournisseur($db);
$extrafields = new \ExtraFields($db);
$ret = $object->fetch($id, $ref);
$ret = $object->fetch_thirdparty();
// Security check
$socid = \GETPOSTINT('socid');
$usercancreate = \false;
$isdraft = $object->status == \FactureFournisseur::STATUS_DRAFT ? 1 : 0;
$result = \restrictedArea($user, 'fournisseur', $id, 'facture_fourn', 'facture', 'fk_soc', 'rowid', $isdraft);
/*
 *  Actions
 */
$parameters = array('id' => $id);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 *	View
 */
$form = new \Form($db);
$title = $langs->trans("Agenda");
$help_url = 'EN:Module_Agenda_En|DE:Modul_Terminplanung';
$head = \facturefourn_prepare_head($object);
$titre = $langs->trans('SupplierInvoice');
// Object card
// ------------------------------------------------------------
$linkback = '<a href="' . \DOL_URL_ROOT . '/compta/facture/list.php?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
// Actions buttons
$objthirdparty = $object;
$objcon = new \stdClass();
$out = '&origin=' . \urlencode((string) ($object->element . (!empty($object->module) ? '@' . $object->module : ''))) . '&originid=' . \urlencode((string) $object->id);
$urlbacktopage = $_SERVER['PHP_SELF'] . '?id=' . $object->id;
$permok = $user->hasRight('paymentbagendaybanktransfer', 'myactions', 'create');
$morehtmlright = '';
$messagingUrl = \DOL_URL_ROOT . '/fourn/facture/messaging.php?id=' . $object->id;
$messagingUrl = \DOL_URL_ROOT . '/fourn/facture/agenda.php?id=' . $object->id;