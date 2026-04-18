<?php

/**
 * @var Conf $conf
 * @var CommonObject $object
 * @var CommonObject $this
 * @var DoliDB $db
 * @var ExtraFields $extrafields
 * @var Translate $langs
 * @var User $user
 *
 * @var ?string $action
 * @var ?string $cancel
 * @var string $permissiontoadd
 * @var ?string $permissionedit
 * @var string $permissiontodelete
 * @var string $backurlforlist
 * @var ?string $backtopage
 * @var ?string $noback
 * @var ?string $triggermodname
 * @var string $hidedetails
 * @var string $hidedesc
 * @var string $hideref
 * @var ?string $confirm
 * @var ?int $lineid
 * @var ?int $id
 */
// $action or $cancel must be defined
// $object must be defined
// $permissiontoadd must be defined
// $permissiontodelete must be defined
// $backurlforlist must be defined
// $backtopage may be defined
// $noback may be defined
// $triggermodname may be defined
$hidedetails = isset($hidedetails) ? $hidedetails : '';
$hidedesc = isset($hidedesc) ? $hidedesc : '';
$hideref = isset($hideref) ? $hideref : '';
$error = 0;
$action = '';
// Special field
$model_pdf = \GETPOST('model');
// Action to update one modulebuilder field
$reg = array();
$keyforfield = $reg[1];
// Action to update one extrafield
$permissiontoeditextra = $permissiontoadd;
// @phan-suppress-current-line PhanTypeMismatchProperty
$attribute = \GETPOST('attribute', 'aZ09');
$error = 0;
// Fill array 'array_options' with data from update form
$ret = $extrafields->setOptionalsFromPost(\null, $object, $attribute);
$result = $object->delete($user);
$action = '';
$action = '';
$action = '';
$result = $object->cancel($user);
$action = '';
$result = $object->setDraft($user);
$action = '';
$result = $object->reopen($user);
$action = '';