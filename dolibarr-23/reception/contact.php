<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$object = new \Reception($db);
$typeobject = '';
$origin = '';
/*
 * View
 */
$help_url = 'EN:Customers_Orders|FR:receptions_Clients|ES:Pedidos de clientes';
$form = new \Form($db);
$formcompany = new \FormCompany($db);
$formother = new \FormOther($db);
$contactstatic = new \Contact($db);
$userstatic = new \User($db);
$head = \reception_prepare_head($object);
// Reception card
$linkback = '<a href="' . \DOL_URL_ROOT . '/reception/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
// Contacts lines (modules that overwrite templates must declare this into descriptor)
$dirtpls = \array_merge($conf->modules_parts['tpl'], array('/core/tpl'));