<?php

\define('CSRFCHECK_WITH_TOKEN', '1');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$choice = \GETPOST('choice', 'aZ09');
$nbsecondsold = \GETPOSTINT('nbsecondsold');
// Define filelog to discard it from purge
$filelog = '';
// Increase limit of time. Works only if we are not in safe mode
$ExecTimeLimit = \getDolGlobalInt('MAIN_ADMIN_TOOLS_PURGE_EXEC_TIME_LIMIT', 600);
$utils = new \Utils($db);
$result = $utils->purgeFiles($choice, $nbsecondsold);
$mesg = $utils->output;
$form = new \Form($db);
$filelogparam = $filelog;
$desc = $langs->trans("PurgeDeleteLogFile", '{filelogparam}');
$desc = \str_replace('{filelogparam}', $filelogparam, $desc);