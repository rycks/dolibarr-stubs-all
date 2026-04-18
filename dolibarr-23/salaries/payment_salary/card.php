<?php

// Security check
$id = \GETPOSTINT("id");
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm');
$salary = new \Salary($db);
$object = new \PaymentSalary($db);
$result = $object->fetch($id);
$result = $object->delete($user);
$datepaye = \dol_mktime(\GETPOSTINT('datephour'), \GETPOSTINT('datepmin'), \GETPOSTINT('datepsec'), \GETPOSTINT('datepmonth'), \GETPOSTINT('datepday'), \GETPOSTINT('datepyear'), 'tzuserrel');
$res = $object->updatePaymentDate($datepaye);
/*
 * View
 */
$form = new \Form($db);
$h = 0;
$head = array();
$hselected = (string) $h;
/*
 * Validation confirmation of payment
 */
/*
if ($action == 'valide')
{
	$facid = GETPOST('facid', 'int');
	print $form->formconfirm('card.php?id='.$object->id.'&amp;facid='.$facid, $langs->trans("ValidatePayment"), $langs->trans("ConfirmValidatePayment"), 'confirm_valide','',0,2);

}
*/
$linkback = '<a href="' . \DOL_URL_ROOT . '/salaries/payments.php">' . $langs->trans("BackToList") . '</a>';
/*
 * List of salaries paid
 */
$disable_delete = 0;
$sql = 'SELECT f.rowid as scid, f.label, f.paye, f.amount as sc_amount, ps.amount';
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$i = 0;
$total = 0;