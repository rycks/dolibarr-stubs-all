<?php

/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 *
 * @var string $dolibarr_main_url_root
 */
$supportedoauth2array = \getSupportedOauth2Array();
// Define $urlwithroot
$urlwithouturlroot = \preg_replace('/' . \preg_quote(\DOL_URL_ROOT, '/') . '$/i', '', \trim($dolibarr_main_url_root));
$urlwithroot = $urlwithouturlroot . \DOL_URL_ROOT;
$action = \GETPOST('action', 'aZ09');
$provider = \GETPOST('provider', 'aZ09');
$label = \GETPOST('label', 'aZ09');
$servicetoeditname = \GETPOST('servicetoeditname', 'aZ09');
$error = 0;
$provider = \GETPOST('provider', 'aZ09');
$label = \GETPOST('label');
$globalkey = empty($provider) ? $label : $label . '-' . $provider;
$provider = \GETPOST('provider', 'aZ09');
$label = \GETPOST('label');
$globalkey = empty($provider) ? $label : $label . '-' . $provider;
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans('ConfigOAuth');
$help_url = 'EN:Module_OAuth|FR:Module_OAuth_FR|ES:Módulo_OAuth_ES';
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \oauthadmin_prepare_head();
$list = \getAllOauth2Array();
$listinsetup = [];