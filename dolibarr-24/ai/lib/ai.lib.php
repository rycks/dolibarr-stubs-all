<?php

/**
 * Prepare admin pages header
 *
 * @return array<string,array<string,string>>
 */
function getListOfAIFeatures()
{
}
/**
 * Get list of available ai services
 *
 * @return array<int|string,mixed>
 */
function getListOfAIServices()
{
}
/**
 * Tests the connection to an AI service using its API key and URL by sending message "Hello"
 *
 * This function supports multiple AI providers (Google Gemini, Anthropic Claude, and OpenAI-compatible APIs like
 * Mistral, Groq, and DeepSeek). It constructs a minimal, provider-specific request payload and sends it
 * to the given endpoint to verify that the API key is valid and the service is reachable.
 *
 * @param string $service The identifier of the AI service (e.g., 'google', 'anthropic', 'openai', 'mistral').
 * @param string $key The API key for the service.
 * @param string $url The base URL of the AI service's API endpoint.
 *
 * @return array{success: bool, message: string} An associative array indicating the result of the test.
 *               - 'success' is true on a successful connection (HTTP 2xx), false otherwise.
 *               - 'message' provides details, such as "OK (HTTP 200)" or an error description.
 */
function testAIConnection(string $service, string $key, string $url) : array
{
}
/**
 * Log AI Request with Raw Payloads
 *
 * @param   DoliDB                  $db         Database object
 * @param   User                    $user       User object
 * @param   string                  $query      The query sent to the AI
 * @param   array<string, mixed>    $response   The full response from the AI
 * @param   string                  $provider   The AI provider (e.g., 'OpenAI', 'Anthropic')
 * @param   float                   $time       Execution time in seconds
 * @param   float                   $confidence Confidence score from the AI (if any)
 * @param   string                  $status     Status of the request (e.g., 'success', 'error')
 * @param   string                  $error      Error message, if any
 * @param   string                  $rawReq     Raw request payload
 * @param   string                  $rawRes     Raw response payload
 * @return  int									Return 0
 */
function ai_log_request($db, $user, $query, array $response, $provider, float $time, float $confidence, $status, $error = '', $rawReq = '', $rawRes = '')
{
}
/**
 * Get list for AI summarize
 *
 * @return array<int|string,mixed>
 */
function getListForAISummarize()
{
}
/**
 * Get list for AI style of writing
 *
 * @return array<int|string,mixed>
 */
function getListForAIRephraseStyle()
{
}
/**
 * Prepare admin pages header
 *
 * @return array<array{0:string,1:string,2:string}>
 */
function aiAdminPrepareHead()
{
}
/**
 * Resolve the AI provider/service currently configured for the AI Assistant
 * (e.g. "ChatGPT (OpenAI)", "Google Gemini", "Anthropic (Claude)"), so it can be
 * displayed in the chat header. The precise model name is intentionally not
 * shown here, only which AI is in use.
 *
 * @return string	The provider label, or '' if no service is configured
 */
function getAiAssistantProviderLabel()
{
}
/**
 * Build the configuration array consumed by the AI Assistant chat frontend (ai/js/ai_assistant.js).
 * It is serialized as JSON into the data-ai-config attribute of the chat container.
 *
 * @return array{mode:string,labels:array<string,string>,baseUrl:string,token:string,userInitial:string}
 */
function getAiChatAssistantConfig()
{
}
/**
 * Build the HTML of the AI Assistant chat interface.
 * Shared by the standalone page (ai/assistant/index.php) and the topbar popover
 * fragment (ai/assistant/popover.php) so both render the exact same chat.
 *
 * @param	string	$mode	'page' for the standalone full page, 'popover' for the topbar popover fragment
 * @return	string			HTML content
 */
function getAiChatAssistantHtml($mode = 'page')
{
}