<?php

\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREAJAX', '1');
\define('NOREQUIRESOC', '1');
/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
$action = \GETPOST('action', 'alpha');
$website_ref = \GETPOST('website_ref');
$page_id = \GETPOST('page_id');
$content = \GETPOST('content', 'restricthtml');
$element_id = \GETPOST('element_id');
$element_type = \GETPOST('element_type');
$usercanmodify = $user->hasRight('website', 'write');
// Page object
$objectpage = new \WebsitePage($db);
$res = $objectpage->fetch((int) $page_id);
// Website object
$objectwebsite = new \Website($db);
$res = $objectwebsite->fetch($objectpage->fk_website);
$error = 0;
$res = $objectpage->update($user);