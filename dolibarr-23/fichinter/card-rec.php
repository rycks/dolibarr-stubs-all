<?php

// Security check
$id = \GETPOSTINT('fichinterid') ? \GETPOSTINT('fichinterid') : \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$date_next_execution = \GETPOST('date_next_execution', 'alpha');
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel');
$backtopage = \GETPOST('backtopage', 'alpha');
$socid = \GETPOSTINT('socid');
$objecttype = 'fichinter_rec';
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$object = new \FichinterRec($db);
$extrafields = new \ExtraFields($db);
$arrayfields = array('f.title' => array('label' => "Ref", 'checked' => 1), 's.nom' => array('label' => "ThirdParty", 'checked' => 1), 'f.fk_contrat' => array('label' => "Contract", 'checked' => 1), 'f.duree' => array('label' => "Duration", 'checked' => 1), 'f.total_ttc' => array('label' => "AmountTTC", 'checked' => 1), 'f.frequency' => array('label' => "RecurringInvoiceTemplate", 'checked' => 1), 'f.nb_gen_done' => array('label' => "NbOfGenerationDoneShort", 'checked' => 1), 'f.date_last_gen' => array('label' => "DateLastGeneration", 'checked' => 1), 'f.date_when' => array('label' => "NextDateToExecution", 'checked' => 1), 'f.datec' => array('label' => "DateCreation", 'checked' => 0, 'position' => 500), 'f.tms' => array('label' => "DateModificationShort", 'checked' => 0, 'position' => 500));
$result = \restrictedArea($user, 'ficheinter', $id, $objecttype);
$permissiontoadd = $user->hasRight('ficheinter', 'creer');
$permissiontodelete = $user->hasRight('ficheinter', 'supprimer');
$objp = \null;
/*
 * Actions
 */
$error = 0;
$action = '';
// gestion des fréquences et des échéances
$frequency = \GETPOSTINT('frequency');
$rec_year = \GETPOST('rec_year');
$rec_month = \GETPOST('rec_month');
$rec_day = \GETPOST('rec_day');
$rec_hour = \GETPOST('rec_hour');
$rec_min = \GETPOST('rec_min');
$nb_gen_max = \GETPOSTINT('nb_gen_max');
/*
 * View
 */
$help_url = '';
$form = new \Form($db);
$fichinterrecstatic = new \FichinterRec($db);
$companystatic = new \Societe($db);
$contratstatic = \null;
$projectstatic = \null;
$now = \dol_now();
$tmparray = \dol_getdate($now);
$today = \dol_mktime(23, 59, 59, $tmparray['mon'], $tmparray['mday'], $tmparray['year']);
$object = new \Fichinter($db);