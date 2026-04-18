<?php

$rowid = \GETPOSTINT('rowid');
$action = \GETPOST('action', 'aZ09');
// Define possible position of boxes
$arrayofhomepages = \InfoBox::getListOfPagesForBoxes();
$boxes = array();
$error = 0;
$boxids = \GETPOST('boxid', 'array');
$sql = "SELECT box_id FROM " . \MAIN_DB_PREFIX . "boxes";
$resql = $db->query($sql);
$obj = $db->fetch_object($resql);
$objfrom = new \ModeleBoxes($db);
$objto = new \ModeleBoxes($db);
$resultupdatefrom = 0;
$resultupdateto = 0;
/*
 * View
 */
$form = new \Form($db);
/*
 * Search for the default active boxes for each possible position
 * We store the active boxes by default in $boxes[position][id_boite]=1
 */
$actives = array();
$sql = "SELECT b.rowid, b.box_id, b.position, b.box_order,";
$resql = $db->query($sql);
$num = $db->num_rows($resql);
// Check record to know if we must recalculate sort order
$i = 0;
$decalage = 0;
// Available boxes to activate
$boxtoadd = \InfoBox::listBoxes($db, 'available', -1, \null, $actives);
// Activated boxes
$boxactivated = \InfoBox::listBoxes($db, 'activated', -1, \null);
$box_order = 1;
$foundrupture = 1;