<?php

$action = \GETPOST('action', 'aZ09');
$error = 0;
$res1 = \dolibarr_set_const($db, "GEOIP_VERSION", \GETPOST('geoipversion', 'aZ09'), 'chaine', 0, '', $conf->entity);
$documenturl = \getDolGlobalString('DOL_URL_ROOT_DOCUMENT_PHP', \DOL_URL_ROOT . '/document.php');
/*
 * View
 */
$form = new \Form($db);
$formfile = new \FormFile($db);
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$version = '';
$geoip = '';
$arrayofvalues = array('php' => 'Native PHP functions', '1' => 'Embedded GeoIP v1', '2' => 'Embedded GeoIP v2');
$gimcdf = \getDolGlobalString('GEOIPMAXMIND_COUNTRY_DATAFILE');
$url1 = 'http://www.maxmind.com/en/city?rId=awstats';
$textoshow = $langs->trans("YouCanDownloadFreeDatFileTo", '{s1}');
$textoshow = \str_replace('{s1}', '<a href="' . $url1 . '" target="_blank" rel="noopener noreferrer external">' . $url1 . '</a>', $textoshow);
$url2 = 'http://www.maxmind.com/en/city?rId=awstats';
$textoshow = $langs->trans("YouCanDownloadAdvancedDatFileTo", '{s1}');
$textoshow = \str_replace('{s1}', '<a href="' . $url2 . '" target="_blank" rel="noopener noreferrer external">' . $url2 . '</a>', $textoshow);
$ip = '24.24.24.24';
$result = \dol_print_ip($ip, 1);
$ip = '2a01:e0a:7e:4a60:429a:23ff:f7b8:dc8a';
$result = \dol_print_ip($ip, 1);
/* We disable this test because dol_print_ip need an ip as input
	$ip='www.google.com';
	print '<br>'.$ip.' -> ';
	$result=dol_print_ip($ip,1);
	if ($result) print $result;
	else print $langs->trans("Error");
	*/
//var_dump($_SERVER);
$ip = \getUserRemoteIP();
//$ip='91.161.249.43';
$isip = \is_ip($ip);
$ip = \GETPOST("iptotest");