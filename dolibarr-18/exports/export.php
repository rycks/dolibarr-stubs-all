<?php

// don't know why but apache hangs with php 5.3.10-1ubuntu3.12 and apache 2.2.2 if i remove this exit or replace with return
/**
 * 	Return table name of an alias. For this, we look for the "tablename as alias" in sql string.
 *
 * 	@param	string	$code				Alias.Fieldname
 * 	@param	string	$sqlmaxforexport	SQL request to parse
 * 	@return	string						Table name of field
 */
function getablenamefromfield($code, $sqlmaxforexport)
{
}