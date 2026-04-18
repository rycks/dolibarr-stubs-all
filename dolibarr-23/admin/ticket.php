<?php

// Parameters
$value = \GETPOST('value', 'alpha');
$action = \GETPOST('action', 'aZ09');
$modulepart = \GETPOST('modulepart', 'aZ09');
// Used by actions_setmoduleoptions.inc.php
$label = \GETPOST('label', 'alpha');
$scandir = \GETPOST('scan_dir', 'alpha');
$type = 'ticket';
$error = 0;
$reg = array();
// Initiate status list
$statuslist = array(\Ticket::STATUS_IN_PROGRESS => $langs->trans("InProgress"), \Ticket::STATUS_NOT_READ => $langs->trans("NotRead"), \Ticket::STATUS_READ => $langs->trans("Read"), \Ticket::STATUS_ASSIGNED => $langs->trans("Assigned"), \Ticket::STATUS_NEED_MORE_INFO => $langs->trans("NeedMoreInformationShort"), \Ticket::STATUS_WAITING => $langs->trans("Waiting"), \Ticket::STATUS_CLOSED => $langs->trans("SolvedClosed"));
// only for no js case
$param_disable_email = \GETPOST('TICKET_CHECK_NOTIFY_THIRDPARTY_AT_CREATION', 'alpha');
$res = \dolibarr_set_const($db, 'TICKET_CHECK_NOTIFY_THIRDPARTY_AT_CREATION', $param_disable_email, 'chaine', 0, '', $conf->entity);
$maskconstticket = \GETPOST('maskconstticket', 'aZ09');
$maskticket = \GETPOST('maskticket', 'alpha');
$res = 0;
/*
 * View
 */
$dirmodels = \array_merge(array('/'), (array) $conf->modules_parts['models']);
$formcategory = new \FormCategory($db);
$form = new \Form($db);
// Page Header
$help_url = 'EN:Module_Ticket|FR:Module_Ticket_FR';
$page_name = 'TicketSetup';
// Subheader
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
// Configuration header
$head = \ticketAdminPrepareHead();
// Load array def with activated templates
$def = array();
$sql = "SELECT nom";
$resql = $db->query($sql);
// Message header
$mail_intro = \getDolGlobalString('TICKET_MESSAGE_MAIL_INTRO', '');
$doleditor = new \DolEditor('TICKET_MESSAGE_MAIL_INTRO', $mail_intro, '100%', 90, 'dolibarr_mailings', '', \false, \true, \getDolGlobalInt('FCKEDITOR_ENABLE_MAIL'), \ROWS_2, '70');
// Message footer
$mail_signature = \getDolGlobalString('TICKET_MESSAGE_MAIL_SIGNATURE');
$doleditor = new \DolEditor('TICKET_MESSAGE_MAIL_SIGNATURE', $mail_signature, '100%', 90, 'dolibarr_mailings', '', \false, \true, \getDolGlobalInt('FCKEDITOR_ENABLE_MAIL'), \ROWS_2, '70');