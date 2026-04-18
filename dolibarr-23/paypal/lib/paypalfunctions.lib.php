<?php

// ==================================
// PayPal Express Checkout Module
// ==================================
$API_version = "56";
// Clean parameters
$PAYPAL_API_USER = \getDolGlobalString('PAYPAL_API_USER');
$PAYPAL_API_PASSWORD = \getDolGlobalString('PAYPAL_API_PASSWORD');
$PAYPAL_API_SIGNATURE = \getDolGlobalString('PAYPAL_API_SIGNATURE');
$PAYPAL_API_SANDBOX = \getDolGlobalString('PAYPAL_API_SANDBOX');
// Proxy
$PROXY_HOST = \getDolGlobalString('MAIN_PROXY_HOST');
$PROXY_PORT = \getDolGlobalString('MAIN_PROXY_PORT');
$PROXY_USER = \getDolGlobalString('MAIN_PROXY_USER');
$PROXY_PASS = \getDolGlobalString('MAIN_PROXY_PASS');
$USE_PROXY = \getDolGlobalBool('MAIN_PROXY_USE');