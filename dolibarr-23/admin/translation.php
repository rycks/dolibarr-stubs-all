<?php

$id = \GETPOSTINT('rowid');
$action = \GETPOST('action', 'aZ09');
$optioncss = \GETPOST('optionscss', 'aZ09');
$contextpage = \GETPOST('contextpage', 'aZ09');
$mode = \GETPOST('mode', 'aZ09') ? \GETPOST('mode', 'aZ09') : 'searchkey';
$langcode = \GETPOST('langcode', 'alphanohtml');
$transkey = \GETPOST('transkey', 'alphanohtml');
$entity = $conf->entity;
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
/*
 * Actions
 */
$error = 0;
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$error = 0;
$sql = "DELETE FROM " . \MAIN_DB_PREFIX . "overwrite_trans WHERE rowid = " . (int) $id;
$result = $db->query($sql);
/*
 * View
 */
$form = new \Form($db);
$formadmin = new \FormAdmin($db);
$wikihelp = 'EN:Setup_Translation|FR:Paramétrage_Traduction|ES:Configuración_Traducción';
$title = $langs->trans("Translation");
$param = '&mode=' . \urlencode($mode);
$enabledisablehtml = '';
$current_language_code = $langs->defaultlang;
$s = \picto_from_langcode($current_language_code);
$infoOnCurrentLang = $form->textwithpicto('<span class="opacitymedium">' . $langs->trans("CurrentUserLanguage") . ':</span> <strong>' . $s . ' ' . $current_language_code . '</strong>', $langs->trans("TranslationDesc")) . '</span><br>';
$head = \translation_prepare_head();
$langcode = \GETPOSTISSET('langcode') ? \GETPOST('langcode') : $langs->defaultlang;
$newlang = new \Translate('', $conf);
$langsenfileonly = new \Translate('', $conf);
$newlangfileonly = new \Translate('', $conf);
$recordtoshow = array();
// Search modules dirs
$modulesdir = \dolGetModulesDirs();
$listoffiles = array();
$listoffilesexternalmodules = array();
// Search into dir of modules (the $modulesdir is already a list that loop on $conf->file->dol_document_root)
$i = 0;
$nbtotaloffiles = \count($listoffiles);
$nbtotaloffilesexternal = \count($listoffilesexternalmodules);
$disabled = '';
$disablededit = '';
$text = $langs->trans("SomeTranslationAreUncomplete");
$urlwikitranslatordoc = 'https://wiki.dolibarr.org/index.php/Translator_documentation';
$infoOnTransProcess = \info_admin($text);
// Show constants
$sql = "SELECT rowid, entity, lang, transkey, transvalue";
$result = $db->query($sql);
$nbempty = 0;
//print '<br>';
$nbtotalofrecordswithoutfilters = \count($newlang->tab_translate);
$nbtotalofrecords = \count($recordtoshow);
$num = $limit + 1;
//print 'param='.$param.' $_SERVER["PHP_SELF"]='.$_SERVER["PHP_SELF"].' num='.$num.' page='.$page.' nbtotalofrecords='.$nbtotalofrecords." sortfield=".$sortfield." sortorder=".$sortorder;
$title = $langs->trans("Translation");
$massactionbutton = '';
$searchpicto = $form->showFilterAndCheckAddButtons(!empty($massactionbutton) ? 1 : 0, 'checkforselect', 1);
// Show result
$i = 0;