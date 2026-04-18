<?php

$upload_dir = \null;
$keyforuploaddir = \GETPOST('keyforuploaddir', 'aZ09');
$listofdir = \explode(',', \preg_replace('/[\\r\\n]+/', ',', \trim(\getDolGlobalString($keyforuploaddir))));
$filetodelete = $tmpdir . '/' . \GETPOST('file');
$result = \dol_delete_file($filetodelete);