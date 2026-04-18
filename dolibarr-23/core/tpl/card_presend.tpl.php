<?php

$fileparams = array();
$file = \null;
$titreform = 'SendMail';
$ref = \dol_sanitizeFileName($object->ref);
// Define output language
$outputlangs = $langs;
$newlang = '';
$topicmail = '';
// Build document if it does not exists
$forcebuilddoc = \true;
$formmail = new \FormMail($db);
// Set the default "From"
$defaultfrom = '';
// Define $liste, a list of recipients with email inside <>.
$liste = array();
$substitutionarray = \getCommonSubstitutionArray($outputlangs, 0, $arrayoffamiliestoexclude, $object);
$emailsendersignature = \null;
$parameters = array('mode' => 'formemail');
// Find all external contact addresses
$tmpobject = $object;
$contactarr = array();
$contactarr = $tmpobject->liste_contact(-1, 'external', 0, '', 1);