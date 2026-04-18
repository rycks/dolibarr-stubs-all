<?php

// Security check (for external users)
$socid = 0;
$optioncss = \GETPOST('optioncss', 'alpha');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'userlist';
// To manage different context of search
$mode = \GETPOST("mode", 'alpha');
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$search_status = \GETPOST('search_status', 'intcomma');
$search_employee = -1;
$userstatic = new \User($db);
// Define value to know what current user can do on users
$permissiontoadd = !empty($user->admin) || $user->hasRight("user", "user", "write");
$childids = $user->getAllChildIds(1);
/*
 * View
 */
$form = new \Form($db);
$help_url = 'EN:Module_Users|FR:Module_Utilisateurs|ES:M&oacute;dulo_Usuarios|DE:Modul_Benutzer';
$arrayofjs = array('/includes/jquery/plugins/jquerytreeview/jquery.treeview.js', '/includes/jquery/plugins/jquerytreeview/lib/jquery.cookie.js');
$arrayofcss = array('/includes/jquery/plugins/jquerytreeview/jquery.treeview.css');
$filters = [];
$sqlfilter = '';
// Load hierarchy of users
$user_arbo_all = $userstatic->get_full_tree(0, '');
// Count total nb of records
$nbtotalofrecords = \count($user_arbo);