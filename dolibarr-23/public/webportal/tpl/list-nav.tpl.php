<?php

// Get nb pages
$nbPages = 0;
$maxPaginationItem = \min($nbPages, 5);
$minPageNum = \max(1, $formList->page - 3);
$maxPageNum = \min($nbPages, $formList->page + 3);
$params = $formList->params . '&amp;sortfield=' . $formList->sortfield . '&amp;sortorder=' . $formList->sortorder;
$params = \preg_replace('/^(&|&amp;)/i', '', $params);
// remove first & or &amp;
$url = $context->getControllerUrl($context->controller);