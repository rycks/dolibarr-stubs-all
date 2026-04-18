<?php

/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alphanohtml');
$object = new \Adherent($db);
// Load member
$result = $object->fetch($id, $ref);
// Define variables to know what current user can do on users
$canadduser = $user->admin || $user->hasRight('user', 'user', 'creer');
// Define variables to determine what the current user can do on the members
$canaddmember = $user->hasRight('adherent', 'creer');
// Security check
$result = \restrictedArea($user, 'adherent', $object->id, '', '', 'socid', 'rowid', 0);
/*
 * Actions
 */
// None
/*
 * View
 */
$company = new \Societe($db);
// We create VCard
$v = new \vCard();
$country = $object->country_code ? $object->country : '';
// Renvoi la VCard au navigateur
$output = $v->getVCard();
$filename = \trim(\urldecode($v->getFileName()));
// "Nom prenom.vcf"
$filenameurlencoded = \dol_sanitizeFileName(\urlencode($filename));