<?php

$objectprint = new \PrintingDriver($db);
$list = $objectprint->listDrivers($db, 10);
$dirmodels = \array_merge(array('/core/modules/printing/'), (array) $conf->modules_parts['printing']);
$action = '';