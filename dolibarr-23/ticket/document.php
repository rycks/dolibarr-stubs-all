<?php

$id = \GETPOSTINT('id');
$socid = \GETPOSTINT('socid');
$ref = \GETPOST('ref', 'alpha');
$track_id = \GETPOST('track_id', 'alpha');
$action = \GETPOST('action', 'alpha');
$confirm = \GETPOST('confirm', 'alpha');
// Store current page url
$url_page_current = \DOL_URL_ROOT . '/ticket/document.php';
// Get parameters
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$object = new \Ticket($db);
$result = $object->fetch($id, $ref, $track_id);
$upload_dir = \null;
// Security check - Protection if external user
$result = \restrictedArea($user, 'ticket', $object->id);
$permissiontoadd = $user->hasRight('ticket', 'write');
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$help_url = '';
$head = \ticket_prepare_head($object);
$morehtmlref = '<div class="refidno">';
$linkback = '<a href="' . \dol_buildpath('/ticket/list.php', 1) . '"><strong>' . $langs->trans("BackToList") . '</strong></a> ';
// Build file list
$filearray = \dol_dir_list($upload_dir, "files", 0, '', '\\.meta$', $sortfield, \strtolower($sortorder) == 'desc' ? \SORT_DESC : \SORT_ASC, 1);
// same as above for every messages
/* disabled. Too many bugs. All file of a ticket must be stored into ticket. File must be linked to an event by column agenda_id into llx_ecmfiles.
	$sql = 'SELECT id FROM '.MAIN_DB_PREFIX.'actioncomm';
	$sql .= " WHERE fk_element = ".(int) $object->id." AND elementtype = 'ticket'";
	$resql = $db->query($sql);
	if ($resql) {
		$file_msg_array = array();
		$numrows = $db->num_rows($resql);
		for ($i=0; $i < $numrows; $i++) {
			$upload_msg_dir = $conf->agenda->dir_output.'/'.$db->fetch_row($resql)[0];
			$file_msg = dol_dir_list($upload_msg_dir, "files", 0, '', '\.meta$', $sortfield, (strtolower($sortorder) == 'desc' ? SORT_DESC : SORT_ASC), 1);
			if (count($file_msg)) {
				// add specific module part and user rights for delete
				foreach ($file_msg as $key => $file) {
					$file_msg[$key]['modulepart'] = 'actions';
					$file_msg[$key]['relativepath'] = $file['level1name'].'/'; // directory without file name
					$file_msg[$key]['permtoedit'] = 0;
					$file_msg[$key]['permonobject'] = 0;
				}
				$file_msg_array = array_merge($file_msg, $file_msg_array);
			}
		}
		if (count($file_msg_array)) {
			$filearray = array_merge($filearray, $file_msg_array);
		}
	}
	*/
$totalsize = 0;
//$object->ref = $object->track_id;	// For compatibility we use track ID for directory
$modulepart = 'ticket';
$permissiontoadd = $user->hasRight('ticket', 'write');
$permtoedit = $user->hasRight('ticket', 'write');
$param = '&id=' . $object->id;