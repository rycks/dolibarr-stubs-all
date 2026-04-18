<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$lineid = \GETPOSTINT('lineid');
$action = \GETPOST('action', 'alpha');
$object = new \StockTransfer($db);
$error = 0;
$ret = $object->fetch($id, $ref);
$permissiontoread = $user->hasRight('stocktransfer', 'stocktransfer', 'read');
$permissiontoadd = $user->hasRight('stocktransfer', 'stocktransfer', 'write');
// Used by the include of actions_addupdatedelete.inc.php and actions_lineupdown.inc.php
$permissionnote = $user->hasRight('stocktransfer', 'stocktransfer', 'write');
// Used by the include of actions_setnotes.inc.php
$permissiontodelete = $user->rights->stocktransfer->stocktransfer->delete || $permissiontoadd && isset($object->status) && $object->status < $object::STATUS_TRANSFERED;
$permissiondellink = $user->hasRight('stocktransfer', 'stocktransfer', 'write');
// Used by the include of actions_dellink.inc.php
$upload_dir = $conf->stocktransfer->multidir_output[isset($object->entity) ? $object->entity : 1];
$form = new \Form($db);
$formcompany = new \FormCompany($db);
$formother = new \FormOther($db);
$head = \stocktransferPrepareHead($object);
// Proposal card
$linkback = '<a href="' . \DOL_URL_ROOT . '/comm/propal/list.php?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
// Contacts lines (modules that overwrite templates must declare this into descriptor)
$dirtpls = \array_merge($conf->modules_parts['tpl'], array('/core/tpl'));