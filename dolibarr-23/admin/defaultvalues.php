<?php

$id = \GETPOSTINT('rowid');
$action = \GETPOST('action', 'aZ09');
$optioncss = \GETPOST('optionscss', 'alphanohtml');
$mode = \GETPOST('mode', 'aZ09') ? \GETPOST('mode', 'aZ09') : 'createform';
// 'createform', 'filters', 'sortorder', 'focus'
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$defaulturl = \GETPOST('defaulturl', 'alphanohtml');
$defaultkey = \GETPOST('defaultkey', 'alphanohtml');
$defaultvalue = \GETPOST('defaultvalue', 'restricthtml');
$defaulturl = \preg_replace('/^\\//', '', $defaulturl);
$urlpage = \GETPOST('urlpage', 'alphanohtml');
$key = \GETPOST('key', 'alphanohtml');
$value = \GETPOST('value', 'restricthtml');
$object = new \DefaultValues($db);
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$error = 0;
$result = $object->delete($user);
/*
 * View
 */
$form = new \Form($db);
$formadmin = new \FormAdmin($db);
$wikihelp = 'EN:First_setup|FR:Premiers_paramétrages|ES:Primeras_configuraciones';
$param = '&mode=' . $mode;
$enabledisablehtml = $langs->trans("EnableDefaultValues") . ' ';
$head = \defaultvalues_prepare_head();
// Page
$texthelp = $langs->trans("PageUrlForDefaultValues");
$texturl = $form->textwithpicto($langs->trans("RelativeURL"), $texthelp);
// Field
$texthelp = $langs->trans("TheKeyIsTheNameOfHtmlField");
$disabled = '';
//"(t.type:=:".$mode.") AND (t.entity:in:("((int)$user->entity).", ".((int)$conf->entity)."))"
$result = $object->fetchAll($sortorder, $sortfield, 0, 0, "(t.type:=:'" . $mode . "') AND (t.entity:in:" . (int) $user->entity . ", " . (int) $conf->entity . ")");