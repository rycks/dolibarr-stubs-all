<?php

/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
$year = \GETPOSTINT("year");
$socid = \GETPOSTINT("socid");
$userid = \GETPOSTINT("userid");
$result = \restrictedArea($user, 'reception', 0, '');
$WIDTH = \DolGraph::getDefaultGraphSizeForStats('width');
$HEIGHT = \DolGraph::getDefaultGraphSizeForStats('height');
$mesg = '';
$stats = new \ReceptionStats($db, $socid, '', $userid > 0 ? $userid : 0);
$data = $stats->getNbByMonth($year);
$filename = $conf->reception->dir_temp . "/reception" . $year . ".png";
$fileurl = \DOL_URL_ROOT . '/viewimage.php?modulepart=receptionstats&file=reception' . $year . '.png';
$px = new \DolGraph();
$mesg = $px->isGraphKo();