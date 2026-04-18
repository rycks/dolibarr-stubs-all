<?php

/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
$hookmanager = new \HookManager($db);
$object = new \Mailing($db);
// Security check
$result = \restrictedArea($user, 'mailing');
/*
 *	View
 */
$help_url = 'EN:Module_EMailing|FR:Module_Mailing|ES:M&oacute;dulo_Mailing';
$title = $langs->trans('MailingArea');
$titlesearch = $langs->trans("SearchAMailing");
$dir = \DOL_DOCUMENT_ROOT . "/core/modules/mailings";
$handle = \opendir($dir);
/*
 * List of last emailings
 */
$limit = 10;
$sql = "SELECT m.rowid, m.titre as title, m.nbemail, m.statut as status, m.date_creat, m.messtype";
$result = $db->query($sql);
$num = $db->num_rows($result);
$parameters = array('user' => $user);
$reshook = $hookmanager->executeHooks('dashboardEmailings', $parameters, $object);