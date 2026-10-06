<?php

\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
/**
 * Abort invoice creation with a given error message
 *
 * @param   string  $message        Message explaining the error to the user
 * @return	never
 */
function fail($message)
{
}
/**
 * Delete an invoice line and the TakePOS supplement lines attached to it.
 *
 * @param	Facture	$invoice	Invoice object
 * @param	int		$lineid		Line id to delete
 * @return	int					Return integer <0 if KO, >0 if OK
 */
function takeposDeleteLineWithChildren($invoice, $lineid)
{
}