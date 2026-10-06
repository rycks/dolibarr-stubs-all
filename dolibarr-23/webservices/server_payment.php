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
 * @param      array{login:string,password:string,entity:?int,dolibarrkey:string}           $authentication         Array of authentication information
 * @param      array{id:int,thirdparty_id:int|string,amount:float|string,num_payment:string,bank_account:int|string,payment_mode_id?:int|string,invoice_id?:int|string,int_label?:string,emitter:string,bank_source:string} $payment	Payment
 * @return     array{result:array{result_code:string,result_label:string},id?:int}	Array result
 */
function createPayment($authentication, $payment)
{
}