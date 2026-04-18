<?php

//$jNotifyCSSUrl = $context->rootUrl.'includes/jquery/plugins/jnotify/jquery.jnotify.css';
//$jNotifyCSSUrl = dol_buildpath('/includes/jquery/plugins/jnotify/jquery.jnotify.min.css', 2);
$jNotifyCSSUrl = \dirname($context->rootUrl) . '/includes/jquery/plugins/jnotify/jquery.jnotify.min.css?layout=classic';
// JQuery
//$jQueryJSUrl = $context->rootUrl.'includes/jquery/js/jquery.js';
//$jQueryJSUrl = dol_buildpath('/includes/jquery/js/jquery.js', 2);
$jQueryJSUrl = \dirname($context->rootUrl) . '/includes/jquery/js/jquery.min.js';
// JNotify
//$jNotifyJSUrl = $context->rootUrl.'includes/jquery/plugins/jnotify/jquery.jnotify.js';
//$jNotifyJSUrl = dol_buildpath('/includes/jquery/plugins/jnotify/jquery.jnotify.min.js', 2);
$jNotifyJSUrl = \dirname($context->rootUrl) . '/includes/jquery/plugins/jnotify/jquery.jnotify.min.js';
$bodyClass = ['login-page'];
$loginFormTheme = \getDolGlobalString('WEBPORTAL_LOGIN_FORM_THEME', 'default');