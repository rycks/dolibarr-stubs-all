<?php

// Get Parameters
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'skillcard';
// To manage different context of search
$backtopage = \GETPOST('backtopage', 'alpha');
$backtopageforcancel = \GETPOST('backtopageforcancel', 'alpha');
$id = \GETPOSTINT('id');
$TSkillsToAdd = \GETPOST('fk_skill', 'array');
$objecttype = \GETPOST('objecttype', 'alpha');
$TNote = \GETPOST('TNote', 'array');
$lineid = \GETPOSTINT('lineid');
$TAuthorizedObjects = array('job', 'user');
$skill = new \SkillRank($db);
// Permissions
$permissiontoread = $user->hasRight('hrm', 'all', 'read');
$permissiontoadd = $user->hasRight('hrm', 'all', 'write');
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$error = 0;
$backurlforlist = \DOL_URL_ROOT . '/hrm/skill_list.php';
/*
 * View
 */
$form = new \Form($db);
$formfile = new \FormFile($db);
$formproject = new \FormProjets($db);
$title = $langs->trans("RequiredSkills");
$help_url = '';
$listLink = '';
$res = $object->fetch_optionals();
$formconfirm = '';
// Clone confirmation
/*if ($action == 'clone' && $permissiontoadd) {
		// Create an array for form
		$formquestion = array();
		$formconfirm = $form->formconfirm($_SERVER["PHP_SELF"].'?id='.$object->id, $langs->trans('ToClone'), $langs->trans('ConfirmCloneAsk', $object->ref), 'confirm_clone', $formquestion, 'yes', 1);
	}*/
// Call Hook formConfirm
$parameters = array('formConfirm' => $formconfirm, 'lineid' => $lineid);
$reshook = $hookmanager->executeHooks('formConfirm', $parameters, $object, $action);
// Get all available skills
$static_skill = new \Skill($db);
$TAllSkills = $static_skill->fetchAll();
// Array format for multiselectarray function
$TAllSkillsFormatted = array();
// table of skillRank linked to current object
//$TSkillsJob = $skill->fetchAll('ASC', 't.rowid', 0, 0);
$sql_skill = "SELECT sr.fk_object, sr.rowid, s.label,s.skill_type, sr.rankorder, sr.fk_skill";
$result = $db->query($sql_skill);
$numSkills = $db->num_rows($result);
$TSkillsJob = array();
$TAlreadyUsedSkill = array();