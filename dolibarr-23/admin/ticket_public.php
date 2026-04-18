<?php

// Parameters
$value = \GETPOST('value', 'alpha');
$action = \GETPOST('action', 'aZ09');
$label = \GETPOST('label', 'alpha');
$scandir = \GETPOST('scandir', 'alpha');
$type = 'ticket';
/*
 * Actions
 */
$error = 0;
$errors = array();
/*
 * View
 */
$dirmodels = \array_merge(array('/'), (array) $conf->modules_parts['models']);
$form = new \Form($db);
$formcategory = new \FormCategory($db);
$help_url = "FR:Module_Ticket";
$page_name = "TicketSetup";
// Subheader
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
// Configuration header
$head = \ticketAdminPrepareHead();
$param = '';
$enabledisablehtml = $langs->trans("TicketsActivatePublicInterface") . ' ';
// Define $urlwithroot
$urlwithouturlroot = \preg_replace('/' . \preg_quote(\DOL_URL_ROOT, '/') . '$/i', '', \trim($dolibarr_main_url_root));
$urlwithroot = $urlwithouturlroot . \DOL_URL_ROOT;
// Interface topic
$url_interface = \getDolGlobalString("TICKET_PUBLIC_INTERFACE_TOPIC");
// Text on home page
$public_text_home = \getDolGlobalString('TICKET_PUBLIC_TEXT_HOME', '<span class="opacitymedium">' . $langs->trans("TicketPublicDesc") . '</span>');
$doleditor = new \DolEditor('TICKET_PUBLIC_TEXT_HOME', $public_text_home, '100%', 180, 'dolibarr_notes', '', \false, \true, \getDolGlobalInt('FCKEDITOR_ENABLE_TICKET'), \ROWS_2, '70');
// Text to help to enter a ticket
$public_text_help_message = \getDolGlobalString("TICKET_PUBLIC_TEXT_HELP_MESSAGE", $langs->trans('TicketPublicPleaseBeAccuratelyDescribe'));
$doleditor = new \DolEditor('TICKET_PUBLIC_TEXT_HELP_MESSAGE', $public_text_help_message, '100%', 180, 'dolibarr_notes', '', \false, \true, \getDolGlobalInt('FCKEDITOR_ENABLE_TICKET'), \ROWS_2, '70');
// Add first contact id found in database from submitter email entered into public interface
// Feature disabled: This has a security trouble. The public interface is a no login interface, so being able to show the contact info from an
// email decided by the submiter allows anybody to get information on any contact (customer or supplier) in Dolibarr database.
// He can even check if contact exists by trying any email if this feature is enabled.
/*
print '<tr class="oddeven"><td>'.$langs->trans("TicketAssignContactToMessage").'</td>';
print '<td class="left">';
if ($conf->use_javascript_ajax) {
	print ajax_constantonoff('TICKET_ASSIGN_CONTACT_TO_MESSAGE');
} else {
	$arrval = array('0' => $langs->trans("No"), '1' => $langs->trans("Yes"));
	print $formcategory->selectarray("TICKET_ASSIGN_CONTACT_TO_MESSAGE", $arrval, getDolGlobalString('TICKET_ASSIGN_CONTACT_TO_MESSAGE'));
}
print '</td>';
print '<td class="center">';
print $formcategory->textwithpicto('', $langs->trans("TicketAssignContactToMessageHelp"), 1, 'help');
print '</td>';
print '</tr>';
*/
// Url public interface
$url_interface = \getDolGlobalString("TICKET_URL_PUBLIC_INTERFACE");
// Text of email after creatio of a ticket
$mail_mesg_new = \getDolGlobalString("TICKET_MESSAGE_MAIL_NEW", $langs->trans('TicketNewEmailBody'));
$doleditor = new \DolEditor('TICKET_MESSAGE_MAIL_NEW', $mail_mesg_new, '100%', 120, 'dolibarr_mailings', '', \false, \true, \getDolGlobalInt('FCKEDITOR_ENABLE_MAIL'), \ROWS_2, '70');