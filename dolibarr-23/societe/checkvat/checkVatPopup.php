<?php

\define('NOTOKENRENEWAL', '1');
//http://ec.europa.eu/taxation_customs/vies/checkVatService.wsdl
$WS_DOL_URL = 'https://ec.europa.eu/taxation_customs/vies/services/checkVatService';
//$WS_DOL_URL_WSDL=$WS_DOL_URL.'?wsdl';
$WS_DOL_URL_WSDL = 'https://ec.europa.eu/taxation_customs/vies/checkVatService.wsdl';
$WS_METHOD = 'checkVat';
$messagetoshow = '';
$vatNumber = \GETPOST("vatNumber", 'alpha');