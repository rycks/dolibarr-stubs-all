<?php

// load messages
$html = '';
$htmlSuccess = '';
$htmlWarning = '';
$htmlError = '';
$jsOut = '';
$jsSuccess = '';
$jsWarning = '';
$jsError = '';
//$useJNotify = false;
//if (!empty($conf->use_javascript_ajax) && empty($conf->global->MAIN_DISABLE_JQUERY_JNOTIFY)) {
//$useJNotify = true;
//}
$useJNotify = \true;
$htmlSuccess = $useJNotify ? '' : '<div class="success" role="alert">';
$msgNum = 0;
$htmlWarning = $useJNotify ? '' : '<div class="warning" role="alert">';
$msgNum = 0;
$htmlError = $useJNotify ? '' : '<div class="error" role="alert">';
$msgNum = 0;
$jsOut = $jsSuccess . $jsWarning . $jsError;