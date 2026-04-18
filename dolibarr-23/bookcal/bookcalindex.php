<?php

$action = \GETPOST('action', 'aZ09');
// Security check
// if (! $user->hasRight('bookcal', 'myobject', 'read')) {
// 	accessforbidden();
// }
$socid = \GETPOSTINT('socid');
$now = \dol_now();
$NBMAX = \getDolGlobalInt('MAIN_SIZE_SHORTLIST_LIMIT, 5');
$max = \getDolGlobalInt('MAIN_SIZE_SHORTLIST_LIMIT', 5);
/*
 * Actions
 */
// None
/*
 * View
 */
$form = new \Form($db);
$formfile = new \FormFile($db);