<?php

$sortfield = 'file';
$sortorder = 'ASC';
$form = new \Form($db);
$interfaces = new \Interfaces($db);
$triggers = $interfaces->getTriggersList();
$param = '';