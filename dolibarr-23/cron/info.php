<?php

$id = \GETPOSTINT('id');
$object = new \Cronjob($db);
/*
 * View
 */
$form = new \Form($db);
$head = \cron_prepare_head($object);
$linkback = '<a href="' . \DOL_URL_ROOT . '/cron/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';