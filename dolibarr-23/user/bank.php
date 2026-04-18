<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alphanohtml');
$bankid = \GETPOSTINT('bankid');
$action = \GETPOST("action", 'alpha');
$cancel = \GETPOST('cancel', 'alpha');
// Security check
$socid = 0;
$feature2 = $socid && $user->hasRight('user', 'self', 'creer') ? '' : 'user';
$object = new \User($db);
$account = new \UserBankAccount($db);
// Define value to know what current user can do on users
$selfpermission = $user->id == $id && $user->hasRight('user', 'self', 'creer');
$usercanadd = !empty($user->admin) || $user->hasRight('user', 'user', 'creer') || $user->hasRight('hrm', 'write_personal_information', 'write');
$usercanread = !empty($user->admin) || $user->hasRight('user', 'user', 'lire') || $user->hasRight('hrm', 'read_personal_information', 'read');
$permissiontoaddbankaccount = $user->hasRight('salaries', 'write') || $user->hasRight('hrm', 'employee', 'write') || $user->hasRight('user', 'user', 'creer') || $selfpermission;
$permissiontoreadhr = $user->hasRight('hrm', 'read_personal_information', 'read') || $user->hasRight('hrm', 'write_personal_information', 'write');
$permissiontowritehr = $user->hasRight('hrm', 'write_personal_information', 'write');
$permissiontosimpleedit = $selfpermission || $usercanadd;
$childids = $user->getAllChildIds(1);
// Ok if user->hasRight('salaries', 'readall') or user->hasRight('hrm', 'read')
//restrictedArea($user, 'salaries|hrm', $object->id, 'user&user', $feature2);
$ok = \false;
$result = $account->create($user);
$result = $account->update($user);
$result = $account->delete($user);
$action = '';
$result = $object->update($user);
$result = $object->update($user);
$result = $object->update($user);
$result = $object->fetch($id);
$result = $object->update($user);
$result = $object->update($user);
$result = $object->update($user);
$result = $object->update($user);
/*
 *	View
 */
$form = new \Form($db);
$formcompany = new \FormCompany($db);
$person_name = !empty($object->firstname) ? $object->lastname . ", " . $object->firstname : $object->lastname;
$title = $person_name . " - " . $langs->trans('BankAccounts');
$help_url = '';
$head = \user_prepare_head($object);
// If not bank account yet, $account may be empty
$title = $langs->trans("User");
$linkback = '';
$morehtmlref = '<a href="' . \DOL_URL_ROOT . '/user/vcard.php?id=' . $object->id . '&output=file&file=' . \urlencode(\dol_sanitizeFileName($object->getFullName($langs) . '.vcf')) . '" class="refid valignmiddle" rel="noopener">';
$urltovirtualcard = '/user/virtualcard.php?id=' . (int) $object->id;
// Max number of elements in small lists
$MAXLIST = \getDolGlobalInt('MAIN_SIZE_SHORTLIST_LIMIT', 5);
// List of bank accounts (Currently only one bank account possible for each employee)
$morehtmlright = '';
// Add hook in fields
$parameters = array('colspan' => ' colspan="2"');
$reshook = $hookmanager->executeHooks('formObjectOptions', $parameters, $object, $action);
$title = $langs->trans("User");
$linkback = '<a href="' . \DOL_URL_ROOT . '/user/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
$selectedcode = $account->currency_code;
$selectedcode = $account->country_code;
// Show fields of bank account
$bankaccount = $account;