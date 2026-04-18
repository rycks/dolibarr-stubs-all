<?php

/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
$year = \GETPOSTINT('year');
$WIDTH = \DolGraph::getDefaultGraphSizeForStats('width');
$HEIGHT = \DolGraph::getDefaultGraphSizeForStats('height');
$mesg = '';
$mode = '';
$stats = new \ExpeditionStats($db, $socid, $mode);
$data = $stats->getNbByMonth($year);
$filename = $conf->expedition->dir_temp . "/expedition" . $year . ".png";
$fileurl = \DOL_URL_ROOT . '/viewimage.php?modulepart=expeditionstats&file=expedition' . $year . '.png';
$px = new \DolGraph();
$mesg = $px->isGraphKo();