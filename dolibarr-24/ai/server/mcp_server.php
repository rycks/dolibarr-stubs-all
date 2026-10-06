<?php

\define('NOTOKENRENEWAL', 1);
\define('NOREQUIREMENU', 1);
\define('NOREQUIREHTML', 1);
\define('NOREQUIREAJAX', 1);
\define('NOCSRFCHECK', 1);
\define('NOLOGIN', 1);
/**
 * Persist an MCP tools/call invocation to the llx_ai_request_log table.
 * Mirrors what parse_intent.php does for the web AI Assistant.
 * Only tools/call is logged -- lifecycle methods (initialize, ping,
 * notifications/initialized, tools/list, ...) are skipped to avoid noise.
 *
 * @param array<string,mixed>	$req		The JSON-RPC request
 * @param ?mixed				$resp		The JSON-RPC response (null for notifications)
 * @param float					$tStart		microtime(true) captured before processing
 * @param string				$rawInput	Raw request body
 * @return void								No return value, only logs the request
 */
function mcp_log_request(array $req, $resp, float $tStart, string $rawInput) : void
{
}