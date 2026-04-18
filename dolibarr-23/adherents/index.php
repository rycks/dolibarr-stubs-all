<?php

$hookmanager = new \HookManager($db);
// Security check
$result = \restrictedArea($user, 'adherent');
/*
 * Actions
 */
$userid = \GETPOSTINT('userid');
$zone = \GETPOSTINT('areacode');
$boxorder = \GETPOST('boxorder', 'aZ09');
$result = \InfoBox::saveboxorder($db, $zone, $boxorder, $userid);
/*
 * View
 */
$form = new \Form($db);
// Load $resultboxes (selectboxlist + boxactivated + boxlista + boxlistb)
$resultboxes = \FormOther::getBoxesArea($user, "2");
$title = $langs->trans("Members");
$help_url = 'EN:Module_Foundations|FR:Module_Adh&eacute;rents|ES:M&oacute;dulo_Miembros|DE:Modul_Mitglieder';
$staticmember = new \Adherent($db);
$statictype = new \AdherentType($db);
$subscriptionstatic = new \Subscription($db);
/*
 * Statistics
 */
$boxgraph = '';
$year = \idate('Y');
$numberyears = \getDolGlobalInt("MAIN_NB_OF_YEAR_IN_MEMBERSHIP_WIDGET_GRAPH");
$stats = new \AdherentStats($db, 0, $userid);
// Show array
$sumMembers = $stats->countMembersByTypeAndStatus($numberyears);
$dataseries = [
    [$langs->transnoentitiesnoconv("MembersStatusToValid"), $sumMembers['total']['members_draft']],
    // Draft, not yet validated
    [$langs->transnoentitiesnoconv("WaitingSubscription"), $sumMembers['total']['members_pending']],
    [$langs->transnoentitiesnoconv("UpToDate"), $sumMembers['total']['members_uptodate']],
    [$langs->transnoentitiesnoconv("OutOfDate"), $sumMembers['total']['members_expired']],
    [$langs->transnoentitiesnoconv("MembersStatusExcluded"), $sumMembers['total']['members_excluded']],
    [$langs->transnoentitiesnoconv("MembersStatusResiliated"), $sumMembers['total']['members_resiliated']],
];
$dolgraph = new \DolGraph();
$parameters = array('user' => $user);
$reshook = $hookmanager->executeHooks('dashboardMembers', $parameters, $object);