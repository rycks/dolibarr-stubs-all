<?php

\define('WEBPORTAL', 1);
\define('NOLOGIN', 1);
\define('NOREQUIREUSER', 1);
\define('NOREQUIREMENU', 1);
\define('NOREQUIRESOC', 1);
\define('EVEN_IF_ONLY_LOGIN_ALLOWED', 1);
\define('NOIPCHECK', 1);
/**
 *  Return a prefix to use for this Dolibarr instance, for session/cookie names or email id.
 *  The prefix is unique for instance and avoid conflict between multi-instances, even when having two instances with same root dir
 *  or two instances in same virtual servers.
 *  This function must not use dol_hash (that is used for password hash) and need to have all context $conf loaded.
 *
 *  @param  string  $mode                   '' (prefix for session name) or 'email' (prefix for email id)
 *  @return	string                          A calculated prefix
 */
function dol_getprefix($mode = '')
{
}