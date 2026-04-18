<?php

// Get parameters
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel');
$backtopage = \GETPOST('backtopage', 'alpha');
// Initialize a technical objects
$object = new \RecruitmentJobPosition($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->recruitment->dir_output . '/temp/massgeneration/' . $user->id;
$permissionnote = $user->hasRight('recruitment', 'recruitmentjobposition', 'write');
// Used by the include of actions_setnotes.inc.php
$permissiontoadd = $user->hasRight('recruitment', 'recruitmentjobposition', 'write');
// Used by the include of actions_addupdatedelete.inc.php
// Security check - Protection if external user
//if ($user->socid > 0) accessforbidden();
//if ($user->socid > 0) $socid = $user->socid;
$isdraft = $object->status == $object::STATUS_DRAFT ? 1 : 0;
$result = \restrictedArea($user, 'recruitment', $object->id, 'recruitment_recruitmentjobposition', 'recruitmentjobposition', '', 'rowid', $isdraft);
/*
 * Actions
 */
$reshook = $hookmanager->executeHooks('doActions', array(), $object, $action);
/*
 * View
 */
$form = new \Form($db);
$title = $object->ref . " - " . $langs->trans('Notes');
$help_url = '';
$head = \recruitmentjobpositionPrepareHead($object);
// Object card
$linkback = '<a href="' . \dol_buildpath('/recruitment/recruitmentjobposition_list.php', 1) . '?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
$cssclass = "titlefield";