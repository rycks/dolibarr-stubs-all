<?php

// Get Parameters
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$backtopage = \GETPOST('backtopage', 'alpha');
$socpeopleassigned = \GETPOST('socpeopleassigned', 'array');
$origin = \GETPOST('origin', 'alpha');
$originid = \GETPOSTINT('originid');
$confirm = \GETPOST('confirm', 'alpha');
$fulldayevent = \GETPOST('fullday', 'alpha');
$aphour = \GETPOSTINT('aphour');
$apmin = \GETPOSTINT('apmin');
$p2hour = \GETPOSTINT('p2hour');
$p2min = \GETPOSTINT('p2min');
$addreminder = \GETPOST('addreminder', 'alpha');
$offsetvalue = \GETPOSTINT('offsetvalue');
$offsetunit = \GETPOST('offsetunittype_duration', 'aZ09');
$remindertype = \GETPOST('selectremindertype', 'aZ09');
$modelmail = \GETPOSTINT('actioncommsendmodel_mail');
$complete = \GETPOST('complete', 'alpha');
// 'na' must be allowed
$private = \GETPOST('private', 'alphanohtml');
$tzforfullday = \null;
$reg = [];
$currentyear = (int) \dol_print_date(\dol_now(), '%Y');
// Security check
$socid = \GETPOSTINT('socid');
$id = \GETPOSTINT('id');
$error = \GETPOST("error");
$donotclearsession = \GETPOST('donotclearsession') ? \GETPOST('donotclearsession') : 0;
// Initialize Objects
$object = new \ActionComm($db);
$cactioncomm = new \CActionComm($db);
$contact = new \Contact($db);
$extrafields = new \ExtraFields($db);
$formfile = new \FormFile($db);
$form = new \Form($db);
$formfile = new \FormFile($db);
$formactions = new \FormActions($db);
$ret = $object->fetch($id);
$ret1 = 0;
$TRemindTypes = [];
$TDurationTypes = $form->getDurationTypes($langs);
$TDurationTypesExcluded = ['y', 'm', 's'];
$enablereminders = \getDolGlobalString('AGENDA_REMINDER_EMAIL') || \getDolGlobalString('AGENDA_REMINDER_BROWSER') || \getDolGlobalString('AGENDA_REMINDER_SMS');
$parameters = ['socid' => $socid, 'TRemindTypes' => &$TRemindTypes, 'enablereminders' => &$enablereminders, 'TDurationTypes' => &$TDurationTypes, 'TDurationTypesExcluded' => &$TDurationTypesExcluded];
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$result = \restrictedArea($user, 'agenda', $object, 'actioncomm&societe', 'myactions|allactions', 'fk_soc', 'id');
$usercancreate = $user->hasRight('agenda', 'allactions', 'create') || (empty($object->id) || $object->authorid == $user->id || $object->userownerid == $user->id) && $user->hasRight('agenda', 'myactions', 'create');
$usercandelete = $user->hasRight('agenda', 'allactions', 'delete') || ($object->authorid === $user->id || $object->userownerid === $user->id) && $user->hasRight('agenda', 'myactions', 'delete');
/*
 * Actions
 */
$listUserAssignedUpdated = \false;
$listResourceAssignedUpdated = \false;
$assignedtouser = [];
$idtoremove = \GETPOST('removedassigned');
$donotclearsession = 1;
$listUserAssignedUpdated = \true;
$idtoremove = \GETPOST('removedassignedresource');
$listResourceAssignedUpdated = \true;
$donotclearsession = 1;
$listUserAssignedUpdated = \true;
$donotclearsession = 1;
$listResourceAssignedUpdated = \true;
$error = 0;
$percentage = \in_array(\GETPOST('status'), array(-1, 100)) ? \GETPOST('status') : (\in_array($complete, array(-1, 100)) ? $complete : \GETPOSTINT("percentage"));
//set end date to now if percentage is set to 100 and end date not set
$datef = !$datef && $percentage == 100 ? \dol_now() : $datef;
$listofresourceid = [];
// Fill array 'array_options' with data from add form
$ret = $extrafields->setOptionalsFromPost(\null, $object);
// @phan-suppress-current-line PhanTypeMismatchProperty
$result = $object->delete($user);
$error = 0;
$shour = (int) \dol_print_date($object->datep, "%H", 'tzuserrel');
// We take the date visible by user $newdate is also date visible by user.
$smin = (int) \dol_print_date($object->datep, "%M", 'tzuserrel');
$newdate = \GETPOST('newdate', 'alpha');
$datep = \dol_mktime($shour, $smin, 0, (int) \substr($newdate, 13, 2), (int) \substr($newdate, 15, 2), (int) \substr($newdate, 9, 4), 'tzuserrel');
// Actions to delete doc
$upload_dir = $conf->agenda->dir_output . '/' . \dol_sanitizeFileName($object->ref);
$permissiontoadd = $user->hasRight('agenda', 'allactions', 'create') || ($object->authorid == $user->id || $object->userownerid == $user->id) && $user->hasRight('agenda', 'myactions', 'read');
/*
 * View
 */
$form = new \Form($db);
$formproject = new \FormProjets($db);
$arrayrecurrulefreq = array('no' => $langs->trans("OnceOnly"), 'YEARLY' => $langs->trans("EveryYear"), 'MONTHLY' => $langs->trans("EveryMonth"), 'WEEKLY' => $langs->trans("EveryWeek"));
$help_url = 'EN:Module_Agenda_En|FR:Module_Agenda|ES:M&omodulodulo_Agenda|DE:Modul_Terminplanung';
$contact = new \Contact($db);
$socpeopleassigned = \GETPOST("socpeopleassigned", 'array');
$datep = $datep ? $datep : (\is_null($object->datep) ? '' : $object->datep);
$datef = $datef ? $datef : $object->datef;
//print '</td></tr>';
// Recurring event
$userepeatevent = \getDolGlobalInt('MAIN_DISABLE_RECURRING_EVENTS') ? 0 : 1;
$listofuserid = [];
$listofcontactid = [];
$listofotherid = [];
$percent = $complete !== '' ? $complete : -1;
$doleditor = new \DolEditor('note', \GETPOSTISSET('note') ? \GETPOST('note', 'restricthtml') : $object->note_private, '', 100, 'dolibarr_notes', 'In', \true, \true, \isModEnabled('fckeditor'), \ROWS_4, '90%');
// Other attributes
$parameters = [];
$reshook = $hookmanager->executeHooks('formObjectOptions', $parameters, $object, $action);
$result1 = $object->fetch($id);
$result2 = $object->fetch_thirdparty();
$result2 = $object->fetchProject();
$result3 = $object->fetch_contact();
$result4 = $object->fetch_userassigned();
$result5 = $object->fetch_optionals();
/*
 * Show tabs
 */
$head = \actions_prepare_head($object);
$now = \dol_now();
$delay_warning = \getDolGlobalInt('MAIN_DELAY_ACTIONS_TODO') * 24 * 60 * 60;
$parameters = [];
$reshook = $hookmanager->executeHooks('addMoreActionsButtons', $parameters, $object, $action);