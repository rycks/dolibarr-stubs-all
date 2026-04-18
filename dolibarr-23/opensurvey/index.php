<?php

$hookmanager = new \HookManager($db);
/*
 * View
 */
$nbsondages = 0;
$sql = 'SELECT COUNT(*) as nb';
$resql = $db->query($sql);
$title = $langs->trans("OpenSurveyArea");
$parameters = array('user' => $user);
$reshook = $hookmanager->executeHooks('dashboardOpenSurvey', $parameters, $object);