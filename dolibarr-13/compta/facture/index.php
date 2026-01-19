<?php

/**
 * Return a HTML string that contains a additional search form
 *
 * @return string A HTML string that contains a additional search form
 */
function getAreaSearchFrom()
{
}
/**
 * Return a HTML table that contains a pie chart of customer invoices
 *
 * @param	int		$socid		(Optional) Show only results from the customer with this id
 * @return	string				A HTML table that contains a pie chart of customer invoices
 */
function getPieChart($socid = 0)
{
}
/**
 * Return a HTML table that contains a list with customer invoice drafts
 *
 * @param	int		$maxCount	(Optional) The maximum count of elements inside the table
 * @param	int		$socid		(Optional) Show only results from the customer with this id
 * @return	string				A HTML table that contains a list with customer invoice drafts
 */
function getDraftTable($maxCount = 500, $socid = 0)
{
}
/**
 * Return a HTML table that contains a list with latest edited customer invoices
 *
 * @param	int		$maxCount	(Optional) The maximum count of elements inside the table
 * @param	int		$socid		(Optional) Show only results from the customer with this id
 * @return	string				A HTML table that contains a list with latest edited customer invoices
 */
function getLatestEditTable($maxCount = 5, $socid = 0)
{
}
/**
 * Return a HTML table that contains a list with open (unpaid) customer invoices
 *
 * @param	int		$maxCount	(Optional) The maximum count of elements inside the table
 * @param	int		$socid		(Optional) Show only results from the customer with this id
 * @return	string				A HTML table that conatins a list with open (unpaid) customer invoices
 */
function getOpenTable($maxCount = 500, $socid = 0)
{
}