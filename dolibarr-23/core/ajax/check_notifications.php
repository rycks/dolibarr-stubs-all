<?php

\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define('NOREQUIRESOC', '1');
\define('NOREQUIRETRAN', '1');
/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
//$time = (int) GETPOST('time', 'int'); // Use the time parameter that is always increased by time_update, even if call is late
$action = \GETPOST('action', 'aZ09');
$time = \dol_now();
$listofreminderids = \GETPOST('listofreminderids', 'aZ09');
$listofreminderid = \GETPOST('listofreminderids', 'intcomma');
// Set the reminder as done
$sql = 'UPDATE ' . \MAIN_DB_PREFIX . 'actioncomm_reminder SET status = 1';
$resql = $db->query($sql);
// Clean database
$sql = 'DELETE FROM ' . \MAIN_DB_PREFIX . 'actioncomm_reminder';
$resql = $db->query($sql);
$eventfound = array();
$sql = 'SELECT a.id as id_agenda, a.code, a.datep, a.label, a.location, ar.rowid as id_reminder, ar.dateremind, ar.fk_user as id_user_reminder';
// Avoid too many notification at once
$resql = $db->query($sql);