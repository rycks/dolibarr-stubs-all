<?php

$id = \GETPOSTINT('rowid') ? \GETPOSTINT('rowid') : \GETPOSTINT('id');
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$ref = \GETPOST('ref', 'alphanohtml');
// Security check
$fieldvalue = !empty($id) ? $id : (!empty($ref) ? $ref : '');
$fieldtype = !empty($ref) ? 'ref' : 'rowid';
// Security check
$result = \restrictedArea($user, 'adherent', $id, 'adherent_type');
$object = new \AdherentType($db);
$result = $object->delMultiLangs(\GETPOST('langtodelete', 'alpha'), $user);
$object = new \AdherentType($db);
$current_lang = $langs->getDefaultLang();
$forcelangprod = \GETPOST("forcelangprod", 'aZ09');
$object = new \AdherentType($db);
$current_lang = $langs->getDefaultLang();
$object = new \AdherentType($db);
$langtodelete = \GETPOST('langdel', 'alpha');
$object = new \AdherentType($db);
$result = $object->fetch($id);
/*
 * View
 */
$title = $langs->trans('MemberTypeCard');
$help_url = '';
$shortlabel = \dol_trunc($object->label, 16);
$title = $langs->trans('MemberType') . " " . $shortlabel . " - " . $langs->trans('Translation');
$help_url = 'EN:Module_Services_En|FR:Module_Services|ES:M&oacute;dulo_Servicios|DE:Modul_Mitglieder';
$form = new \Form($db);
$formadmin = new \FormAdmin($db);
$head = \member_type_prepare_head($object);
$titre = $langs->trans("MemberType" . $object->id);
// Calculate $cnt_trans
$cnt_trans = 0;
$linkback = '<a href="' . \dol_buildpath('/adherents/type.php', 1) . '">' . $langs->trans("BackToList") . '</a>';