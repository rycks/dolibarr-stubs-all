<?php

$lastexternalrss = 0;
$action = \GETPOST('action', 'aZ09');
/*
 * Actions
 */
$error = 0;
// positionne la variable pour le nombre de rss externes
$sql = "SELECT " . $db->decrypt('name') . " as name FROM " . \MAIN_DB_PREFIX . "const";
//print $sql;
$result = $db->query($sql);
$external_rss_title = "external_rss_title_" . \GETPOSTINT("norss");
$external_rss_urlrss = "external_rss_urlrss_" . \GETPOSTINT("norss");
/*
 * View
 */
$form = new \Form($db);
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$sql = "SELECT rowid, file, note FROM " . \MAIN_DB_PREFIX . "boxes_def";
$resql = $db->query($sql);
/**
 * Check if the given RSS feed if inside the list of boxes/widgets
 *
 * @param	int				$idrss		The id of the RSS feed
 * @param	ModeleBoxes[]	$boxlist	A list with boxes/widgets
 * @return	bool						true if the rss feed is inside the box/widget list, otherwise false
 */
function _isInBoxList($idrss, array $boxlist)
{
}