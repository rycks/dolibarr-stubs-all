<?php

/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
$action = \GETPOST('action', 'aZ09');
$numsondage = '';
// Initialize Objects
$object = new \Opensurveysondage($db);
$result = $object->fetch('', $numsondage);
/*
 * Actions
 */
/*
 * View
 */
$now = \dol_now();
$nbcolonnes = \substr_count($object->sujet, ',') + 1;
$toutsujet = \explode(",", $object->sujet);
$somme = array();
// affichage des sujets du sondage
$input = $langs->trans("Name") . ";";
$sql = 'SELECT nom as name, reponses';
$resql = $db->query($sql);
$filesize = \strlen($input);
$filename = $numsondage . "_" . \dol_print_date($now, '%Y%m%d%H%M') . ".csv";