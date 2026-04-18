<?php

$action = \GETPOST('action', 'aZ09');
$modulepart = \GETPOST('modulepart', 'aZ09');
$upload_dir = $conf->admin->dir_temp . '/import';
// Delete the temporary files that are used when uploading files
//dol_delete_file($upload_dir.'/upload_page-by'.$user->id.'-*');
$file = \GETPOST('file');
$reg = array();
$modulepart = $reg[2];
/*
 * Actions
 */
//
/*
 * View
 */
//$form = new Form($db);
$title = $langs->trans("UploadFile");
$help_url = '';
$arrayofjs = array();
$arrayofcss = array();