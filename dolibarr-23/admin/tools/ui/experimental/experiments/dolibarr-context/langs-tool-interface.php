<?php

\define('NOREQUIRESOC', '1');
\define('NOREQUIREMENU', '1');
$local = \GETPOST('local');
$domain = \GETPOST('domain');
/*
Format for  JS:
{
  fr_FR : {KEY:"TEXT", ...},
  en_US : {KEY:"TEXT", ...}
}
*/
$locals = \explode(',', $local);
$json = new \stdClass();