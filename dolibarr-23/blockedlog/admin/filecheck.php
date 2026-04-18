<?php

$mode = \GETPOST('mode', 'aZ09');
$error = 0;
$htmltooltip = '';
// Modified or missing files
$file_list = array('missing' => array(), 'updated' => array());
// Local file to compare to
$xmlshortfile = \dol_sanitizeFileName(\GETPOST('xmlshortfile', 'alpha') ? \GETPOST('xmlshortfile', 'alpha') : 'filelist-' . \DOL_VERSION . \getDolGlobalString('MAIN_FILECHECK_LOCAL_SUFFIX') . '.xml' . \getDolGlobalString('MAIN_FILECHECK_LOCAL_EXT'));
$xmlfile = \DOL_DOCUMENT_ROOT . '/install/' . $xmlshortfile;
// Remote file to compare to
$xmlremote = \GETPOST('xmlremote', 'alphanohtml');
$param = 'MAIN_FILECHECK_URL_' . \DOL_VERSION;
// Test if remote test is ok
$enableremotecheck = \true;
$xmlarray = \getURLContent($xmlremote, 'GET', '', 1, array(), array('http', 'https'), 0);
$checksumconcat = array();
$file_list = array();
$out = '';
$algo = (string) $xml['algo'];
$onlymodifiedorremoved = 0;
// Sort list of checksum
$checksumget = \hash($algo, \implode(',', $checksumconcat));
$resultcomment = '';
$outexpectedchecksum = $checksumtoget ? $checksumtoget : $langs->trans("Unknown");
$outcurrentchecksumtext = '';
$outforlistoffiles = '';