<?php

$action = \GETPOST('action', 'aZ09');
$NBMAX = \getDolGlobalInt('MAIN_SIZE_SHORTLIST_LIMIT', 5);
$max = \getDolGlobalInt('MAIN_SIZE_SHORTLIST_LIMIT', 5);
$now = \dol_now();
$result = \restrictedArea($user, 'eventorganization');
/*
 * Actions
 */
// None
/*
 * View
 */
$form = new \Form($db);
$formfile = new \FormFile($db);
$title = $langs->trans('EventOrganizationArea');
$help_url = 'EN:Module_Event_Organization';