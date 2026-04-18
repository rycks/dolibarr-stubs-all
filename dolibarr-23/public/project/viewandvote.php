<?php

\define("NOLOGIN", 1);
\define("NOCSRFCHECK", 1);
\define('NOIPCHECK', '1');
\define('NOBROWSERNOTIF', '1');
// For MultiCompany module.
// Do not use GETPOST here, function is not defined and get of entity must be done before including main.inc.php
// Because 2 entities can have the same ref.
$entity = !empty($_GET['entity']) ? (int) $_GET['entity'] : (!empty($_POST['entity']) ? (int) $_POST['entity'] : (!empty($_GET['e']) ? (int) $_GET['e'] : (!empty($_POST['e']) ? (int) $_POST['e'] : 1)));
\define("DOLENTITY", $entity);
/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Societe $mysoc
 * @var Translate $langs
 * @var User $user
 */
// Hook to be used by external payment modules (ie Payzen, ...)
$hookmanager = new \HookManager($db);
// File with generic data
// Security check
// No check on module enabled. Done later according to $validpaymentmethod
$errmsg = '';
$error = 0;
$action = \GETPOST('action', 'aZ09');
$id = \GETPOST('id');
$securekeyreceived = \GETPOST("securekey");
$securekeytocompare = \dol_hash(\getDolGlobalString('EVENTORGANIZATION_SECUREKEY') . 'conferenceorbooth' . (int) $id, 'md5');
$listofvotes = \explode(',', $_SESSION["savevotes"]);
// Define $urlwithroot
//$urlwithouturlroot=preg_replace('/'.preg_quote(DOL_URL_ROOT,'/').'$/i','',trim($dolibarr_main_url_root));
//$urlwithroot=$urlwithouturlroot.DOL_URL_ROOT;		// This is to use external domain name found into config file
$urlwithroot = \DOL_MAIN_URL_ROOT;
// This is to use same domain name than current. For Paypal payment, we can use internal URL like localhost.
$project = new \Project($db);
$resultproject = $project->fetch((int) $id);
/*
 * Actions
 */
$tmpthirdparty = new \Societe($db);
$listOfConferences = '<tr><td>' . $langs->trans('Label') . '</td>';
$sql = "SELECT a.id, a.fk_action, a.datep, a.datep2, a.label, a.fk_soc, a.note, ca.libelle as label\n\t\tFROM " . \MAIN_DB_PREFIX . "actioncomm as a\n\t\tINNER JOIN " . \MAIN_DB_PREFIX . "c_actioncomm as ca ON (a.fk_action = ca.id)\n\t\tWHERE a.status < 2";
$sqlforconf = $sql . " AND ca.module='conference@eventorganization'";
//$sqlforbooth = $sql." AND ca.module='booth@eventorganization'";
// For conferences
$result = $db->query($sqlforconf);
$i = 0;
// For booths
/*
$result = $db->query($sqlforbooth);
$i = 0;
while ($i < $db->num_rows($result)) {
	$obj = $db->fetch_object($result);
	if (!empty($obj->fk_soc)) {
		$resultthirdparty = $tmpthirdparty->fetch($obj->fk_soc);
		if ($resultthirdparty) {
			$thirdpartyname = $tmpthirdparty->name;
		} else {
			$thirdpartyname = '';
		}
	} else {
		$thirdpartyname = '';
	}

	$listOfBooths .= '<tr><td>'.$obj->label.'</td><td>'.$obj->libelle.'</td><td>'.$obj->datep.'</td><td>'.$obj->datep2.'</td><td>'.$thirdpartyname.'</td><td>'.$obj->note.'</td>';
	$listOfBooths .= '<td><button type="submit" name="vote" value="'.$obj->id.'" class="button">'.$langs->trans("Vote").'</button></td></tr>';
	$i++;
}
*/
// Get vote result
$idvote = \GETPOSTINT("vote");
$hashedvote = \dol_hash(\getDolGlobalString('EVENTORGANIZATION_SECUREKEY') . 'vote' . $idvote);
$votestatus = 'err';
/*
 * View
 */
$head = '';
$replacemainarea = (empty($conf->dol_hide_leftmenu) ? '<div>' : '') . '<div>';
// Show logo (search order: logo defined by PAYMENT_LOGO_suffix, then PAYMENT_LOGO, then small company logo, large company logo, theme logo, common logo)
// Define logo and logosmall
$logosmall = $mysoc->logo_small;
$logo = $mysoc->logo;
$paramlogo = 'ONLINE_PAYMENT_LOGO_' . $suffix;
//print '<!-- Show logo (logosmall='.$logosmall.' logo='.$logo.') -->'."\n";
// Define urllogo
$urllogo = '';
$urllogofull = '';
$text = '<tr><td class="textpublicpayment"><br><strong>' . $langs->trans("EvntOrgRegistrationWelcomeMessage") . '</strong></td></tr>' . "\n";
/*
print '<br>';

print '<table border=1  cellpadding="10" id="conferences" class="center">'."\n";
print '<th colspan="7">'.$langs->trans("ListOfSuggestedBooths").'</th>';
print $listOfBooths.'<br>';
print '</table>'."\n";
*/
$object = \null;