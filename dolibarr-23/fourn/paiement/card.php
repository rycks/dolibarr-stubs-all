<?php

// Get Parameters
$id = \GETPOSTINT('id');
$action = \GETPOST('action', 'alpha');
$confirm = \GETPOST('confirm', 'alpha');
$socid = 0;
// Initialize objects
$object = new \PaiementFourn($db);
// Must be 'include', not 'include_once'.
$result = \restrictedArea($user, $object->element, $object->id, 'paiementfourn', '');
$permissiontoadd = $user->hasRight("fournisseur", "facture", "creer") || $user->hasRight("supplier_invoice", "write");
$permissiontovalidate = !\getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && ($user->hasRight("fournisseur", "facture", "creer") || $user->hasRight("supplier_invoice", "write")) || \getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && $user->hasRight("fournisseur", "supplier_invoice_advance", "validate");
$permissiontodelete = $user->hasRight("fournisseur", "facture", "supprimer") || $user->hasRight("supplier_invoice", "delete");
$result = $object->update_note(\GETPOST('note', 'restricthtml'));
$result = $object->delete($user);
$res = $object->update_num(\GETPOST('num_paiement'));
$datepaye = \dol_mktime(\GETPOSTINT('datephour'), \GETPOSTINT('datepmin'), \GETPOSTINT('datepsec'), \GETPOSTINT('datepmonth'), \GETPOSTINT('datepday'), \GETPOSTINT('datepyear'));
$res = $object->update_date($datepaye);
// Build document
$upload_dir = $conf->fournisseur->payment->dir_output;
// Actions to send emails
$triggersendname = 'PAYMENTRECEIPT_SENTBYMAIL';
$paramname = 'id';
$autocopy = 'MAIN_MAIL_AUTOCOPY_SUPPLIER_INVOICE_TO';
$trackid = 'pre' . $object->id;
$result = $object->fetch($id);
$form = new \Form($db);
$formfile = new \FormFile($db);
$head = \payment_supplier_prepare_head($object);
$linkback = '<a href="' . \DOL_URL_ROOT . '/fourn/paiement/list.php' . (!empty($socid) ? '?socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '';
// Payment mode
$labeltype = $langs->trans("PaymentType" . $object->type_code) != "PaymentType" . $object->type_code ? $langs->trans("PaymentType" . $object->type_code) : $object->type_label;
$allow_delete = 1;
$title_button = '';
/**
 *	List of seller's invoices
 */
$sql = 'SELECT f.rowid, f.rowid as facid, f.ref, f.ref_supplier, f.type, f.paye, f.total_ht, f.total_tva, f.total_ttc, f.datef as date, f.fk_statut as status,';
$resql = $db->query($sql);
// Presend form
$modelmail = 'supplier_payment_send';
$defaulttopic = 'SendPaymentReceipt';
$diroutput = $conf->fournisseur->payment->dir_output;
$autocopy = 'MAIN_MAIL_AUTOCOPY_SUPPLIER_INVOICE_TO';
$trackid = 'pre' . $object->id;