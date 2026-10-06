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