<?php

\define("NOLOGIN", 1);
\define("NOCSRFCHECK", 1);
\define('NOIPCHECK', '1');
\define('NOBROWSERNOTIF', '1');
\define("DOLENTITY", $entity);
/**
 * Generate payment response
 *
 * @param \Stripe\PaymentIntent $intent PaymentIntent
 * @return void
 */
function generatePaymentResponse($intent)
{
}