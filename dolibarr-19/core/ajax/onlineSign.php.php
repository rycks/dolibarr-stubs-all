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
 * Output the signature file
 *
 * @param 	TCPDF 		$pdf		PDF handler
 * @param	Translate	$langs		Language
 * @param	array		$params		Array of params
 * @return	void
 */
function dolPrintSignatureImage(\TCPDF $pdf, $langs, $params)
{
}