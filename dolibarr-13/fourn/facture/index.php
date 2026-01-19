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
 * Return a HTML table that contains a pie chart of supplier invoices
 *
 * @param	int		$socid		(Optional) Show only results from the supplier with this id
 * @return	string				A HTML table that contains a pie chart of supplier invoices
 */
function getPieChart($socid = 0)
{
}
/**
 * Return a HTML table that contains a list with supplier invoice drafts
 *
 * @param	int		$maxCount	(Optional) The maximum count of elements inside the table
 * @param	int		$socid		(Optional) Show only results from the supplier with this id
 * @return	string				A HTML table that contains a list with supplier invoice drafts
 */
function getDraftTable($maxCount = 500, $socid = 0)
{
}
/**
 * Return a HTML table that contains a list with latest edited supplier invoices
 *
 * @param	int		$maxCount	(Optional) The maximum count of elements inside the table
 * @param	int		$socid		(Optional) Show only results from the supplier with this id
 * @return	string				A HTML table that contains a list with latest edited supplier invoices
 */
function getLatestEditTable($maxCount = 5, $socid = 0)
{
}
/**
 * Return a HTML table that contains a list with open (unpaid) supplier invoices
 *
 * @param	int		$maxCount	(Optional) The maximum count of elements inside the table
 * @param	int		$socid		(Optional) Show only results from the supplier with this id
 * @return	string				A HTML table that conatins a list with open (unpaid) supplier invoices
 */
function getOpenTable($maxCount = 500, $socid = 0)
{
}