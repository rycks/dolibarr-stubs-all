<?php

\define('NOREQUIRESOC', '1');
\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
/**
 * @var Conf $conf
 */
$id = \GETPOSTINT('id');
$w = \GETPOSTINT('w');
$h = \GETPOSTINT('h');
$query = \GETPOST('query', 'alpha');