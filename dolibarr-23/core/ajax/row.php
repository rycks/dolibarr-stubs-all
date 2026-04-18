<?php

\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define('NOREQUIRESOC', '1');
\define('NOREQUIRETRAN', '1');
$roworder = \GETPOST('roworder', 'alpha', 3);
$table_element_line = \GETPOST('table_element_line', 'aZ09', 3);
$fk_element = \GETPOST('fk_element', 'aZ09', 3);
$element_id = \GETPOSTINT('element_id', 3);
$action = 'edit';
// Make test on permission
$perm = 0;
// Overwrite $perm by hook
$parameters = array('roworder' => &$roworder, 'table_element_line' => &$table_element_line, 'fk_element' => &$fk_element, 'element_id' => &$element_id, 'perm' => &$perm);
$row = new \GenericObject($db);
$reshook = $hookmanager->executeHooks('checkRowPerms', $parameters, $row, $action);
$rowordertab = \explode(',', $roworder);
$newrowordertab = array();