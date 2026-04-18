<?php

// Mass actions. Controls on number of lines checked.
$maxformassaction = \getDolGlobalInt('MAIN_LIMIT_FOR_MASS_ACTIONS', 1000);
$resaction = '';
$nbsent = 0;
$nbignored = 0;
$listofobjectid = array();
$listofobjectthirdparties = array();
$listofobjectcontacts = array();
$listofobjectref = array();
$contactidtosend = array();
$attachedfilesThirdpartyObj = array();
$oneemailperrecipient = \GETPOSTINT('oneemailperrecipient') ? 1 : 0;
$thirdparty = \null;
$receiver = \GETPOST('receiver', 'alphawithlgt');
$nbok = 0;
$orders = \GETPOST('toselect', 'array:int');
$objecttmp = new $objectclass($db);
$listofobjectid = array();
$listofobjectthirdparties = array();
$listofobjectref = array();
$arrayofinclusion = array();
$parameters = array('listofobjectref' => $listofobjectref, 'arrayofinclusion' => &$arrayofinclusion);
$reshook = $hookmanager->executeHooks('updateSearchRegexToMergeDoc', $parameters, $object, $action);
$listoffiles = \dol_dir_list($uploaddir, 'all', 1, $arrayofinclusion, '\\.meta$|\\.png$', 'date', \SORT_DESC, 0, 1);
// build list of files with full path
$files = array();
// Define output language (Here it is not used because we do only merging existing PDF)
$outputlangs = $langs;
$newlang = '';
$upload_dir = $diroutputmassaction;
$file = $upload_dir . '/' . \GETPOST('file');
$ret = \dol_delete_file($file);
$action = '';
$objecttmp = new $objectclass($db);
$objecttmp = new $objectclass($db);
$nbok = 0;
$nbignored = 0;
$TMsg = array();
//$toselect could contain duplicate entries, cf https://github.com/Dolibarr/dolibarr/issues/26244
$unique_arr = \array_unique($toselect);
$nbok = 0;
$objecttmp = new $objectclass($db);
$nbok = 0;
$affecttag_type = \GETPOST('affecttag_type', 'alpha');
$nbok = 0;
$nbok = 0;
$supervisortoset = \GETPOSTINT('supervisortoset');
$nbok = 0;
$usertoaffect = \GETPOSTINT('usertoaffect');
$projectrole = \GETPOST('projectrole');
$tasksrole = \GETPOST('tasksrole');
$objecttmp = new $objectclass($db);
$nbok = 0;
$objecttmp = new $objectclass($db);
$nbok = 0;
$objecttmp = new $objectclass($db);
$e = new \ExtraFields($db);
$nbok = 0;
$extrafieldKeyToUpdate = \GETPOST('extrafield-key-to-update');
$objecttmp = new $objectclass($db);
$nbok = 0;
$objecttmp = new $objectclass($db);
$nbok = 0;
$objecttmp = new $objectclass($db);
$nbok = 0;
$objecttmp = new $objectclass($db);
$nbok = 0;
$typeholiday = \GETPOSTINT('typeholiday');
$nbdaysholidays = \GETPOSTFLOAT('nbdaysholidays');
// Test on permission not required here, done later
$num = 0;
$origin_task = new \Task($db);
$clone_task = new \Task($db);
$newproject = new \Project($db);
// Check if current user is contact of the new project (necessary only if project is not public)
$iscontactofnewproject = 0;
// Check permission on new project
$permisstiontoadd = \false;
// @phan-suppress-next-line PhanTypeMismatchArgumentNullable
$reshook = $hookmanager->executeHooks('doMassActions', $parameters, $object, $action);