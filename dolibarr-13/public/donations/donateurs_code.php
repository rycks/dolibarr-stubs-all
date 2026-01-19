<?php

\define('NOLOGIN', '1');
\define('NOCSRFCHECK', '1');
\define('NOBROWSERNOTIF', '1');
\define('NOIPCHECK', '1');
// Do not check IP defined into conf $dolibarr_main_restrict_ip
// C'est un wrapper, donc header vierge
/**
 * Header function
 *
 * @return	void
 */
function llxHeaderVierge()
{
}
/**
 * Header function
 *
 * @return	void
 */
function llxFooterVierge()
{
}