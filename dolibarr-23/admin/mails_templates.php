<?php

// Load translation files required by the page
$langsArray = array("errors", "admin", "mails", "languages");
$toselect = \GETPOST('toselect', 'array:int');
$action = \GETPOST('action', 'aZ09') ? \GETPOST('action', 'aZ09') : 'view';
$massaction = \GETPOST('massaction', 'alpha');
$confirm = \GETPOST('confirm', 'alpha');
// Result of a confirmation
$mode = \GETPOST('mode', 'aZ09');
$optioncss = \GETPOST('optioncss', 'alpha');
$backtopage = \GETPOST('backtopage');
$contextpage = \GETPOST('contextpage', 'aZ09');
$rowid = \GETPOSTINT('id') ? \GETPOSTINT('id') : \GETPOSTINT('rowid');
$search_label = \GETPOST('search_label', 'alphanohtml');
// Must allow value like 'Abc Def' or '(MyTemplateName)'
$search_type_template = \GETPOST('search_type_template', 'alpha');
$search_lang = \GETPOST('search_lang', 'alpha');
$search_fk_user = \GETPOST('search_fk_user', 'intcomma');
$search_topic = \GETPOST('search_topic', 'alpha');
$search_module = \GETPOST('search_module', 'alpha');
$acts = array();
$actl = array();
$listoffset = \GETPOST('listoffset', 'alpha');
$listlimit = \GETPOST('listlimit', 'alpha') > 0 ? \GETPOST('listlimit', 'alpha') : 1000;
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $listlimit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$object = new \CEmailTemplate($db);
// Definition of array of fields for columns from ->fields
$tableprefix = 't';
$arrayfields = array();
// Old way to define field.
// Name of SQL tables of dictionaries
$tabname = array();
// Nom des champs en resultat de select pour affichage du dictionnaire
// Names of fields in select results for dictionary display (AI translated)
$tabfield = array();
// Nom des champs d'edition pour modification d'un enregistrement
// Names of edit fields for modifying a record (AI translated)
$tabfieldvalue = array();
// Nom des champs dans la table pour insertion d'un enregistrement
// Field names in the table for inserting a record (AI translated)
$tabfieldinsert = array();
$formmail = new \FormMail($db);
$tabhelp = array();
// We save list of template email Dolibarr can manage. This list can found by a grep into code on "->param['models']"
$elementList = array();
$parameters = array('elementList' => $elementList);
$reshook = $hookmanager->executeHooks('emailElementlist', $parameters);
$error = 0;
$acceptlocallinktomedia = \acceptLocalLinktoMedia() > 0 ? 1 : 0;
$permissiontoadd = 1;
$permissiontoedit = $user->admin ? 1 : 0;
$permissiontodelete = $user->admin ? 1 : 0;
$tmpmailtemplate = new \CEmailTemplate($db);
$action = 'list';
$massaction = '';
$parameters = array();
$object = \null;
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$formadmin = new \FormAdmin($db);
$now = \dol_now();
//$help_url = "EN:Module_MyObject|FR:Module_MyObject_FR|ES:Módulo_MyObject";
$help_url = '';
$morejs = array();
$morecss = array();
$sql = "SELECT rowid as rowid, module, label, type_template, lang, fk_user, private, position, topic, email_from, joinfiles, defaultfortype,";
$arrayofselected = \is_array($toselect) ? $toselect : array();
$param = '';
// Add $param from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSearchParam', $parameters, $object);
$titlepicto = 'title_setup';
$url = \DOL_URL_ROOT . '/admin/mails_templates.php?action=create';
$newcardbutton = '';
$head = \email_admin_prepare_head();
$fieldlist = \explode(',', $tabfield[25]);
// If data was already input, we define them in obj to populate input fields.
$obj = new \stdClass();
$tmpaction = 'create';
$parameters = array('fieldlist' => $fieldlist, 'tabname' => $tabname[25]);
$reshook = $hookmanager->executeHooks('createEmailTemplateFieldlist', $parameters, $obj, $tmpaction);
// Note that $action and $object may have been modified by some hooks
$error = $hookmanager->error;
$errors = $hookmanager->errors;
// Show fields for topic, join files and body
$fieldsforcontent = array('topic', 'email_from', 'joinfiles', 'content');
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$i = 0;
$param = '';
$paramwithsearch = $param;
$nbqualified = 0;
/**
 *	Show fields in insert/edit mode
 *
 * 	@param		array<int|string,null|int|float|string>	$fieldlist		Array of fields and their values
 * 	@param		?Object	$obj			If we show a particular record, obj is filled with record fields
 *  @param		string	$tabname		Name of SQL table
 *  @param		string	$context		'add'=Output field for the "add form", 'edit'=Output field for the "edit form", 'preview'=show in readonly the template, 'hide'=Output field for the "add form" but we don't want it to be rendered
 *	@return		int                    	Number of fields printed
 */
function fieldList($fieldlist, $obj = \null, $tabname = '', $context = '')
{
}