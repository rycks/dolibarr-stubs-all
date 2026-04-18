<?php

$WIDTH = \DolGraph::getDefaultGraphSizeForStats('width');
$HEIGHT = \DolGraph::getDefaultGraphSizeForStats('height');
// Get parameters
$id = \GETPOSTINT('id');
$msg_id = \GETPOSTINT('msg_id');
$action = \GETPOST('action', 'aZ09');
$socid = 0;
$userid = $user->id;
$nowarray = \dol_getdate(\dol_now(), \true);
$nowyear = $nowarray['year'];
$year = \GETPOSTINT('year') > 0 ? \GETPOSTINT('year') : $nowyear;
$startyear = $year - (!\getDolGlobalString('MAIN_STATS_GRAPHS_SHOW_N_YEARS') ? 2 : \max(1, \min(10, \getDolGlobalString('MAIN_STATS_GRAPHS_SHOW_N_YEARS'))));
$endyear = $year;
// Initialize objects
$object = new \Ticket($db);
$max = \getDolGlobalInt('MAIN_SIZE_SHORTLIST_LIMIT', 5);
/*
 * Actions
 */
// None
/*
 * View
 */
$resultboxes = \FormOther::getBoxesArea($user, "11");
// Load $resultboxes (selectboxlist + boxactivated + boxlista + boxlistb)
$help_url = '';
$linkback = '';
$dir = '';
$prefix = '';
$filenamenb = $dir . "/" . $prefix . "ticketinyear-" . $endyear . ".png";
$fileurlnb = \DOL_URL_ROOT . '/viewimage.php?modulepart=ticket&amp;file=ticketinyear-' . $endyear . '.png';
$stats = new \TicketStats($db, $socid, $userid);
$param_year = 'DOLUSERCOOKIE_ticket_by_status_year';
$param_shownb = 'DOLUSERCOOKIE_ticket_by_status_shownb';
$param_showtot = 'DOLUSERCOOKIE_ticket_by_status_showtot';
$autosetarray = \preg_split("/[,;:]+/", \GETPOST('DOL_AUTOSET_COOKIE'));
$showtot = 0;
$shownb = 0;
$startyear = $endyear - 1;
// Change default WIDTH and HEIGHT (we need a smaller than default for both desktop and smartphone)
$WIDTH = $shownb && $showtot || !empty($conf->dol_optimize_smallscreen) ? '100%' : '80%';
/*
 * Statistics area
 */
$tick = array('unread' => 0, 'read' => 0, 'needmoreinfo' => 0, 'answered' => 0, 'assigned' => 0, 'inprogress' => 0, 'waiting' => 0, 'closed' => 0, 'canceled' => 0, 'deleted' => 0);
$sql = "SELECT t.fk_statut, COUNT(t.fk_statut) as nb";
$dataseries = array();
$result = $db->query($sql);
// This define $badgeStatusX
$colorseries = array();
$stringtoshow = '<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery("#idsubimgDOLUSERCOOKIE_ticket_by_status").click(function() {
            jQuery("#idfilterDOLUSERCOOKIE_ticket_by_status").toggle();
        });
    });
    </script>';
// don't display graph if no series
$totalnb = 0;
/*
 * Latest unread tickets
 */
$sql = "SELECT t.rowid, t.ref, t.track_id, t.datec, t.subject, t.type_code, t.category_code, t.severity_code, t.fk_statut as status, t.progress,";
//print $sql;
$result = $db->query($sql);
$parameters = array('user' => $user);
$reshook = $hookmanager->executeHooks('dashboardTickets', $parameters, $object);