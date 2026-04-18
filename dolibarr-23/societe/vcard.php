<?php

/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
$company = new \Societe($db);
$socid = \GETPOSTINT('id');
// Security check
$result = \restrictedArea($user, 'societe', $socid, '&societe');
$result = $company->fetch($socid);
// Compute VCard
$v = new \vCard();
// Send the vCard to the web client
$output = $v->getVCard();
$filename = \trim(\urldecode($v->getFileName()));
// "Nom prenom.vcf"
$filenameurlencoded = \dol_sanitizeFileName(\urlencode($filename));