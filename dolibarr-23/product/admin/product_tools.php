<?php

$action = \GETPOST('action', 'aZ09');
$oldvatrate = \GETPOST('oldvatrate', 'alpha');
$newvatrate = \GETPOST('newvatrate', 'alpha');
$error = 0;
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans('ProductVatMassChange');