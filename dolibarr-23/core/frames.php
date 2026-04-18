<?php

$mainmenu = \GETPOST('mainmenu', "aZ09");
$leftmenu = \GETPOST('leftmenu', "aZ09");
$idmenu = \GETPOSTINT('idmenu');
$theme = \GETPOST('theme', 'aZ09');
$codelang = \GETPOST('lang', 'aZ09');
$menu = new \Menubase($db);
$reg = array();
$keyforcontent = '';