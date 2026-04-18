<?php

\define('NOTOKENRENEWAL', 1);
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define('NOREQUIRESOC', '1');
/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
$id = \GETPOSTINT('socid');
$object = new \Societe($db);
$socid = $user->socid;
//print '<!-- Ajax page called with url '.dol_escape_htmltag($_SERVER["PHP_SELF"]).'?'.dol_escape_htmltag($_SERVER["QUERY_STRING"]).' -->'."\n";
$return_arr = array();
// Define filter on text typed
$socid = \GETPOST('newcompany');
$sql = "SELECT s.rowid, s.nom, s.name_alias, s.code_client, s.code_fournisseur, s.address, s.zip, s.town, s.email, s.siren, s.siret, s.ape, s.idprof4, s.idprof5, s.idprof6, s.client, s.fournisseur, s.datec, s.logo";
//dol_syslog("ajaxcompanies", LOG_DEBUG);
$resql = $db->query($sql);