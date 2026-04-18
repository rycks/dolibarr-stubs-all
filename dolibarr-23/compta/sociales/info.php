<?php

$id = \GETPOSTINT('id');
$action = \GETPOST('action', 'aZ09');
$object = new \ChargeSociales($db);
// Security check
$socid = \GETPOSTINT('socid');
$result = \restrictedArea($user, 'tax', $object->id, 'chargesociales', 'charges');
$result = $object->setValueFrom('libelle', \GETPOST('lib'), '', \null, 'text', '', $user, 'TAX_MODIFY');
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans("SocialContribution") . ' - ' . $langs->trans("Info");
$help_url = 'EN:Module_Taxes_and_social_contributions|FR:Module Taxes et dividendes|ES:M&oacute;dulo Impuestos y cargas sociales (IVA, impuestos)';
$head = \tax_prepare_head($object);
$alreadypayed = $object->getSommePaiement();
$morehtmlref = '<div class="refidno">';
$linkback = '<a href="' . \DOL_URL_ROOT . '/compta/sociales/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
// To give a chance to dol_banner_tab to use already paid amount to show correct status
$morehtmlstatus = '';