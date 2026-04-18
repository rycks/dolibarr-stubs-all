<?php

$cancel = \GETPOST('cancel', 'alphanohtml');
// We click on a Cancel button
$confirm = \GETPOST('confirm');
$dirstandard = array();
$dirsmartphone = array();
$dirmenus = \array_merge(array("/core/menus/"), (array) $conf->modules_parts['menus']);
$action = \GETPOST('action', 'aZ09');
$menu = new \Menubase($db);
$menu_handler_top = \getDolGlobalString('MAIN_MENU_STANDARD');
$menu_handler_smartphone = \getDolGlobalString('MAIN_MENU_SMARTPHONE');
$menu_handler_top = \preg_replace('/_backoffice.php/i', '', $menu_handler_top);
$menu_handler_top = \preg_replace('/_frontoffice.php/i', '', $menu_handler_top);
$menu_handler_smartphone = \preg_replace('/_backoffice.php/i', '', $menu_handler_smartphone);
$menu_handler_smartphone = \preg_replace('/_frontoffice.php/i', '', $menu_handler_smartphone);
$menu_handler = $menu_handler_top;
$leftmenu = '';
$mainmenu = '';
$error = 0;
/*
 * View
 */
$form = new \Form($db);
$formadmin = new \FormAdmin($db);
// Id
$parent_rowid = \GETPOSTINT('menuId');
$parent_mainmenu = '';
$parent_leftmenu = '';
$parent_langs = '';
$parent_level = '';