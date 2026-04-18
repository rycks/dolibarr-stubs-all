<?php

\define('NOLOGIN', '1');
\define('NOCSRFCHECK', '1');
\define('NOBROWSERNOTIF', '1');
\define('NOREQUIREMENU', '1');
\define('NOIPCHECK', '1');
\define("NOSESSION", '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
$mtid = \GETPOST('mtid');
$email = \GETPOST('email');
$tag = \GETPOST('tag');
// To retrieve the emailing, and recipient
$unsuscrib = \GETPOST('unsuscrib');
$securitykey = \GETPOST('securitykey');
/*
 * View
 */
$head = '';
$replacemainarea = (empty($conf->dol_hide_leftmenu) ? '<div>' : '') . '<div>';
$sql = "SELECT mc.rowid, mc.email, mc.statut, m.entity";
$resql = $db->query($sql);
$obj = $db->fetch_object($resql);
// TODO Test that mtid and email match also with the one found from $tag
/*
if ($obj->email != $email)
{
	print 'Email does not match tagnot found. No need to unsubscribe.';
	exit;
}
*/
// Update status of mail in recipient mailing list table
$statut = '3';
$sql = "UPDATE " . \MAIN_DB_PREFIX . "mailing_cibles SET statut=" . (int) $statut . " WHERE tag = '" . $db->escape($tag) . "'";
$resql = $db->query($sql);
/*
// Update status communication of thirdparty prospect (old usage)
$sql = "UPDATE ".MAIN_DB_PREFIX."societe SET fk_stcomm=-1 WHERE rowid IN (SELECT source_id FROM ".MAIN_DB_PREFIX."mailing_cibles WHERE tag = '".$db->escape($tag)."' AND source_type='thirdparty' AND source_id is not null)";

$resql=$db->query($sql);
if (! $resql) dol_print_error($db);

// Update status communication of contact prospect (old usage)
$sql = "UPDATE ".MAIN_DB_PREFIX."socpeople SET no_email=1 WHERE rowid IN (SELECT source_id FROM ".MAIN_DB_PREFIX."mailing_cibles WHERE tag = '".$db->escape($tag)."' AND source_type='contact' AND source_id is not null)";

$resql=$db->query($sql);
if (! $resql) dol_print_error($db);
*/
// Update status communication of email (new usage)
$sql = "INSERT INTO " . \MAIN_DB_PREFIX . "mailing_unsubscribe (date_creat, entity, email, unsubscribegroup, ip) VALUES ('" . $db->idate(\dol_now()) . "', " . (int) $obj->entity . ", '" . $db->escape($obj->email) . "', '', '" . $db->escape(\getUserRemoteIP()) . "')";
$resql = $db->query($sql);