<?php

\define('NOSTYLECHECK', '1');
$id = \GETPOSTINT('mailid') ? \GETPOSTINT('mailid') : \GETPOSTINT('id');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel', 'alpha');
$urlfrom = \GETPOST('urlfrom');
$projectid = \GETPOSTINT('projectid');
$backtopage = \GETPOST('backtopage');
$backtopageforcancel = \GETPOST('backtopageforcancel');
// Initialize a technical objects
$object = new \Mailing($db);
$extrafields = new \ExtraFields($db);
$ret = $object->fetchProject();
// Set $object->substitutionarrayfortest
$signature = !empty($user->signature) && !\getDolGlobalString('MAIN_MAIL_DO_NOT_USE_SIGN') ? $user->signature : '';
$targetobject = \null;
// Not defined with mass emailing
$parameters = array('mode' => 'emailing');
$substitutionarray = \FormMail::getAvailableSubstitKey('emailing', $targetobject);
// List of sending methods
$listofmethods = array();
$upload_dir = $conf->mailing->dir_output . "/" . \get_exdir($object->id, \getDolGlobalInt('MAILING_USE_NEW_PATH_FOR_FILES') ? 0 : 2, 0, 1, $object, 'mailing');
//$permissiontoread = $user->hasRight('maling', 'read');
$permissiontocreate = $user->hasRight('mailing', 'creer');
$permissiontovalidatesend = $user->hasRight('mailing', 'valider');
$permissiontodelete = $user->hasRight('mailing', 'supprimer');
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$error = 0;
$backurlforlist = \DOL_URL_ROOT . '/comm/mailing/list.php';
$mesgs = array();
/*
 * View
 */
$form = new \Form($db);
$htmlother = new \FormOther($db);
$formproject = \null;
$help_url = 'EN:Module_EMailing|FR:Module_Mailing|ES:M&oacute;dulo_Mailing';
$htmltext = '<i>' . $langs->trans("FollowingConstantsWillBeSubstituted") . ':<br><br><span class="small">';
$availablelink = '<span class="opacitymedium hideonsmartphone small">' . $form->textwithpicto($langs->trans("AvailableVariables"), $htmltext, 1, 'helpclickable', '', 0, 2, 'availvar') . '</span>';
$title = \GETPOST('title');
// Other attributes
$parameters = array();
$reshook = $hookmanager->executeHooks('formObjectOptions', $parameters, $object, $action);
$subject = \GETPOST('subject');
// Background color
/* if (getDolGlobalString('EMAILING_CAN_EDIT_BACKGROUND_COLOR')) {
		print '<tr class="fieldsforemail"><td>'.$langs->trans("BackgroundColorByDefault").'</td><td colspan="3">';
		print $htmlother->selectColor(GETPOST('bgcolor'), 'bgcolor', '', 0);
		print '</td></tr>';
	} */
$formmail = new \FormMail($db);
$out = '';
$showlinktolayout = $formmail->withfckeditor ? $formmail->withlayout : '';
$showlinktolayoutlabel = $langs->trans("FillMessageWithALayout");
$showlinktoai = $formmail->withaiprompt && \isModEnabled('ai') ? 'textgenerationemail' : '';
$showlinktoailabel = $langs->trans("FillMessageWithAIContent");
$formatforouput = 'html';
$htmlname = 'bodyemail';
$doleditor = new \DolEditor('bodyemail', \GETPOST('bodyemail', 'restricthtmlallowunvalid'), '', 600, 'dolibarr_mailings', '', \true, -1, \getDolGlobalInt('FCKEDITOR_ENABLE_MAILING'), 20, '100%');