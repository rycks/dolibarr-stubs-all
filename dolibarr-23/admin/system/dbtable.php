<?php

$table = \GETPOST('table', 'aZ09');
$field = \GETPOST('field', 'aZ09');
$action = \GETPOST('action', 'aZ09');
/*
 * Actions
 */
$logsql = '';
$resultsql = \true;
$sql = "SHOW FULL COLUMNS IN " . $db->sanitize($table);
$resql = $db->query($sql);
$sql = "SHOW FULL COLUMNS IN " . $db->sanitize($table);
$resql = $db->query($sql);
$linkback = '<a href="' . \DOL_URL_ROOT . '/admin/system/database-tables.php?restore_lastsearch_values=1">' . \img_picto($langs->trans("GoBack"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("GoBack") . '</span></a>';
// Define request to get table description
$base = 0;
$sql = \null;