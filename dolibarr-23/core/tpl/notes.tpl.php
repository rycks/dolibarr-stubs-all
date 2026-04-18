<?php

// $permissionnote 	must be defined by caller. For example $permissionnote=$user->rights->module->create
// $cssclass   		must be defined by caller. For example $cssclass='fieldtitle'
$module = $object->element;
$note_public = 'note_public';
$note_private = 'note_private';
$colwidth = isset($colwidth) ? $colwidth : (empty($cssclass) ? '25' : '');
// Set $permission from the $permissionnote var defined on calling page
$permission = isset($permissionnote) ? $permissionnote : (isset($permission) ? $permission : ($user->hasRight($module, 'create') ? $user->rights->{$module}->create : ($user->hasRight($module, 'creer') ? $user->rights->{$module}->creer : 0)));
$moreparam = isset($moreparam) ? $moreparam : '';
$value_public = $object->note_public;
$value_private = $object->note_private;
$stringtoadd = \dol_print_date(\dol_now(), 'dayhour') . ' ' . $user->getFullName($langs) . ' --';
$stringtoadd = \dol_print_date(\dol_now(), 'dayhour') . ' ' . $user->getFullName($langs) . ' --';
$editmode = \GETPOST('action', 'aZ09') == 'edit' . $note_public;