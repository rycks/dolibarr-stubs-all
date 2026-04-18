<?php

$id = \GETPOSTINT('id');
$idcomment = \GETPOSTINT('idcomment');
$ref = \GETPOST("ref", 'alpha', 1);
// task ref
$objectref = \GETPOST("taskref", 'alpha');
// task ref
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$withproject = \GETPOSTINT('withproject');
// Security check
$socid = 0;
$extrafields = new \ExtraFields($db);
$object = new \Project($db);
$ret = $object->fetch($id, $ref);
/*
 * View
*/
$title = $langs->trans('CommentPage');
$form = new \Form($db);
$formother = new \FormOther($db);
$formfile = new \FormFile($db);
// Tabs for project
$tab = 'project_comment';
$head = \project_prepare_head($object);
$param = $mode == 'mine' ? '&mode=mine' : '';
$morehtmlref = '<div class="refidno">';
$end = \dol_print_date($object->date_end, 'day');
// Other attributes
$cols = 2;