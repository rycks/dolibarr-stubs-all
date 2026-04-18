<?php

/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
$id = \GETPOSTINT('id');
$form = new \Form($db);
$object = new \Mailing($db);
$head = \emailing_prepare_head($object);
$linkback = '<a href="' . \DOL_URL_ROOT . '/comm/mailing/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
$morehtmlstatus = '';
$nbtry = $nbko = 0;