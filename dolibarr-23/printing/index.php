<?php

// List Jobs from printing modules
$object = new \PrintingDriver($db);
$result = $object->listDrivers($db, 10);