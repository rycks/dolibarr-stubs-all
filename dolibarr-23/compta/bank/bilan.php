<?php

/**
 * 	Get result of sql for field amount
 *
 * 	@param	string	$sql	SQL string
 * 	@return	int				Amount
 */
function valeur($sql)
{
}
$sql = "SELECT sum(amount) as amount FROM " . \MAIN_DB_PREFIX . "paiement";
$paiem = \valeur($sql);
$sql = "SELECT sum(amount) as amount FROM " . \MAIN_DB_PREFIX . "bank WHERE amount > 0";
$credits = \valeur($sql);
$sql = "SELECT sum(amount) as amount FROM " . \MAIN_DB_PREFIX . "bank WHERE amount < 0";
$debits = \valeur($sql);
$sql = "SELECT sum(amount) as amount FROM " . \MAIN_DB_PREFIX . "bank ";
$solde = \valeur($sql);