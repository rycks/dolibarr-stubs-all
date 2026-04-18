<?php

/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
$optioncss = \GETPOST('optioncss', 'aZ');
// Option for the css output (always '' except when 'print')
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : \str_replace('_', '', \basename(\dirname(__FILE__)) . \basename(__FILE__, '.php'));
// To manage different context of search
$id = \GETPOSTINT('id');
$object = new \Contact($db);
$socid = !empty($object->thirdparty->id) ? $object->thirdparty->id : \null;
// Sort & Order fields
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT('page');
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
// Search fields
$sref = \GETPOST("sref");
$sprod_fulldescr = \GETPOST("sprod_fulldescr");
$month = \GETPOSTINT('month');
$year = \GETPOSTINT('year');
// Customer or supplier selected in drop box
$thirdTypeSelect = \GETPOST("third_select_id");
$type_element = \GETPOSTISSET('type_element') ? \GETPOST('type_element') : '';
$result = \restrictedArea($user, 'contact', $object->id, 'socpeople&societe');
/*
 * Actions
 */
$parameters = array('id' => $id);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$formother = new \FormOther($db);
$productstatic = new \Product($db);
$objsoc = new \Societe($db);
$title = $langs->trans("ContactRelatedItems");
$help_url = 'EN:Module_Third_Parties|FR:Module_Tiers|ES:Empresas';
$head = \contact_prepare_head($object);
$linkback = '<a href="' . \DOL_URL_ROOT . '/contact/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<a href="' . \DOL_URL_ROOT . '/contact/vcard.php?id=' . $object->id . '" class="refid">';
$thirdTypeArray = array();
$elementTypeArray = array();
$documentstatic = \null;
$documentstaticline = \null;
$sql_select = '';
$doc_number = '';
$dateprint = '';
$tables_from = '';
$where = '';
$parameters = array();
$totalnboflines = 0;
$sql = '';
$reshook = $hookmanager->executeHooks('printFieldListSelect', $parameters);
$sql = $sql_select;
$parameters = array('type_element' => $type_element);
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters, $object, $action);
$resql = $db->query($sql);
$totalnboflines = $db->num_rows($resql);
$disabled = 0;
$showempty = 2;
// Define type of elements
$typeElementString = $form->selectarray("type_element", $elementTypeArray, \GETPOST('type_element'), $showempty, 0, 0, '', 0, 0, $disabled, '', 'maxwidth150onsmartphone');
$button = '<input type="submit" class="button small" name="button_third" value="' . \dol_escape_htmltag($langs->trans("Search")) . '" title="' . \dol_escape_htmltag($langs->trans("Search")) . '">';
$param = '';
$total_qty = 0;
$num = 0;
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$param = (!empty($socid) ? "&socid=" . \urlencode((string) $socid) : "") . "&type_element=" . \urlencode((string) $type_element) . "&id=" . \urlencode((string) $id);
$searchpicto = $form->showFilterAndCheckAddButtons(0);
$i = 0;
$total_qty = 0;
$total_ht = 0;