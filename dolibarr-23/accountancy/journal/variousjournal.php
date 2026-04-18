<?php

$id_journal = \GETPOSTINT('id_journal');
$action = \GETPOST('action', 'aZ09');
$date_startmonth = \GETPOSTINT('date_startmonth');
$date_startday = \GETPOSTINT('date_startday');
$date_startyear = \GETPOSTINT('date_startyear');
$date_endmonth = \GETPOSTINT('date_endmonth');
$date_endday = \GETPOSTINT('date_endday');
$date_endyear = \GETPOSTINT('date_endyear');
$in_bookkeeping = \GETPOST('in_bookkeeping');
// Get information of a journal
$object = new \AccountingJournal($db);
$result = $object->fetch($id_journal);
$parameters = array();
$date_start = \dol_mktime(0, 0, 0, $date_startmonth, $date_startday, $date_startyear);
$date_end = \dol_mktime(23, 59, 59, $date_endmonth, $date_endday, $date_endyear);
$pastmonth = \null;
// Initialise, could be unset
$pastmonthyear = \null;
$data_type = 'view';
$journal_data = $object->getData($user, $data_type, $date_start, $date_end, $in_bookkeeping);
/*
 * Actions
 */
$reshook = $hookmanager->executeHooks('doActions', $parameters, $user, $action);
// Note that $action and $object may have been modified by some hooks
$reload = \false;
$error = 0;
$result = $object->writeIntoBookkeeping($user, $journal_data);
$nb_elements = \count($journal_data);
$reload = \true;
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans("GenerationOfAccountingEntries") . ' - ' . $object->getNomUrl(0, 2, 1, '', 1);
$help_url = 'EN:Module_Double_Entry_Accounting|FR:Module_Comptabilit&eacute;_en_Partie_Double#G&eacute;n&eacute;ration_des_&eacute;critures_en_comptabilit&eacute;';
$nom = $title;
$nomlink = '';
$periodlink = '';
$exportlink = '';
$builddate = \dol_now();
$description = $langs->trans("DescJournalOnlyBindedVisible") . '<br>';
$listofchoices = array('notyet' => $langs->trans("NotYetInGeneralLedger"), 'already' => $langs->trans("AlreadyInGeneralLedger"));
$period = $form->selectDate($date_start ? $date_start : -1, 'date_start', 0, 0, 0, '', 1, 0) . ' - ' . $form->selectDate($date_end ? $date_end : -1, 'date_end', 0, 0, 0, '', 1, 0);
$varlink = 'id_journal=' . $id_journal;
// Test that setup is complete (we are in accounting, so test on entity is always on $conf->entity only, no sharing allowed)
// Fiscal period test
$sql = "SELECT COUNT(rowid) as nb FROM " . \MAIN_DB_PREFIX . "accounting_fiscalyear WHERE entity = " . (int) $conf->entity;
$resql = $db->query($sql);
// Bank journal
// Test that setup is complete (we are in accounting, so test on entity is always on $conf->entity only, no sharing allowed)
$sql = "SELECT COUNT(rowid) as nb";
$resql = $db->query($sql);
$object_label = $langs->trans("ObjectsRef");
// Show result array
$i = 0;
$colspan = 7;