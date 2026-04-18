<?php

$action = \GETPOST('action', 'aZ09');
// Possible modes are:
// dolibarr_details
// dolibarr_notes
// dolibarr_readonly
// dolibarr_mailings
// Full (not sure this one is used)
$mode = \GETPOST('mode') ? \GETPOST('mode', 'alpha') : 'dolibarr_notes';
// Constant and translation of the module description
$modules = array('NOTE_PUBLIC' => 'FCKeditorForNotePublic', 'NOTE_PRIVATE' => 'FCKeditorForNotePrivate', 'SOCIETE' => 'FCKeditorForCompany', 'DETAILS' => 'FCKeditorForProductDetails', 'USERSIGN' => 'FCKeditorForUserSignature', 'MAILING' => 'FCKeditorForMailing', 'MAIL' => 'FCKeditorForMail', 'TICKET' => 'FCKeditorForTicket');
// Conditions for the option to be offered
$conditions = array('NOTE_PUBLIC' => 1, 'NOTE_PRIVATE' => 1, 'SOCIETE' => 1, 'PRODUCTDESC' => \isModEnabled("product") || \isModEnabled("service"), 'DETAILS' => \isModEnabled('invoice') || \isModEnabled("propal") || \isModEnabled('order') || \isModEnabled('supplier_proposal') || \isModEnabled("supplier_order") || \isModEnabled("supplier_invoice"), 'USERSIGN' => 1, 'MAILING' => \isModEnabled('mailing'), 'MAIL' => \isModEnabled('invoice') || \isModEnabled("propal") || \isModEnabled('order'), 'TICKET' => \isModEnabled('ticket'));
// Picto
$picto = array('NOTE_PUBLIC' => 'generic', 'NOTE_PRIVATE' => 'generic', 'SOCIETE' => 'generic', 'PRODUCTDESC' => 'product', 'DETAILS' => 'product', 'USERSIGN' => 'user', 'MAILING' => 'email', 'MAIL' => 'email', 'TICKET' => 'ticket');
$error = 0;
$fckeditor_test = \GETPOST('formtestfield', 'restricthtml');
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';