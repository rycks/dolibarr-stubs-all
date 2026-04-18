<?php

\define('NOCSRFCHECK', '1');
\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define("NOLOGIN", '1');
\define("NOSESSION", '1');
// Create the soap Object
$server = new \nusoap_server();
$ns = 'http://www.dolibarr.org/ns/';
// 5 styles: RPC/encoded, RPC/literal, Document/encoded (not WS-I compliant), Document/literal, Document/literal wrapped
// Style merely dictates how to translate a WSDL binding to a SOAP message. Nothing more. You can use either style with any programming model.
// http://www.ibm.com/developerworks/webservices/library/ws-whichwsdl/
$styledoc = 'rpc';
// rpc/document (document is an extend into SOAP 1.0 to support unstructured messages)
$styleuse = 'encoded';
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