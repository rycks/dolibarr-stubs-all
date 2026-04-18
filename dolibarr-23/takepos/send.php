<?php

\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var Societe $mysoc
 * @var Translate $langs
 * @var User $user
 */
$facid = \GETPOSTINT('facid');
$action = \GETPOST('action', 'aZ09');
$email = \GETPOST('email', 'alpha');
$invoice = new \Facture($db);
$customer = new \Societe($db);
$formmail = new \FormMail($db);
$outputlangs = new \Translate('', $conf);
$model_id = \getDolGlobalInt('TAKEPOS_EMAIL_TEMPLATE_INVOICE');
$arraydefaultmessage = $formmail->getEMailTemplate($db, 'facture_send', $user, $outputlangs, $model_id);
$subject = $arraydefaultmessage->topic;
$receipt = \ob_get_contents();
$msg = "<html>" . $arraydefaultmessage->content . "<br>" . $receipt . "</html>";
$sendto = $email;
$from = $mysoc->email;
$mail = new \CMailFile($subject, $sendto, $from, $msg, array(), array(), array(), '', '', 0, 1, '', '', '', '', '', '', \DOL_DATA_ROOT . '/documents/takepos/temp');
/*
 * View
 */
$arrayofcss = array('/takepos/css/pos.css.php');
$arrayofjs = array();
$head = '';