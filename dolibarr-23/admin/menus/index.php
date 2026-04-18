<?php

$dirstandard = array();
$dirsmartphone = array();
$dirmenus = \array_merge(array("/core/menus/"), (array) $conf->modules_parts['menus']);
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
//$menu_handler_top = getDolGlobalString('MAIN_MENU_STANDARD');
$menu_handler_top = 'all';
$menu_handler_top = \preg_replace('/(_backoffice\\.php|_menu\\.php)/i', '', $menu_handler_top);
$menu_handler_top = \preg_replace('/(_frontoffice\\.php|_menu\\.php)/i', '', $menu_handler_top);
$menu_handler = $menu_handler_top;
$menu_handler_to_search = \preg_replace('/(_backoffice|_frontoffice|_menu)?(\\.php)?/i', '', $menu_handler);
/*
 * View
 */
$form = new \Form($db);
$formadmin = new \FormAdmin($db);
$arrayofjs = array('/includes/jquery/plugins/jquerytreeview/jquery.treeview.js', '/includes/jquery/plugins/jquerytreeview/lib/jquery.cookie.js');
$arrayofcss = array('/includes/jquery/plugins/jquerytreeview/jquery.treeview.css');
$h = 0;
$head = array();
$newcardbutton = '';
// MENU TREE
/*-------------------- MAIN -----------------------
Array of the menu tree:
- Is an array in with 2 dimensions.
- A single line represents an item : data[$x]
- Each line has 3 data items:
  - The index of the item;
  - The index of the item's parent;
  - The string to show
i.e.: data[]= array (index, parent index, string )
*/
// First the root item of the tree must be declared:
$data = array();
// Then all child items must be declared
$sql = "SELECT m.rowid, m.titre, m.langs, m.mainmenu, m.leftmenu, m.fk_menu, m.fk_mainmenu, m.fk_leftmenu, m.position, m.module";
// Order is position then rowid (because we need a sort criteria when position is same)
$res = $db->query($sql);
// Process remaining records (records that are not linked to root by any path)
$remainingdata = array();