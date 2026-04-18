<?php

$action = \GETPOST('action', 'aZ09');
// List of oauth services
$oauthservices = array();
$error = 0;
$socialNetworkName = \GETPOST('socialnetwork_name', 'alpha');
$socialNetworkUrl = \GETPOST('socialnetwork_url', 'alpha');
// other params if exist
$paramNames = \GETPOST('param_name', 'array');
$paramValues = \GETPOST('param_value', 'array');
$additionalParams = [];
$error = 0;
$key = \GETPOST('key', 'alpha');
$name = '';
$sqlgetName = "SELECT note FROM " . \MAIN_DB_PREFIX . "boxes_def WHERE rowid=" . (int) $key;
$resqName = $db->query($sqlgetName);
$sql = "DELETE FROM " . \MAIN_DB_PREFIX . "boxes";
$resql1 = $db->query($sql);
$sql = "DELETE FROM " . \MAIN_DB_PREFIX . "boxes_def";
$resql2 = $db->query($sql);
$error = 0;
$id = \GETPOST('key', 'alpha');
$name = \GETPOST('socialnetwork_name');
$url = \GETPOST('socialnetwork_url');
$paramsKey = \GETPOST('paramsKey', 'array');
$paramsVal = \GETPOST('paramsVal', 'array');
$result = \dolibarr_get_const($db, "SOCIAL_NETWORKS_DATA_" . $name, $conf->entity);
$socialNetworkData = \json_decode($result, \true);
// new keys and new values in array
$mergedParams = array();
$paramKey = \GETPOST('paramkey', 'alpha');
$key = \GETPOST('key', 'alpha');
$name = \GETPOST('name');
$result = \dolibarr_get_const($db, "SOCIAL_NETWORKS_DATA_" . $name, $conf->entity);
$socialNetworkData = \json_decode($result, \true);
$newData = \json_encode($socialNetworkData);
$result = \dolibarr_set_const($db, "SOCIAL_NETWORKS_DATA_" . $name, $newData, 'chaine', 0, '', $conf->entity);
/*
 * View
 */
$form = new \Form($db);
$head = \socialnetwork_prepare_head();
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$title = $langs->trans("ConfigImportSocialNetwork");
$vartosmtpstype = 'MAIN_MAIL_SMTPS_AUTH_TYPE_EMAILING';
$oauthservicesStringKeys = [];
$sql = "SELECT rowid, file, note FROM " . \MAIN_DB_PREFIX . "boxes_def";
$resql = $db->query($sql);
/**
 * Check if the given fediverse feed if inside the list of boxes/widgets
 *
 * @param	int				$id			The id of the socialnetwork
 * @param	ModeleBoxes[]	$boxlist	A list with boxes/widgets
 * @return	bool					True if the socialnetwork is inside the box/widget list, otherwise false
 */
function _isInBoxListFediverse(int $id, array $boxlist)
{
}