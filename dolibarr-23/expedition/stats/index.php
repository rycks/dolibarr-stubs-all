<?php

/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
$WIDTH = \DolGraph::getDefaultGraphSizeForStats('width');
$HEIGHT = \DolGraph::getDefaultGraphSizeForStats('height');
$userid = \GETPOSTINT('userid');
$socid = \GETPOSTINT('socid');
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$nowyear = (int) \dol_print_date(\dol_now(), "%Y");
$year = \GETPOSTINT('year') > 0 ? \GETPOSTINT('year') : $nowyear;
$startyear = $year - (!\getDolGlobalInt('MAIN_STATS_GRAPHS_SHOW_N_YEARS') ? 2 : \max(1, \min(10, \getDolGlobalInt('MAIN_STATS_GRAPHS_SHOW_N_YEARS'))));
$endyear = $year;
/*
 * View
 */
$form = new \Form($db);
$dir = !empty($conf->expedition->multidir_temp[$conf->entity]) ? $conf->expedition->multidir_temp[$conf->entity] : $conf->service->multidir_temp[$conf->entity];
$stats = new \ExpeditionStats($db, $socid, '', $userid > 0 ? $userid : 0);
// Build graphic number of object
$data = $stats->getNbByMonthWithPrevYear($endyear, $startyear);
$px1 = new \DolGraph();
$mesg = $px1->isGraphKo();
$fileurlnb = '';
// Build graphic amount of object
/*
$data = $stats->getAmountByMonthWithPrevYear($endyear,$startyear);
//var_dump($data);
// $data = array(array('Lib',val1,val2,val3),...)

if (empty($user->rights->societe->client->voir) || $user->socid)
{
	$filenameamount = $dir.'/shipmentsamountinyear-'.$user->id.'-'.$year.'.png';
}
else
{
	$filenameamount = $dir.'/shipmentsamountinyear-'.$year.'.png';
}

$px2 = new DolGraph();
$mesg = $px2->isGraphKo();
if (! $mesg)
{
	$px2->SetData($data);
	$i=$startyear;$legend=array();
	while ($i <= $endyear)
	{
		$legend[]=$i;
		$i++;
	}
	$px2->SetLegend($legend);
	$px2->SetMaxValue($px2->GetCeilMaxValue());
	$px2->SetMinValue(min(0,$px2->GetFloorMinValue()));
	$px2->SetWidth($WIDTH);
	$px2->SetHeight($HEIGHT);
	$px2->SetYLabel($langs->trans("AmountOfShipments"));
	$px2->SetShading(3);
	$px2->SetHorizTickIncrement(1);
	$px2->mode='depth';
	$px2->SetTitle($langs->trans("AmountOfShipmentsByMonthHT"));

	$px2->draw($filenameamount,$fileurlamount);
}
*/
/*
$data = $stats->getAverageByMonthWithPrevYear($endyear, $startyear);

if (empty($user->rights->societe->client->voir) || $user->socid)
{
	$filename_avg = $dir.'/shipmentsaverage-'.$user->id.'-'.$year.'.png';
}
else
{
	$filename_avg = $dir.'/shipmentsaverage-'.$year.'.png';
}

$px3 = new DolGraph();
$mesg = $px3->isGraphKo();
if (! $mesg)
{
	$px3->SetData($data);
	$i=$startyear;$legend=array();
	while ($i <= $endyear)
	{
		$legend[]=$i;
		$i++;
	}
	$px3->SetLegend($legend);
	$px3->SetYLabel($langs->trans("AmountAverage"));
	$px3->SetMaxValue($px3->GetCeilMaxValue());
	$px3->SetMinValue($px3->GetFloorMinValue());
	$px3->SetWidth($WIDTH);
	$px3->SetHeight($HEIGHT);
	$px3->SetShading(3);
	$px3->SetHorizTickIncrement(1);
	$px3->mode='depth';
	$px3->SetTitle($langs->trans("AmountAverage"));

	$px3->draw($filename_avg,$fileurl_avg);
}
*/
// Show array
$data = $stats->getAllByYear();
$arrayyears = array();
$h = 0;
$head = array();
$type = 'shipment_stats';
$oldyear = 0;