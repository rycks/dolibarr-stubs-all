<?php

$stripearrayofkeysbyenv = array(array("secret_key" => \getDolGlobalString('STRIPE_TEST_SECRET_KEY'), "publishable_key" => \getDolGlobalString('STRIPE_TEST_PUBLISHABLE_KEY')), array("secret_key" => \getDolGlobalString('STRIPE_LIVE_SECRET_KEY'), "publishable_key" => \getDolGlobalString('STRIPE_LIVE_PUBLISHABLE_KEY')));
$stripearrayofkeys = array();