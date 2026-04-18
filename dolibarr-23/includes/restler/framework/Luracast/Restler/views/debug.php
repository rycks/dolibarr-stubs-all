<?php

$template_vars = $data;
$call_trace = '';
function exceptions()
{
}
function parse_backtrace($raw, $skip = 1)
{
}
function render($data, $shadow = \true)
{
}
$reqHeadersArr = array();
$requestHeaders = $_SERVER['REQUEST_METHOD'] . ' ' . $_SERVER['REQUEST_URI'] . ' ' . $_SERVER['SERVER_PROTOCOL'] . \PHP_EOL;
// $requestHeaders = $this->encode(apache_request_headers(), FALSE,
// FALSE);
$responseHeaders = \implode(\PHP_EOL, \headers_list()) . \PHP_EOL . 'Status: HTTP/1.1 ';