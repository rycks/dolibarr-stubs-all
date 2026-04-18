<?php

/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
$contact = new \Contact($db);
$id = \GETPOSTINT('id');
// Security check
$result = \restrictedArea($user, 'contact', $id, 'socpeople&societe');
$result = $contact->fetch($id);
$company = new \Societe($db);
// We create VCard
$v = new \vCard();
$country = $contact->country_code ? $contact->country : '';
// Renvoi la VCard au navigateur
$output = $v->getVCard();
$filename = \trim(\urldecode($v->getFileName()));
// "Nom prenom.vcf"
$filenameurlencoded = \dol_sanitizeFileName(\urlencode($filename));