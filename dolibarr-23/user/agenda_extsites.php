<?php

$def = array();
$actiontest = \GETPOST('test', 'alpha');
$actionsave = \GETPOST('save', 'alpha');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'useragenda';
$MAXAGENDA = \getDolGlobalString('AGENDA_EXT_NB');
// List of available colors
$colorlist = array('BECEDD', 'DDBECE', 'BFDDBE', 'F598B4', 'F68654', 'CBF654', 'A4A4A5');
// Security check
$id = \GETPOSTINT('id');
$object = new \User($db);
// Security check
$socid = 0;
$feature2 = $socid && $user->hasRight('user', 'self', 'creer') ? '' : 'user';
$result = \restrictedArea($user, 'user', $id, 'user&user', $feature2);
/*
 * Actions
 */
$parameters = array('id' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$formadmin = new \FormAdmin($db);
$formother = new \FormOther($db);
$arrayofjs = array();
$arrayofcss = array();
$person_name = !empty($object->firstname) ? $object->lastname . ", " . $object->firstname : $object->lastname;
$title = $person_name . " - " . $langs->trans('ExtSites');
$help_url = '';
$head = \user_prepare_head($object);
$linkback = '';
$morehtmlref = '<a href="' . \DOL_URL_ROOT . '/user/vcard.php?id=' . $object->id . '&output=file&file=' . \urlencode(\dol_sanitizeFileName($object->getFullName($langs) . '.vcf')) . '" class="refid valignmiddle" rel="noopener">';
$urltovirtualcard = '/user/virtualcard.php?id=' . (int) $object->id;
$selectedvalue = !\getDolGlobalString('AGENDA_DISABLE_EXT') ? 0 : $conf->global->AGENDA_DISABLE_EXT;
$i = 1;
$addition_button = array('name' => 'save', 'label_key' => 'Save', 'addclass' => 'hideifnotset');