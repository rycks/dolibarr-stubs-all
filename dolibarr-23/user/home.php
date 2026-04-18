<?php

/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'userhome';
$permissiontoreadgroup = \true;
// Security check (for external users)
$socid = 0;
$companystatic = new \Societe($db);
$fuserstatic = new \User($db);
// Load $resultboxes (selectboxlist + boxactivated + boxlista + boxlistb)
$resultboxes = \FormOther::getBoxesArea($user, "1");
$zone = \GETPOSTINT('areacode');
$userid = \GETPOSTINT('userid');
$boxorder = \GETPOST('boxorder', 'aZ09');
$result = \InfoBox::saveboxorder($db, $zone, $boxorder, $userid);
$max = \getDolGlobalInt('MAIN_SIZE_SHORTLIST_LIMIT', 5);
/*
 * View
 */
$title = $langs->trans("MenuUsersAndGroups");
$help_url = '';
// Search User
$searchbox = '<form method="post" action="' . \DOL_URL_ROOT . '/core/search.php">';
/*
 * Latest created users
 */
$lastcreatedbox = '';
$sql = "SELECT DISTINCT u.rowid, u.lastname, u.firstname, u.admin, u.login, u.fk_soc, u.datec, u.statut";
// Add fields from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printUserListWhere', $parameters);
$resql = $db->query($sql);
/*
 * Last groups created
 */
$lastgroupbox = '';
$sql = "SELECT g.rowid, g.nom as name, g.note, g.entity, g.datec";
$resql = $db->query($sql);
$boxlist = '<div class="twocolumns">';
// Initialize a technical object to manage hooks. Note that conf->hooks_modules contains array
$parameters = array('user' => $user);
$reshook = $hookmanager->executeHooks('dashboardUsersGroups', $parameters, $object);