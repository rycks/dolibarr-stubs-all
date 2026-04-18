<?php

$action = \GETPOST('action', 'alpha');
//
$documentation = new \Documentation($db);
$morejs = ['/includes/ace/src/ace.js', '/includes/ace/src/ext-statusbar.js', '/includes/ace/src/ext-language_tools.js'];
$label = 'My action label used for accessibility visually for impaired people';
$user_right = 1;
$html = '<span class="fa fa-comment paddingright"></span>' . $langs->trans('DocSetEventMessageDisplayMessage');
$action_type = 'displayeventmessage';
$url = $_SERVER["PHP_SELF"] . '?action=displayeventmessage';
$label = 'My action label used for accessibility visually for impaired people';
$user_right = 1;
$html = '<span class="fa fa-comments paddingright"></span>' . $langs->trans('DocSetEventMessageDisplayMessages');
$action_type = 'displayeventmessages';
$url = $_SERVER["PHP_SELF"] . '?action=displayeventmessages';
$lines = array('<?php', '/**', '* Function setEventMessages', '*', '*  Set event messages in dol_events session object. Will be output by calling dol_htmloutput_events', '*  Note: Calling dol_htmloutput_events is done into pages by standard llxFooter() function', '*', '*  @param  string|null     $mesg       Message string', '*  @param  string[]|null   $mesgs      Message array', '*  @param  string  $style              Which style to use ("mesgs" by default, "warnings", "errors")', '*  @param  string  $messagekey         A key to be used to allow the feature "Never show this message during this session again"', '*  @param  int     $noduplicate        1 means we do not add the message if already present in session stack', '*  @return void', '*  @see	dol_htmloutput_events()', '*/', '', 'setEventMessages("message", null);', 'setEventMessages(null, messages[]);');
$label = 'My action label used for accessibility visually for impaired people';
$user_right = 1;
$html = '<span class="fa fa-comment paddingright"></span>' . $langs->trans('DocSetEventMessageDisplayOKMessage');
$action_type = 'displayeventmessageok';
$url = $_SERVER["PHP_SELF"] . '?action=displayeventmessageok#seteventmessagesection-contextvariations';
$label = 'My action label used for accessibility visually for impaired people';
$user_right = 1;
$html = '<span class="fa fa-comment paddingright"></span>' . $langs->trans('DocSetEventMessageDisplayWarningMessage');
$action_type = 'displayeventmessagewarning';
$url = $_SERVER["PHP_SELF"] . '?action=displayeventmessagewarning#seteventmessagesection-contextvariations';
$label = 'My action label used for accessibility visually for impaired people';
$user_right = 1;
$html = '<span class="fa fa-comment paddingright"></span>' . $langs->trans('DocSetEventMessageDisplayErrorMessage');
$action_type = 'displayeventmessageerror';
$url = $_SERVER["PHP_SELF"] . '?action=displayeventmessageerror#seteventmessagesection-contextvariations';
$lines = array('<?php', 'setEventMessages("message", null);', 'setEventMessages("message", null, "warnings");', 'setEventMessages("message", null, "errors");');