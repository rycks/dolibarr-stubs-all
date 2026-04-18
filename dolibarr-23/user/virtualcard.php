<?php

// Security check
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$dol_openinpopup = \GETPOST('dol_openinpopup', 'aZ09');
$expand = empty($_COOKIE['virtualcard_expand']) ? '' : $_COOKIE['virtualcard_expand'];
$object = new \User($db);
// Security check
$socid = 0;
$feature2 = $socid && $user->hasRight('user', 'self', 'creer') ? '' : 'user';
$result = \restrictedArea($user, 'user', $id, 'user&user', $feature2);
$permissiontoedit = $object->id == $user->id && $user->hasRight('user', 'self', 'creer') || $user->hasRight('user', 'user', 'creer');
/*
 * View
 */
$form = new \Form($db);
$person_name = !empty($object->firstname) ? $object->lastname . ", " . $object->firstname : $object->lastname;
$title = $person_name . " - " . $langs->trans('Info');
$help_url = '';
$title = $langs->trans("User");
$param = '&id=' . (int) $object->id;
$enabledisablehtml = $langs->trans("EnablePublicVirtualCard") . ' ';
$fullexternaleurltovirtualcard = $object->getOnlineVirtualCardUrl('', 'external');
$fullinternalurltovirtualcard = $object->getOnlineVirtualCardUrl('', 'internal');
$showUserSocialNetworks = !\getDolUserString('USER_PUBLIC_HIDE_SOCIALNETWORKS', '', $object);
$showSocieteSocialNetworks = !\getDolUserString('USER_PUBLIC_HIDE_SOCIALNETWORKS_BUSINESS', '', $object);
$extendededitor = 0;
// We force no WYSIWYG editor
$doleditor = new \DolEditor('USER_PUBLIC_MORE', \getDolUserString('USER_PUBLIC_MORE', '', $object), '', 160, 'dolibarr_notes', '', \false, \false, $extendededitor, \ROWS_5, '90%');