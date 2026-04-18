<?php

$jQueryUICSSUrl = $context->cdnUrl . '/jquery/css/base/jquery-ui.min.css?layout=classic';
//$jNotifyCSSUrl = $context->rootUrl.'includes/jquery/plugins/jnotify/jquery.jnotify.css';
//$jNotifyCSSUrl = dol_buildpath('/includes/jquery/plugins/jnotify/jquery.jnotify.min.css', 2);
$jNotifyCSSUrl = $context->cdnUrl . '/jquery/plugins/jnotify/jquery.jnotify.min.css?layout=classic';
// JQuery
$jQueryJSUrl = $context->cdnUrl . '/jquery/js/jquery.min.js';
$jQueryUIJSUrl = $context->cdnUrl . '/jquery/js/jquery-ui.min.js';
// JNotify
//$jNotifyJSUrl = $context->rootUrl.'includes/jquery/plugins/jnotify/jquery.jnotify.js';
//$jNotifyJSUrl = dol_buildpath('/includes/jquery/plugins/jnotify/jquery.jnotify.min.js', 2);
$jNotifyJSUrl = $context->cdnUrl . '/jquery/plugins/jnotify/jquery.jnotify.min.js';
// Modal script
$ModalJSUrl = $context->rootUrl . 'js/modal.js';
// Common dolibarr js functions
$jQueryUIJSUrl = $context->rootUrl . 'js/lib_head.js.php';
$bodyAttributes = ['data-theme' => $vars['body-theme'] ?? 'custom', 'data-controller' => $context->controller];
$parameters = array('bodyAttributes' => &$bodyAttributes);
$bodyCompiledAttributes = \commonHtmlAttributeBuilder($bodyAttributes);