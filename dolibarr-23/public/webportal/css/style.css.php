<?php

\define('NOREQUIRESOC', '1');
\define('NOCSRFCHECK', 1);
\define('NOTOKENRENEWAL', 1);
\define('NOLOGIN', 1);
\define('NOREQUIREHTML', 1);
\define('NOREQUIREAJAX', '1');
// __DIR__ allow this script to be included in custom themes
/**
 * @var Conf $conf
 * @var Translate $langs
 *
 * @var	string	$dolibarr_nocache
 */
/**
 _____   ____   _____   ____
|_   _| |  _ \ |_   _| |  _ \
  | |   | | | |  | |   | | | |
  | |   | |_| |  | |   | |_| |
  |_|   |____/   |_|   |____/

TODO: This is a CSS file — remove all PHP.
If you want customizations, use custom.css.php.
Before doing so, ask yourself if it’s really necessary.

You can also add a body class such as:
  - direction-ltr
  - direction-rtl
  - login-form-right
to change CSS behavior based on context.
*/
// TODO : USE CSS VAR(--font-family)
$fontlist = 'arial,tahoma,verdana,helvetica';
$colorbacktitle1 = '#fff';
$right = $langs->trans("DIRECTION") == 'rtl' ? 'left' : 'right';
$left = $langs->trans("DIRECTION") == 'rtl' ? 'right' : 'left';