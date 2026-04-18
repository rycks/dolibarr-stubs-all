<?php

$address = \ini_get('xdebug.client_host') ? \ini_get('xdebug.client_host') : '127.0.0.1';
$port = \ini_get('xdebug.client_port') ? (int) \ini_get('xdebug.client_port') : 9000;
$socket = \socket_create(\AF_INET, \SOCK_STREAM, \SOL_TCP);
//socket_bind($sock, $address, $port) or die('Unable to bind on address='.$address.' port='.$port);
//socket_listen($sock);
//$client = socket_accept($sock);
$client = \socket_connect($socket, $address, $port);