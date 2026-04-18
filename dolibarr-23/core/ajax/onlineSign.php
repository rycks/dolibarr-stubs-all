<?php

\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define('NOREQUIREMENU', '1');
\define("NOLOGIN", '1');
\define('NOIPCHECK', '1');
\define('NOBROWSERNOTIF', '1');
$entity = !empty($_GET['entity']) ? (int) $_GET['entity'] : (!empty($_POST['entity']) ? (int) $_POST['entity'] : 1);
\define("DOLENTITY", $entity);
/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
$action = \GETPOST('action', 'aZ09');
$signature = \GETPOST('signaturebase64');
$ref = \GETPOST('ref', 'aZ09');
$mode = \GETPOST('mode', 'aZ09');
// 'proposal', ...
$SECUREKEY = \GETPOST("securekey");
// Secure key
$online_sign_name = \GETPOST("onlinesignname");
$error = 0;
$response = "";
$type = $mode;
// Security check
$securekeyseed = '';
$issignatureok = !empty($signature) && $signature[0] == "image/png;base64";
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