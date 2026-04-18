<?php

//
$documentation = new \Documentation($db);
$form = new \Form($db);
$mode = \GETPOST('mode');
// ex : no-btn
$displayMode = \GETPOST('displayMode') == 'kanban' ? 'kanban' : 'icon-only';
$revertDisplayMode = $displayMode == 'kanban' ? 'icon-only' : 'kanban';
$revertDisplayName = $displayMode == 'kanban' ? $langs->trans('ViewList') : $langs->trans('ViewKanban');
$switchDisplayLink = \dol_buildpath($documentation->baseUrl . '/components/icons.php', 1) . '?displayMode=' . $revertDisplayMode;
$switchDisplayLinkIcon = $displayMode == 'kanban' ? 'fa fa-th' : 'fa fa-th-list';
$iconFileName = 'shims.json';
$iconFilePath = \DOL_DOCUMENT_ROOT . '/theme/common/fontawesome-5/metadata';
$fontAwesomeIconRaw = \file_get_contents($iconFilePath . '/' . $iconFileName);
$fontAwesomeIcons = \json_decode($fontAwesomeIconRaw);
$arrayofdolibarriconkey = \getImgPictoNameList();
$iconFileName = 'shims.json';
$iconFilePath = \DOL_DOCUMENT_ROOT . '/theme/common/fontawesome-5/metadata';
$fontAwesomeIconRaw = \file_get_contents($iconFilePath . '/' . $iconFileName);
$fontAwesomeIcons = \json_decode($fontAwesomeIconRaw);
$alreadyDisplay = [];
/**
 * Get all usage icon key usable for img_picto(..., key)
 *
 * @return string[]
 * @see getImgPictoConv()
 */
function getImgPictoNameList()
{
}