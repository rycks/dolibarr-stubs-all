<?php

\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define('NOREQUIREMENU', '1');
\define("NOLOGIN", '1');
\define('NOIPCHECK', '1');
\define('NOBROWSERNOTIF', '1');
\define("DOLENTITY", $entity);
/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
$action = \GETPOST('action', 'aZ09');
/**
 * Output the signature file into the PDF object.
 *
 * @param 	TCPDF 		$pdf		PDF handler
 * @param	Translate	$langs		Language
 * @param	array<string,int|float|string|mixed[]>		$params		Array of params
 * @return	void
 */
function dolPrintSignatureImage(\TCPDF $pdf, $langs, $params)
{
}