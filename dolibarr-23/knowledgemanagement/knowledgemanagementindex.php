<?php

$action = \GETPOST('action', 'aZ09');
// Security check
// if (! $user->rights->knowledgemanagement->myobject->read) {
// 	accessforbidden();
// }
$socid = \GETPOSTINT('socid');
$max = 5;
$now = \dol_now();
/*
 * Actions
 */
// None
/*
 * View
 */
$form = new \Form($db);
$formfile = new \FormFile($db);
$NBMAX = \getDolGlobalInt('MAIN_SIZE_SHORTLIST_LIMIT', 5);
$max = $NBMAX;