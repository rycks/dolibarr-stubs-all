<?php

$upload_dir = $conf->expensereport->dir_output . "/" . \dol_sanitizeFileName($object->ref);
$arrayoffiles = \dol_dir_list($upload_dir, 'files', 0, '', '(\\.meta|_preview.*\\.png|' . \preg_quote(\dol_sanitizeFileName($object->ref . '.pdf'), '/') . ')$');
$nbFiles = \count($arrayoffiles);
$nbLinks = \Link::count($db, $object->element, $object->id);