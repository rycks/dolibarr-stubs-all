<?php

\define('NOCSRFCHECK', '1');
\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define("NOLOGIN", '1');
\define("NOSESSION", '1');
/**
 * Create a payment
 *
 * @param      array           $authentication         Array of authentication information
 * @param      Object          $payment                Payment
 * @return     array                                   Array result
 */
function createPayment($authentication, $payment)
{
}