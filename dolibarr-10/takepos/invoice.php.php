<?php

\define('NOCSRFCHECK', '1');
\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
// $place is id of table for Bar or Restaurant
/**
 * Abort invoice creationg with a given error message
 *
 * @param   string  $message        Message explaining the error to the user
 * @return	void
 */
function fail($message)
{
}