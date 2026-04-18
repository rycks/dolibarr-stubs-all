<?php

$id = \GETPOSTINT('id');
$action = \GETPOST('action', 'aZ09');
$mode = \GETPOST('mode', 'alpha');
$confirm = \GETPOST('confirm', 'alpha');
$group = \GETPOSTINT("group", 3);
$cancel = \GETPOST('cancel', 'alpha');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'usercard';
// To manage different context of search
$backtopage = \GETPOST('backtopage');
$backtopageforcancel = \GETPOST('backtopageforcancel');
$dateemployment = \dol_mktime(0, 0, 0, \GETPOSTINT('dateemploymentmonth'), \GETPOSTINT('dateemploymentday'), \GETPOSTINT('dateemploymentyear'));
$dateemploymentend = \dol_mktime(0, 0, 0, \GETPOSTINT('dateemploymentendmonth'), \GETPOSTINT('dateemploymentendday'), \GETPOSTINT('dateemploymentendyear'));
$datestartvalidity = \dol_mktime(0, 0, 0, \GETPOSTINT('datestartvaliditymonth'), \GETPOSTINT('datestartvalidityday'), \GETPOSTINT('datestartvalidityyear'));
$dateendvalidity = \dol_mktime(0, 0, 0, \GETPOSTINT('dateendvaliditymonth'), \GETPOSTINT('dateendvalidityday'), \GETPOSTINT('dateendvalidityyear'));
$dateofbirth = \dol_mktime(0, 0, 0, \GETPOSTINT('dateofbirthmonth'), \GETPOSTINT('dateofbirthday'), \GETPOSTINT('dateofbirthyear'));
$childids = $user->getAllChildIds(1);
// For test on hrm fields (like salary visibility)
$object = new \User($db);
$extrafields = new \ExtraFields($db);
$socialnetworks = \getArrayOfSocialNetworks();
$error = 0;
$acceptlocallinktomedia = \acceptLocalLinktoMedia() > 0 ? 1 : 0;
// Security check
$socid = 0;
$feature2 = 'user';
$result = \restrictedArea($user, 'user', $id, 'user', $feature2);
// Define value to know what current user can do on users. A test on logged user is done later to complete
$permissiontoadd = (!empty($user->admin) || $user->hasRight("user", "user", "write")) && (empty($user->socid) || $user->socid == $object->socid);
$permissiontoread = (!empty($user->admin) || $user->hasRight("user", "user", "read")) && (empty($user->socid) || $user->socid == $object->socid);
$permissiontoedit = (!empty($user->admin) || $user->hasRight("user", "user", "write")) && (empty($user->socid) || $user->socid == $object->socid);
$permissiontodisable = (!empty($user->admin) || $user->hasRight("user", "user", "delete")) && (empty($user->socid) || $user->socid == $object->socid);
$permissiontoreadgroup = $permissiontoread;
$permissiontoeditgroup = $permissiontoedit;
$permissiontoclonesuperadmin = $permissiontoadd && empty($user->entity);
$permissiontocloneadmin = $permissiontoadd && !empty($user->admin);
$permissiontocloneuser = $permissiontoadd;
$caneditpasswordandsee = \false;
$caneditpasswordandsend = \false;
// Define value to know what current user can do on properties of edited user
$permissiontoeditpasswordandsee = \false;
$permissiontoeditpasswordandsend = \false;
$passwordismodified = \false;
$ldap = \null;
/*
 * Actions
 */
$parameters = array('id' => $id, 'socid' => $socid, 'group' => $group, 'caneditgroup' => $permissiontoeditgroup);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$backurlforlist = \DOL_URL_ROOT . '/user/list.php';
// Actions to send emails
$triggersendname = 'USER_SENTBYMAIL';
$paramname = 'id';
// Name of param key to open the card
$mode = 'emailfromuser';
$trackid = 'use' . $id;
// Actions to build doc
$upload_dir = $conf->user->dir_output;
/*
 * View
 */
$form = new \Form($db);
$formother = new \FormOther($db);
$formcompany = new \FormCompany($db);
$formadmin = new \FormAdmin($db);
$formfile = new \FormFile($db);
$formproduct = \null;
// Count nb of users
$nbofusers = 1;
$sql = "SELECT COUNT(rowid) as nb FROM " . \MAIN_DB_PREFIX . 'user WHERE entity IN (' . \getEntity('user') . ')';
$resql = $db->query($sql);
$obj = $db->fetch_object($resql);
$help_url = '';
$text = \null;
$generated_password = '';
$password = \GETPOSTISSET('password') ? \GETPOST('password') : $generated_password;
$arraygender = array('man' => $langs->trans("Genderman"), 'woman' => $langs->trans("Genderwoman"), 'other' => $langs->trans("Genderother"));
// Employee
$defaultemployee = '1';
$valuetoshow = '';
// Other form for user password
$parameters = array('valuetoshow' => $valuetoshow, 'password' => $password, 'caneditpasswordandsee' => $permissiontoeditpasswordandsee, 'caneditpasswordandsend' => $permissiontoeditpasswordandsend);
$reshook = $hookmanager->executeHooks('printUserPasswordField', $parameters, $object, $action);
// Other attributes
$parameters = array();
$doleditor = new \DolEditor('signature', \GETPOST('signature', 'restricthtml'), '', 138, 'dolibarr_notes', 'In', \true, $acceptlocallinktomedia, !\getDolGlobalString('FCKEDITOR_ENABLE_USERSIGN') ? 0 : 1, \ROWS_4, '90%');
$doleditor = new \DolEditor('note_public', \GETPOSTISSET('note_public') ? \GETPOST('note_public', 'restricthtml') : '', '', 100, 'dolibarr_notes', '', \false, \true, \getDolGlobalString('FCKEDITOR_ENABLE_NOTE_PUBLIC'), \ROWS_3, '90%');
$doleditor = new \DolEditor('note_private', \GETPOSTISSET('note_private') ? \GETPOST('note_private', 'restricthtml') : '', '', 100, 'dolibarr_notes', '', \false, \true, \getDolGlobalString('FCKEDITOR_ENABLE_NOTE_PRIVATE'), \ROWS_3, '90%');
$usegenericrule = \getDolGlobalString('USER_PASSWORD_GENERATED') == 'none' ? 1 : 0;