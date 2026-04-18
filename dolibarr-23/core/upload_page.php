<?php

$action = \GETPOST('action', 'aZ09');
$modulepart = \GETPOST('modulepart', 'aZ09');
$upload_dir = $conf->admin->dir_temp . '/import';
$error = 0;
$arrayobject = \getElementProperties($modulepart);
$module = $arrayobject['module'];
$element = $arrayobject['element'];
$dir_output = $arrayobject['dir_output'];
$dir_temp = $arrayobject['dir_temp'];
$permlevel1 = 'read';
$permlevel2 = '';
$fileprefix = 'unknown';
$forceFullTextIndexation = '0';
/*
 * View
 */
$form = new \Form($db);
// Important: Following code is to avoid page request by browser and PHP CPU at each Dolibarr page access.
/*
if (empty($dolibarr_nocache) && GETPOSTINT('cache')) {
	header('Cache-Control: max-age='.GETPOSTINT('cache').', public');
	// For a .php, we must set an Expires to avoid to have it forced to an expired value by the web server
	header('Expires: '.gmdate('D, d M Y H:i:s', dol_now('gmt') + GETPOSTINT('cache')).' GMT');
	// HTTP/1.0
	header('Pragma: token=public');
} else {
	// HTTP/1.0
	header('Cache-Control: no-cache');
}
*/
$title = $langs->trans("UploadFile");
$help_url = '';
$arrayofjs = array();
$arrayofcss = array();
// Define $uploadform
$uploadform = '';
$uploadform = '<div class="display-flex">';
// Execute hook printSearchForm
$parameters = array('uploadform' => $uploadform);
$reshook = $hookmanager->executeHooks('printUploadForm', $parameters);
$accept = '.pdf,image/*';
$disablemulti = 1;
$perm = 1;
$capture = 1;
$maxfilesizearray = \getMaxFileSizeArray();
$max = $maxfilesizearray['max'];
$maxmin = $maxfilesizearray['maxmin'];
$maxphptoshow = $maxfilesizearray['maxphptoshow'];
$maxphptoshowparam = $maxfilesizearray['maxphptoshowparam'];
$out = '';