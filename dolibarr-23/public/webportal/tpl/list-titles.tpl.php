<?php

$url = $context->getControllerUrl($context->controller);
// Make array[sort field => sort order] for this list
$sortList = \array_combine(\explode(",", $formList->sortfield), \explode(",", $formList->sortorder));
// Hook fields
$parameters = array('sortList' => $sortList);
$reshook = $hookmanager->executeHooks('printFieldListTitle', $parameters, $context);