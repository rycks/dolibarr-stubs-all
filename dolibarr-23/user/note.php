<?php

/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
// Get parameters
$id = \GETPOSTINT('id');
$action = \GETPOST('action', 'aZ09');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'usernote';
$object = new \User($db);
// Permissions
$permissionnote = $user->hasRight("user", "self", "write");
// Used by the include of actions_setnotes.inc.php
// Security check
$socid = 0;
$feature2 = $socid && $user->hasRight("user", "self", "write") ? '' : 'user';
$result = \restrictedArea($user, 'user', $id, 'user&user', $feature2);
/*
 * Actions
 */
$parameters = array('id' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$form = new \Form($db);
$head = \user_prepare_head($object);
$title = $langs->trans("User");
$linkback = '';
$morehtmlref = '<a href="' . \DOL_URL_ROOT . '/user/vcard.php?id=' . $object->id . '&output=file&file=' . \urlencode(\dol_sanitizeFileName($object->getFullName($langs) . '.vcf')) . '" class="refid valignmiddle" rel="noopener">';
$urltovirtualcard = '/user/virtualcard.php?id=' . (int) $object->id;