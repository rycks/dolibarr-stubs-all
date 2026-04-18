<?php

/*
 * View
 */
$form = new \Form($db);
$nowstring = \dol_print_date(\dol_now(), 'dayhourlog');
// Get PHP version
$phpversion = \version_php();
$test = !\function_exists('xdebug_is_debugger_active');
$test = !\isModEnabled('syslog');
$test = !\isModEnabled('debugbar');
$test = \isModEnabled('memcached');
$foundcache = 0;
$test = \function_exists('xcache_info');
$test = \function_exists('eaccelerator_info');
$test = \function_exists('opcache_get_status');
$test = \function_exists('apc_cache_info');
$test = $conf->db->type == 'mysqli';
// Product combo list
$sql = "SELECT COUNT(*) as nb";
$resql = $db->query($sql);
$limitforoptim = 5000;
$num = $db->num_rows($resql);
$obj = $db->fetch_object($resql);
$nb = (int) $obj->nb;
// Thirdparty combo list
$sql = "SELECT COUNT(*) as nb";
$resql = $db->query($sql);
$limitforoptim = 5000;
$num = $db->num_rows($resql);
$obj = $db->fetch_object($resql);
$nb = (int) $obj->nb;
// Contact combo list
$sql = "SELECT COUNT(*) as nb";
$resql = $db->query($sql);
$limitforoptim = 5000;
$num = $db->num_rows($resql);
$obj = $db->fetch_object($resql);
$nb = (int) $obj->nb;
// Contact combo list
$sql = "SELECT COUNT(*) as nb";
$resql = $db->query($sql);
$limitforoptim = 5000;
$num = $db->num_rows($resql);
$obj = $db->fetch_object($resql);
$nb = (int) $obj->nb;
// Bom combo list
$sql = "SELECT COUNT(*) as nb";
$resql = $db->query($sql);
$limitforoptim = 5000;
$num = $db->num_rows($resql);
$obj = $db->fetch_object($resql);
$nb = $obj->nb;
// Product search
$sql = "SELECT COUNT(*) as nb";
$resql = $db->query($sql);
$limitforoptim = 100000;
$num = $db->num_rows($resql);
$obj = $db->fetch_object($resql);
$nb = (int) $obj->nb;
// Thirdparty search
$sql = "SELECT COUNT(*) as nb";
$resql = $db->query($sql);
$limitforoptim = 100000;
$num = $db->num_rows($resql);
$obj = $db->fetch_object($resql);
$nb = (int) $obj->nb;
// Perf advice on max size on list
$MAXRECOMMENDED = 20;