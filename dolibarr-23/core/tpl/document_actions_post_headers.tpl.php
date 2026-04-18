<?php

// Drag and drop for up and down allowed on product, thirdparty, ...
// The drag and drop call the page core/ajax/row.php
// If you enable the move up/down of files here, check that page that include template set its sortorder on 'position_name' instead of 'name'
// Also the object->fk_element must be defined.
$disablemove = 1;
$parameters = array();
$reshook = $hookmanager->executeHooks('isLinkedDocumentObjectNotMovable', $parameters, $object);
$savingdocmask = '';
// Get the form to add files (upload and links)
$tmparray = $formfile->form_attach_new_file($_SERVER["PHP_SELF"] . '?id=' . $object->id . (empty($withproject) ? '' : '&withproject=1') . (empty($moreparam) ? '' : $moreparam), '', 0, 0, $permission, $conf->browser->layout == 'phone' ? 40 : 60, $object, '', 1, $savingdocmask, 1, 'formuserfile', '', '', 0, 0, 0, 2);
$formToUploadAFile = '';
$formToAddALink = '';