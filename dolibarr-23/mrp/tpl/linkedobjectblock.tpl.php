<?php

$total = 0;
$ilink = 0;
$mo_static = new \Mo($db);
$res = $mo_static->fetch($object->id);
$TMoChilds = $mo_static->getMoChilds();
$parameters = array('TMoChilds' => $TMoChilds);
$reshook = $hookmanager->executeHooks('LinesLinkedObjectBlock', $parameters, $object, $action);