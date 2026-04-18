<?php

// Define colspan for the button 'Add'
$colspan = 3;
// Columns: col edit + col delete + move button
// Lines for extrafield
$objectline = \null;
$nolinesbefore = \count($this->lines) == 0 || $forcetoshowtitlelines;
$coldisplay = 0;
$parameters = array();
$reshook = $hookmanager->executeHooks('formCreateValueOptions', $parameters, $object, $action);