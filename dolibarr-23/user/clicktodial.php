<?php

$action = (string) \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel');
$id = \GETPOSTINT('id');
// Security check
$socid = 0;
$feature2 = $socid && $user->hasRight('user', 'self', 'creer') ? '' : 'user';
$object = new \User($db);
$result = \restrictedArea($user, 'user', $id, 'user&user', $feature2);
// Define value to know what current user can do on properties of edited user
$canedituser = 0;
/*
 * Actions
 */
$parameters = array('id' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$object = new \User($db);
$person_name = !empty($object->firstname) ? $object->lastname . ", " . $object->firstname : $object->lastname;
$title = $person_name . " - " . $langs->trans('ClickToDial');
$help_url = '';
$head = \user_prepare_head($object);
$title = $langs->trans("User");
$linkback = '';
$morehtmlref = '<a href="' . \DOL_URL_ROOT . '/user/vcard.php?id=' . $object->id . '&output=file&file=' . \urlencode(\dol_sanitizeFileName($object->getFullName($langs) . '.vcf')) . '" class="refid valignmiddle" rel="noopener">';
$urltovirtualcard = '/user/virtualcard.php?id=' . (int) $object->id;