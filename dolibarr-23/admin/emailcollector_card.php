<?php

// Get parameters
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel', 'alpha');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'emailcollectorcard';
// To manage different context of search
$backtopage = \GETPOST('backtopage', 'alpha');
$operationid = \GETPOSTINT('operationid');
// Initialize a technical objects
$object = new \EmailCollector($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->emailcollector->dir_output . '/temp/massgeneration/' . $user->id;
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// Initialize array of search criteria
$search_all = \GETPOST("search_all", 'alpha');
$search = array();
// Must be 'include', not 'include_once'.
// Security check - Protection if external user
//if ($user->socid > 0) accessforbidden();
//if ($user->socid > 0) $socid = $user->socid;
//$isdraft = (($object->statut == MyObject::STATUS_DRAFT) ? 1 : 0);
//restrictedArea($user, 'mymodule', $object->id, '', '', 'fk_soc', 'rowid', $isdraft);
$permissionnote = $user->admin;
// Used by the include of actions_setnotes.inc.php
$permissiondellink = $user->admin;
// Used by the include of actions_dellink.inc.php
$permissiontoadd = $user->admin;
// Used by the include of actions_addupdatedelete.inc.php and actions_lineupdown.inc.php
$debuginfo = '';
$error = 0;
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$permissiontoadd = 1;
$permissiontodelete = 1;
$backurlforlist = \DOL_URL_ROOT . '/admin/emailcollector_list.php';
$emailcollectorfilter = new \EmailCollectorFilter($db);
$result = $emailcollectorfilter->create($user);
$emailcollectorfilter = new \EmailCollectorFilter($db);
$emailcollectoroperation = new \EmailCollectorAction($db);
$emailcollectoroperation = new \EmailCollectorAction($db);
$emailcollectoroperation = new \EmailCollectorAction($db);
$res = $object->doCollectOneCollector(1);
$action = '';
$res = $object->doCollectOneCollector(0);
$action = '';
/*
 * View
 */
$form = new \Form($db);
$formfile = new \FormFile($db);
$help_url = "EN:Module_EMail_Collector|FR:Module_Collecteur_de_courrier_électronique|ES:Module_EMail_Collector";
$res = $object->fetch_optionals();
$head = \emailcollectorPrepareHead($object);
$formconfirm = '';
// Call Hook formConfirm
$parameters = array('formConfirm' => $formconfirm);
$reshook = $hookmanager->executeHooks('formConfirm', $parameters, $object, $action);
// Object card
// ------------------------------------------------------------
$linkback = '<a href="' . \DOL_URL_ROOT . '/admin/emailcollector_list.php?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
$morehtml = '';
$sourcedir = $object->source_directory;
$targetdir = $object->target_directory ? $object->target_directory : '';
// Can be '[Gmail]/Trash' or 'mytag'
$connection = \null;
$connectstringserver = $object->getConnectStringIMAP();
// Note: $object->host has been loaded by the fetch
$connectstringsource = '';
$connectstringtarget = '';
$morehtml = $form->textwithpicto($langs->trans("NbOfEmailsInInbox"), 'Connect string = ' . $connectstringserver . '<br>Option MAIN_IMAP_USE_PHPIMAP = ' . \getDolGlobalInt('MAIN_IMAP_USE_PHPIMAP')) . ': ' . ($morehtml !== '' ? $morehtml : '?');
// Common attributes
//$keyforbreak='fieldkeytoswithonsecondcolumn';
$nounderbanner = 1;
$arrayoftypes = array(
    'from' => array('label' => 'MailFrom', 'data-placeholder' => $langs->trans('SearchString')),
    'to' => array('label' => 'MailTo', 'data-placeholder' => $langs->trans('SearchString')),
    'cc' => array('label' => 'Cc', 'data-placeholder' => $langs->trans('SearchString')),
    'bcc' => array('label' => 'Bcc', 'data-placeholder' => $langs->trans('SearchString')),
    'replyto' => array('label' => 'ReplyTo', 'data-placeholder' => $langs->trans('SearchString')),
    'subject' => array('label' => 'Subject', 'data-placeholder' => $langs->trans('SearchString')),
    'body' => array('label' => 'Body', 'data-placeholder' => $langs->trans('SearchString')),
    // disabled because PHP imap_search is not compatible IMAPv4, only IMAPv2
    //'header'=>array('label'=>'Header', 'data-placeholder'=>'HeaderKey SearchString'),                // HEADER key value
    //'X1'=>'---',
    'X2' => '---',
    'seen' => array('label' => 'AlreadyRead', 'data-noparam' => 1),
    'unseen' => array('label' => 'NotRead', 'data-noparam' => 1),
    'unanswered' => array('label' => 'Unanswered', 'data-noparam' => 1),
    'answered' => array('label' => 'Answered', 'data-noparam' => 1),
    'smaller' => array('label' => $langs->trans("Size") . ' (' . $langs->trans("SmallerThan") . ")", 'data-placeholder' => $langs->trans('NumberOfBytes')),
    'larger' => array('label' => $langs->trans("Size") . ' (' . $langs->trans("LargerThan") . ")", 'data-placeholder' => $langs->trans('NumberOfBytes')),
    'X3' => '---',
    'withtrackingid' => array('label' => 'WithDolTrackingID', 'data-noparam' => 1),
    'withouttrackingid' => array('label' => 'WithoutDolTrackingID', 'data-noparam' => 1),
    'withtrackingidinmsgid' => array('label' => 'WithDolTrackingIDInMsgId', 'data-noparam' => 1),
    'withouttrackingidinmsgid' => array('label' => 'WithoutDolTrackingIDInMsgId', 'data-noparam' => 1),
    'X4' => '---',
    'isnotanswer' => array('label' => 'IsNotAnAnswer', 'data-noparam' => 1),
    'isanswer' => array('label' => 'IsAnAnswer', 'data-noparam' => 1),
);
$htmltext = $langs->transnoentitiesnoconv("OperationParamDesc");
$arrayoftypes = array('loadthirdparty' => $langs->trans('LoadThirdPartyFromName', $langs->transnoentities("ThirdPartyName") . '/' . $langs->transnoentities("AliasNameShort") . '/' . $langs->transnoentities("Email") . '/' . $langs->transnoentities("ID")), 'loadandcreatethirdparty' => $langs->trans('LoadThirdPartyFromNameOrCreate', $langs->transnoentities("ThirdPartyName") . '/' . $langs->transnoentities("AliasNameShort") . '/' . $langs->transnoentities("Email") . '/' . $langs->transnoentities("ID")), 'recordjoinpiece' => 'AttachJoinedDocumentsToObject', 'recordevent' => 'RecordEvent');
$arrayoftypesnocondition = $arrayoftypes;
// support hook for add action
$parameters = array('arrayoftypes' => $arrayoftypes);
$res = $hookmanager->executeHooks('addMoreActionsEmailCollector', $parameters, $object, $action);
// List operations
$nboflines = \count($object->actions);
$table_element_line = 'emailcollector_emailcollectoraction';
$fk_element = 'position';
$i = 0;