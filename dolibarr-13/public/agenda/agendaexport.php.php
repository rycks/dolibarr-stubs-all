<?php

\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define("NOLOGIN", 1);
\define("NOCSRFCHECK", 1);
\define('NOIPCHECK', '1');
// Do not check IP defined into conf $dolibarr_main_restrict_ip
// It's a wrapper, so empty header
/**
 * Header function
 *
 * @return	void
 */
function llxHeaderVierge()
{
}
/**
 * Footer function
 *
 * @return	void
 */
function llxFooterVierge()
{
}
\define("DOLENTITY", $entity);