<?php

$error = 0;
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$confirm = \GETPOST('confirm', 'alpha');
$id = \GETPOSTINT('id');
$status2label = array('');
$object = new \Establishment($db);
// Must be 'include', not 'include_once'
$permissiontoread = $user->admin;
$permissiontoadd = $user->admin;
// Used by the include of actions_addupdatedelete.inc.php
$permissiontodelete = $user->admin;
$upload_dir = $conf->hrm->multidir_output[isset($object->entity) ? $object->entity : 1];
$result = $object->delete($user);
$form = new \Form($db);
$formcompany = new \FormCompany($db);
$result = $object->fetch($id);
$res = $object->fetch_optionals();
$head = \establishment_prepare_head($object);
// Object card
// ------------------------------------------------------------
$linkback = '<a href="' . \DOL_URL_ROOT . '/hrm/admin/admin_establishment.php' . (!empty($socid) ? '?socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';