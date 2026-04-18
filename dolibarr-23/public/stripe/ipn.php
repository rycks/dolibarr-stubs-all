<?php

\define("NOLOGIN", 1);
\define("NOCSRFCHECK", 1);
\define('NOIPCHECK', '1');
\define('NOBROWSERNOTIF', '1');
// Because 2 entities can have the same ref.
$entity = !empty($_GET['entity']) ? (int) $_GET['entity'] : (!empty($_POST['entity']) ? (int) $_POST['entity'] : 1);
\define("DOLENTITY", $entity);
\define('USESUFFIXINLOG', '_stripeipn');
$now = \dol_now();
// Security
// The test on security key is done later into constructEvent() method.
/*
 * Actions
 */
$payload = @\file_get_contents("php://input");
$sig_header = empty($_SERVER["HTTP_STRIPE_SIGNATURE"]) ? '' : $_SERVER["HTTP_STRIPE_SIGNATURE"];
$event = \null;
$fh = \fopen(\DOL_DATA_ROOT . '/dolibarr_stripeipn_payload.log', 'w+');
$error = 0;
$sql = "SELECT entity";
$result = $db->query($sql);
$ret = $mc->switchEntity($key);
$stripe = new \Stripe($db);
// Subject
$societeName = \getDolGlobalString('MAIN_INFO_SOCIETE_NOM');
$error = 0;
$result = \dolibarr_set_const($db, $service . "_NEXTPAYOUT", \date('Y-m-d H:i:s', $event->data->object->arrival_date), 'chaine', 0, '', $conf->entity);