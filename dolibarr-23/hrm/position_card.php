<?php

//dol_include_once('/hrm/position.php');
/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
// Get Parameters
$action = \GETPOST('action', 'aZ09') ? \GETPOST('action', 'aZ09') : 'view';
// The action 'add', 'create', 'edit', 'update', 'view', ...
$backtopage = \GETPOST('backtopage', 'alpha');
$backtopageforcancel = \GETPOST('backtopageforcancel', 'alpha');
$id = \GETPOSTINT('id');
// Initialize a technical objects
$form = new \Form($db);
$object = new \Position($db);
$res = $object->fetch($id);
// Permissions
$permissiontoread = $user->hasRight('hrm', 'all', 'read');
$permissiontoadd = $user->hasRight('hrm', 'all', 'write');
// Used by the include of actions_addupdatedelete.inc.php and actions_lineupdown.inc.php
$permissiontodelete = $user->hasRight('hrm', 'all', 'delete');
$permissiondellink = $user->hasRight('hrm', 'all', 'write');
// Used by the include of actions_dellink.inc.php
$upload_dir = $conf->hrm->multidir_output[isset($object->entity) ? $object->entity : 1] . '/position';
// Get parameters
$id = \GETPOSTINT('id');
$fk_job = \GETPOSTINT('fk_job');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'positioncard';
// To manage different context of search
$backtopage = \GETPOST('backtopage', 'alpha');
$backtopageforcancel = \GETPOST('backtopageforcancel', 'alpha');
//	$lineid   = GETPOST('lineid', 'int');
// Initialize a technical objects
//$object = new Position($db);
//$res = $object->fetch($id);
/*if ($res < 0) {
	dol_print_error($db, &$object->error);
}*/
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->hrm->dir_output . '/temp/massgeneration/' . $user->id;
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// Initialize array of search criteria
$search_all = \GETPOST("search_all", 'alpha');
$search = array();
// Must be 'include', not 'include_once'.
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$error = 0;
$backurlforlist = \dol_buildpath('/hrm/position_list.php', 1);
$triggermodname = 'HRM_POSITION_MODIFY';
// Actions to send emails
$triggersendname = 'HRM_POSITION_SENTBYMAIL';
$autocopy = 'MAIN_MAIL_AUTOCOPY_POSITION_TO';
$trackid = 'position' . $object->id;
/**
 * 		Show the card of a position
 *
 * 		@param	Position		 $object		  Position object
 * 		@return void
 */
function displayPositionCard(&$object)
{
}