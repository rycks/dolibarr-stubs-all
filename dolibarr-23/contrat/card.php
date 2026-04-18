<?php

$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel', 'alpha');
$backtopage = \GETPOST('backtopage', 'alpha');
$backtopageforcancel = \GETPOST('backtopageforcancel', 'alpha');
$socid = \GETPOSTINT('socid');
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$origin = \GETPOST('origin', 'alpha');
$originid = \GETPOSTINT('originid');
$idline = \GETPOSTINT('elrowid') ? \GETPOSTINT('elrowid') : \GETPOSTINT('rowid');
$attribute = \GETPOST('attribute', 'aZ09');
// PDF
$hidedetails = \GETPOSTINT('hidedetails') ? \GETPOSTINT('hidedetails') : (\getDolGlobalString('MAIN_GENERATE_DOCUMENTS_HIDE_DETAILS') ? 1 : 0);
$hidedesc = \GETPOSTINT('hidedesc') ? \GETPOSTINT('hidedesc') : (\getDolGlobalString('MAIN_GENERATE_DOCUMENTS_HIDE_DESC') ? 1 : 0);
$hideref = \GETPOSTINT('hideref') ? \GETPOSTINT('hideref') : (\getDolGlobalString('MAIN_GENERATE_DOCUMENTS_HIDE_REF') ? 1 : 0);
$datecontrat = '';
$moreparam = '';
$note_public = '';
$note_private = '';
$usehm = \getDolGlobalInt('MAIN_USE_HOURMIN_IN_DATE_RANGE');
$object = new \Contrat($db);
$extrafields = new \ExtraFields($db);
$ret = 0;
$pu_ht = \null;
// Init for static analysis
$pu_ttc = \null;
$ret = $object->fetch($id, $ref);
// fetch optionals attributes lines and labels
$extralabelslines = $extrafields->fetch_name_optionals_label($object->table_element_line);
$permissionnote = $user->hasRight('contrat', 'creer');
// Used by the include of actions_setnotes.inc.php
$permissiondellink = $user->hasRight('contrat', 'creer');
// Used by the include of actions_dellink.inc.php
$permissiontodelete = $user->hasRight('contrat', 'creer') && $object->status == $object::STATUS_DRAFT || $user->hasRight('contrat', 'supprimer');
$permissiontoadd = $user->hasRight('contrat', 'creer');
//  Used by the include of actions_addupdatedelete.inc.php and actions_lineupdown.inc.php
$permissiontoedit = $permissiontoadd;
$permissiontoactivate = $user->hasRight('contrat', 'activer');
$permissiontodisable = $user->hasRight('contrat', 'desactiver');
// TODO use same than $permissiontoactivate
$permissiontoeditextra = $permissiontoadd;
$error = 0;
// Security check
$result = \restrictedArea($user, 'contrat', $object->id);
/*
 * Actions
 */
$parameters = array('socid' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$backurlforlist = \dolBuildUrl(\DOL_URL_ROOT . '/contrat/list.php');
// Param dates
$date_start_update = '';
$date_end_update = '';
$date_start_real_update = '';
$date_end_real_update = '';
// Actions to build doc
$upload_dir = $conf->contrat->multidir_output[!empty($object->entity) ? $object->entity : $conf->entity];
// Actions to send emails
$triggersendname = 'CONTRACT_SENTBYMAIL';
$paramname = 'id';
$mode = 'emailfromcontract';
$trackid = 'con' . $object->id;
/*
 * View
 */
$title = $object->ref . " - " . $langs->trans('Contract');
$help_url = 'EN:Module_Contracts|FR:Module_Contrat|ES:Contratos_de_servicio';
$form = new \Form($db);
$formfile = new \FormFile($db);
// Load object modContract
$module = \getDolGlobalString('CONTRACT_ADDON', 'mod_contract_serpis');
$result = \dol_include_once('/core/modules/contract/' . $module . '.php');
$modCodeContract = \null;
$objectsrc = \null;
$soc = new \Societe($db);
$doleditor = new \DolEditor('note_public', (string) $note_public, '', 100, 'dolibarr_notes', 'In', \true, \true, !\getDolGlobalString('FCKEDITOR_ENABLE_NOTE_PUBLIC') ? 0 : 1, \ROWS_3, '90%');
// Other attributes
$parameters = array('objectsrc' => $objectsrc, 'colspan' => ' colspan="3"', 'cols' => '3');
$reshook = $hookmanager->executeHooks('formObjectOptions', $parameters, $object, $action);