<?php

\define('CSRFCHECK_WITH_TOKEN', '1');
$action = \GETPOST('action', 'aZ09');
$urldolibarr = 'https://www.dolibarr.org/downloads/';
$dolibarrroot = \preg_replace('/([\\/]+)$/i', '', \DOL_DOCUMENT_ROOT);
$dolibarrroot = \preg_replace('/([^\\/]+)$/i', '', $dolibarrroot);
$dolibarrdataroot = \preg_replace('/([\\/]+)$/i', '', \DOL_DATA_ROOT);
$sfurl = '';
$version = '0.0';
$result = \getURLContent('https://sourceforge.net/projects/dolibarr/rss');
/*
 * View
 */
$wikihelp = 'EN:Installation_-_Upgrade|FR:Installation_-_Mise_à_jour|ES:Instalación_-_Actualización';
$fullurl = '<a href="' . $urldolibarr . '" target="_blank" rel="noopener noreferrer">' . $urldolibarr . '</a>';
$fullurl = '<a href="' . \DOL_URL_ROOT . '/install/" target="_blank" rel="noopener noreferrer">' . \DOL_URL_ROOT . '/install/</a>';
$texttoshow = $langs->trans("GoModuleSetupArea", \DOL_URL_ROOT . '/admin/modules.php?mode=deploy', '{s2}');
$texttoshow = \str_replace('{s2}', \img_picto('', 'tools', 'class="pictofixedwidth"') . $langs->transnoentities("Home") . ' - ' . $langs->transnoentities("Setup") . ' - ' . $langs->transnoentities("Modules"), $texttoshow);