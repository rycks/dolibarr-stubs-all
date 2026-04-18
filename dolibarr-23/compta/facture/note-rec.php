<?php

$id = \GETPOSTINT('id') ? \GETPOSTINT('id') : \GETPOSTINT('facid');
// For backward compatibility
$ref = \GETPOST('ref', 'alpha');
$socid = \GETPOSTINT('socid');
$action = \GETPOST('action', 'aZ09');
$objecttype = 'facture_rec';
$object = new \FactureRec($db);
$permissionnote = $user->hasRight('facture', 'creer');
// Used by the include of actions_setnotes.inc.php
// Security check
$socid = 0;
$result = \restrictedArea($user, 'facture', $object->id, $objecttype);
$usercancreate = $user->hasRight("facture", "creer");
/*
 * Actions
 */
$reshook = $hookmanager->executeHooks('doActions', array(), $object, $action);
/*
 * View
 */
$form = new \Form($db);
$helpurl = "EN:Customers_Invoices|FR:Factures_Clients|ES:Facturas_a_clientes";
$object = new \FactureRec($db);
$head = \invoice_rec_prepare_head($object);
$totalpaid = $object->getSommePaiement();
// Object card
// ------------------------------------------------------------
$linkback = '<a href="' . \DOL_URL_ROOT . '/compta/facture/list.php?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '';
$morehtmlstatus = '';
$cssclass = "titlefield";
// Help of substitution key
$dateexample = \dol_now();
$substitutionarray = \getCommonSubstitutionArray($langs, 2, \null, $object);
$htmltext = '<i>' . $langs->trans("FollowingConstantsWillBeSubstituted") . ':<br>';
$textNotePub = $form->textwithpicto($langs->trans('NotePublic'), $htmltext, 1, 'help', '', 0, 2, 'notepublic', 2);
$textNotePrive = $form->textwithpicto($langs->trans("NotePrivate"), $htmltext, 1, 'help', '', 0, 2, 'noteprivate');