<?php

// Initialize a technical object to manage hooks of page. Note that conf->hooks_modules contains an array of hook context
$hookmanager = new \HookManager($db);
// Get Parameters
$socid = \GETPOSTINT("socid");
$max = \getDolGlobalInt('MAIN_SIZE_SHORTLIST_LIMIT', 5);
/*
 * View
 */
$listofsearchfields = array();
$childids = $user->getAllChildIds();
$title = $langs->trans('HRMArea');
$sql = "SELECT u.rowid as uid, u.lastname, u.firstname, u.login, u.email, u.photo, u.gender, u.statut as user_status,";
$result = $db->query($sql);
$sql = "SELECT u.rowid as uid, u.lastname, u.firstname, u.login, u.email, u.statut as user_status, u.photo, u.gender,";
$result = $db->query($sql);
$staticrecruitmentcandidature = new \RecruitmentCandidature($db);
$staticrecruitmentjobposition = new \RecruitmentJobPosition($db);
$sql = "SELECT rc.rowid, rc.ref, rc.email, rc.lastname, rc.firstname, rc.date_creation, rc.tms, rc.status,";
$resql = $db->query($sql);
// Initialize a technical object to manage hooks. Note that conf->hooks_modules contains array
$parameters = array('user' => $user);
$reshook = $hookmanager->executeHooks('dashboardHRM', $parameters, $object);