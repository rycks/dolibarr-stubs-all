<?php

$id = \GETPOSTINT('id');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel', 'alpha');
$backtopage = \GETPOST('backtopage', 'alpha');
$backtopageforcancel = \GETPOST('backtopageforcancel', 'alpha');
$securitykey = \GETPOST('securitykey', 'alpha');
$permissiontoadd = $user->hasRight('cron', 'create');
$permissiontoexecute = $user->hasRight('cron', 'execute');
$permissiontodelete = $user->hasRight('cron', 'delete');
// after this test $permissiontoadd is always true and never can't be false
/*
 * Actions
 */
$object = new \Cronjob($db);
$result = $object->fetch($id);
$result = $object->delete($user);
$action = '';
// Add cron task
$result = $object->create($user);
// Add cron task
$result = $object->update($user);
// Add cron task
$result = $object->update($user);
// Add cron task
$result = $object->update($user);
/*
 * View
 */
$form = new \Form($db);
$formCron = new \FormCron($db);
$head = \cron_prepare_head($object);
$formconfirm = '';
$doleditor = new \DolEditor('note', $object->note_private, '', 160, 'dolibarr_notes', 'In', \true, \false, 0, \ROWS_4, '90%');
$input = " &nbsp;<input type=\"radio\" name=\"unitfrequency\" value=\"60\" id=\"frequency_minute\" ";
$input = " &nbsp;<input type=\"radio\" name=\"unitfrequency\" value=\"3600\" id=\"frequency_heures\" ";
$input = " &nbsp;<input type=\"radio\" name=\"unitfrequency\" value=\"86400\" id=\"frequency_jours\" ";
$input = " &nbsp;<input type=\"radio\" name=\"unitfrequency\" value=\"604800\" id=\"frequency_semaine\" ";
$input = " &nbsp;<input type=\"radio\" name=\"unitfrequency\" value=\"2678400\" id=\"frequency_month\" ";
$priority = 0;
$maxrun = '';