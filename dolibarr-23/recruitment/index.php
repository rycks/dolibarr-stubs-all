<?php

$action = \GETPOST('action', 'aZ09');
$NBMAX = \getDolGlobalInt('MAIN_SIZE_SHORTLIST_LIMIT', 5);
$max = \getDolGlobalInt('MAIN_SIZE_SHORTLIST_LIMIT', 5);
$now = \dol_now();
$socid = \GETPOSTINT('socid');
/*
 * Actions
 */
// None
/*
 * View
 */
$form = new \Form($db);
$formfile = new \FormFile($db);
$staticrecruitmentjobposition = new \RecruitmentJobPosition($db);
$staticrecruitmentcandidature = new \RecruitmentCandidature($db);
$sql = "SELECT COUNT(t.rowid) as nb, status";
$resql = $db->query($sql);
$sql = "SELECT COUNT(t.rowid) as nb, status";
$resql = $db->query($sql);
$sql = "SELECT s.rowid, s.ref, s.label, s.date_creation, s.tms, s.status, COUNT(rc.rowid) as nbapplications";
$resql = $db->query($sql);
$sql = "SELECT rc.rowid, rc.ref, rc.email, rc.lastname, rc.firstname, rc.date_creation, rc.tms, rc.status";
$resql = $db->query($sql);