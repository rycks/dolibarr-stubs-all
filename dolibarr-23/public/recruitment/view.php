<?php

\define("NOLOGIN", 1);
\define("NOCSRFCHECK", 1);
\define('NOIPCHECK', '1');
\define('NOBROWSERNOTIF', '1');
// Get parameters
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$email = \GETPOST('email', 'alpha');
$firstname = \GETPOST('firstname', 'alpha');
$lastname = \GETPOST('lastname', 'alpha');
$birthday = \GETPOST('birthday', 'alpha');
$phone = \GETPOST('phone', 'alpha');
$message = \GETPOST('message', 'alpha');
$SECUREKEY = \GETPOST("securekey");
$requestedremuneration = \GETPOST('requestedremuneration', 'alpha');
$ref = \GETPOST('ref', 'alpha');
$object = new \RecruitmentJobPosition($db);
// Define $urlwithroot
// $urlwithouturlroot=preg_replace('/'.preg_quote(DOL_URL_ROOT,'/').'$/i','',trim($dolibarr_main_url_root));
// $urlwithroot=$urlwithouturlroot.DOL_URL_ROOT;		// This is to use external domain name found into config file
$urlwithroot = \DOL_MAIN_URL_ROOT;
// This is to use same domain name than current. For Paypal payment, we can use internal URL like localhost.
$backtopage = $urlwithroot . '/public/recruitment/index.php';
$errmsg = "";
$extrafields = new \ExtraFields($db);
$captchaobj = \null;
$captcha = \getDolGlobalString('MAIN_SECURITY_ENABLECAPTCHA_HANDLER', 'standard');
// List of directories where we can find captcha handlers
$dirModCaptcha = \array_merge(array('main' => '/core/modules/security/captcha/'), \is_array($conf->modules_parts['captcha']) ? $conf->modules_parts['captcha'] : array());
$fullpathclassfile = '';
// Test on permission not required here (anonymous action protected by mitigation of /public/... urls)
$error = 0;
// Check Captcha code if is enabled
$ok = \false;
// Actions to send emails (for ticket, we need to manage the addfile and removefile only)
$triggersendname = 'CANDIDATURE_SENTBYMAIL';
$paramname = 'id';
$autocopy = 'MAIN_MAIL_AUTOCOPY_CANDIDATURE_TO';
// used to know the automatic BCC to add
$trackid = 'recruitmentcandidature' . $object->id;
/*
 * View
 */
$form = new \Form($db);
$now = \dol_now();
$head = '';
$arrayofjs = array();
$arrayofcss = array();
$replacemainarea = (empty($conf->dol_hide_leftmenu) ? '<div>' : '') . '<div>';
// Show logo (search order: logo defined by ONLINE_SIGN_LOGO_suffix, then ONLINE_SIGN_LOGO_, then small company logo, large company logo, theme logo, common logo)
// Define logo and logosmall
$logosmall = $mysoc->logo_small;
$logo = $mysoc->logo;
$paramlogo = 'ONLINE_RECRUITMENT_LOGO_' . $suffix;
//print '<!-- Show logo (logosmall='.$logosmall.' logo='.$logo.') -->'."\n";
// Define urllogo
$urllogo = '';
$urllogofull = '';
// Output introduction text
$text = '';
$reg = array();
$text = '<tr><td align="center"><br>' . $text . '<br></td></tr>' . "\n";
$error = 0;
$found = \true;
// Contact
$tmpuser = new \User($db);
$emailforcontact = $object->email_recruiter;
$emailforcontact = $tmpuser->email ?? '';
// Description
$text = $object->description;