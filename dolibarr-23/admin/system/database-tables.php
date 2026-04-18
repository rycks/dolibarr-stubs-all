<?php

\define('CSRFCHECK_WITH_TOKEN', '1');
$table = \GETPOST('table', 'aZ09');
$action = \GETPOST('action', 'aZ09');
/*
 * Actions
 */
$logsql = '';
$resultsql = \true;
$collation = 'utf8_unicode_ci';
$defaultcollation = $db->getDefaultCollationDatabase();
$sql = "ALTER TABLE " . $db->sanitize($table) . " CHARACTER SET utf8 COLLATE " . $db->sanitize($collation);
$resql1 = $db->query($sql);
$collation = 'utf8mb4_unicode_ci';
$defaultcollation = $db->getDefaultCollationDatabase();
$sql = "ALTER TABLE " . $db->sanitize($table) . " CHARACTER SET utf8mb4 COLLATE " . $db->sanitize($collation);
$resql1 = $db->query($sql);
$linkback = '<a href="' . \DOL_URL_ROOT . '/admin/system/database.php?restore_lastsearch_values=1">' . \img_picto($langs->trans("GoBack"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("GoBack") . '</span></a>';
// Define request to get table description
$base = 0;