<?php

$oldtypetonewone = array('texte' => 'text', 'chaine' => 'string');
// old type to new ones
$action = \GETPOST('action', 'aZ09');
$error = 0;
$helptext = '*' . $langs->trans("FollowingConstantsWillBeSubstituted") . '<br>';
//$helptext.='__YEAR__, __MONTH__, __DAY__';	// Not supported
// Editing global variables not related to a specific theme
$constantes = array('MEMBER_REMINDER_EMAIL' => array('type' => 'yesno', 'label' => $langs->trans('MEMBER_REMINDER_EMAIL', $langs->transnoentities("Module2300Name")), 'help' => $langs->trans('MEMBER_REMINDER_EMAILHelp', $langs->transnoentities("Module2300Name"))), 'ADHERENT_EMAIL_TEMPLATE_REMIND_EXPIRATION' => array('type' => 'emailtemplate:member', 'label' => ''), 'ADHERENT_EMAIL_TEMPLATE_AUTOREGISTER' => array('type' => 'emailtemplate:member', 'label' => ''), 'ADHERENT_EMAIL_TEMPLATE_MEMBER_VALIDATION' => array('type' => 'emailtemplate:member', 'label' => ''), 'ADHERENT_EMAIL_TEMPLATE_SUBSCRIPTION' => array('type' => 'emailtemplate:member', 'label' => ''), 'ADHERENT_EMAIL_TEMPLATE_CANCELATION' => array('type' => 'emailtemplate:member', 'label' => ''), 'ADHERENT_EMAIL_TEMPLATE_EXCLUSION' => array('type' => 'emailtemplate:member', 'label' => ''), 'ADHERENT_MAIL_FROM' => array('type' => 'string', 'label' => ''), 'ADHERENT_CC_MAIL_FROM' => array('type' => 'string', 'label' => ''), 'ADHERENT_AUTOREGISTER_NOTIF_MAIL_SUBJECT' => array('type' => 'string', 'label' => ''), 'ADHERENT_AUTOREGISTER_NOTIF_MAIL' => array('type' => 'html', 'tooltip' => $helptext, 'label' => ''));
$res = 0;
$constlineid = \GETPOSTINT('rowid');
$constname = \GETPOST('constname', 'alpha');
$constvalue = \GETPOSTISSET('constvalue_' . $constname) ? \GETPOST('constvalue_' . $constname, 'alphanohtml') : \GETPOST('constvalue');
$consttype = \GETPOSTISSET('consttype_' . $constname) ? \GETPOST('consttype_' . $constname, 'alphanohtml') : \GETPOST('consttype');
$constnote = \GETPOSTISSET('constnote_' . $constname) ? \GETPOST('constnote_' . $constname, 'restricthtml') : \GETPOST('constnote');
$typetouse = empty($oldtypetonewone[$consttype]) ? $consttype : $oldtypetonewone[$consttype];
$constvalue = \preg_replace('/:member$/', '', $constvalue);
$res = \dolibarr_set_const($db, $constname, $constvalue, $typetouse, 0, $constnote, $conf->entity);
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans("MembersSetup");
$help_url = 'EN:Module_Foundations|FR:Module_Adh&eacute;rents|ES:M&oacute;dulo_Miembros|DE:Modul_Mitglieder';
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \member_admin_prepare_head();
// TODO Try to use the formsetup class.
$tableau = $constantes;