<?php

/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
$id = \GETPOSTINT('id');
// Security check
$socid = 0;
$feature2 = 'user';
$result = \restrictedArea($user, 'user', $id, 'user', $feature2);
$object = new \User($db);
$result = $object->fetch($id);
// Data from linked company
$company = new \Societe($db);
// We create VCard
$v = new \vCard();
$output = $v->buildVCardString($object, $company, $langs);
$filename = \trim(\urldecode($v->getFileName()));
// "Nom prenom.vcf"
$filenameurlencoded = \dol_sanitizeFileName(\urlencode($filename));