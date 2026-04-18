<?php

$error = 0;
$trackid = \GETPOST('trackid', 'aZ09');
$listofpaths = array();
$listofnames = array();
$listofmimes = array();
$keytoavoidconflict = empty($trackid) ? '' : '-' . $trackid;
$formmail = new \FormMail($db);
// Set tmp user directory (used to convert images embedded as img src=data:image)
$vardir = $conf->user->dir_output . "/" . $user->id;
$upload_dir_tmp = $vardir . '/temp';
// TODO Add $keytoavoidconflict in upload_dir path
$subject = '';
//$actionmsg = '';
$actionmsg2 = '';
$thirdparty = \null;
$contact = \null;
$result = 0;
$sendtosocid = 0;