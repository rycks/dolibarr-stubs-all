<?php

// Get Parameters
$id = \GETPOSTINT("id");
$action = \GETPOST("action", "alpha");
$title = (string) \GETPOST("title", "alpha");
$url = (string) \GETPOST("url", "alpha");
$urlsource = \GETPOST("urlsource", "alpha");
$target = \GETPOST("target", "alpha");
$userid = \GETPOSTINT("userid");
$position = \GETPOSTINT("position");
$backtopage = \GETPOST('backtopage', 'alpha');
// Initialize Objects
$object = new \Bookmark($db);
$permissiontoread = $user->hasRight('bookmark', 'lire');
$permissiontoadd = $user->hasRight('bookmark', 'creer');
$permissiontodelete = $user->hasRight('bookmark', 'supprimer') || $permissiontoadd && $object->fk_user == $user->id;
$error = 0;
$form = new \Form($db);
$head = array();
$h = 1;
$hselected = 'card';
$liste = array(0 => $langs->trans("ReplaceWindow"), 1 => $langs->trans("OpenANewWindow"));
$defaulttarget = 1;
$linkback = '<a href="' . \DOL_URL_ROOT . '/bookmarks/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';