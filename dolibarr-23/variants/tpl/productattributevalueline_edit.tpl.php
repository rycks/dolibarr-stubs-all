<?php

// Define colspan for the button 'Add'
$colspan = 3;
$coldisplay = 0;
$parameters = array('line' => $line);
$reshook = $hookmanager->executeHooks('formEditProductOptions', $parameters, $object, $action);