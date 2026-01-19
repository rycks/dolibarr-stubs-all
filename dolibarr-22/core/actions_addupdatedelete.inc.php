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