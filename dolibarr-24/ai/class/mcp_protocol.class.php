<?php

/**
 * MCPServer Class
 *
 * This class acts as a thin protocol layer for the Model Context Protocol.
 * It handles JSON-RPC 2.0 requests and delegates all tool-related operations
 * (discovery, loading, execution) to McpHandler engine.
 *
 * Instantiates McpHandler with CTX_MCP_SERVER so that the public allow-list
 * (AI_MCP_SERVER_ALLOWED_TOOLS) is applied — tools disabled by the admin are
 * invisible in tools/list responses and blocked at tools/call execution.
 */
class MCPServer
{
    /** @var DoliDB Database handler */
    protected $db;
    /** @var User User object */
    protected $user;
    /** @var Conf Configuration object */
    protected $conf;
    /** @var McpHandler The tool management engine */
    private $mcpHandler;
    /** @var string Server version */
    private $version = '1.0.0';
    /** @var mixed|null The ID from the current JSON-RPC request */
    private $requestId = \null;
    /**
     * Constructor.
     *
     * @param DoliDB $db   Database handler object
     * @param Conf   $conf Configuration object
     * @param User   $user User object
     */
    public function __construct($db, $conf, $user)
    {
    }
    /**
     * JSON-RPC 2.0 Router.
     *
     * Routes incoming requests to the appropriate handler method.
     *
     * @param array{jsonrpc?: string, method?: string, params?: array<mixed>, id?: string|int|null} $request The decoded JSON-RPC request array.
     * @return array{jsonrpc: string, id: string|int|null, result?: mixed, error?: array<string, mixed>}|null A JSON-RPC response array, or null for notifications.
     * @throws Exception On processing errors.
     */
    public function handleRequest(array $request) : ?array
    {
    }
    /**
     * Handles the 'initialize' request.
     *
     * @param array<string, mixed> $params Initialization parameters from the client.
     * @return array{protocolVersion: string, capabilities: array{tools: array{listChanged: bool}, resources: array{subscribe: bool, listChanged: bool}, prompts: array{listChanged: bool}, logging: object}, serverInfo: array{name: string, version: string}} Server capabilities and info.
     */
    private function handleInitialize(array $params) : array
    {
    }
    // Tool handlers
    /**
     * Handles the 'tools/list' request by delegating to McpHandler.
     * Only tools permitted by AI_MCP_SERVER_ALLOWED_TOOLS are returned.
     *
     * @return array{tools: array<int, array<string, mixed>>} An array containing the list of available tools.
     */
    private function handleToolsList() : array
    {
    }
    /**
     * Handles the 'tools/call' request by delegating to McpHandler.
     * Execution is blocked for any tool not in AI_MCP_SERVER_ALLOWED_TOOLS,
     * even if the client sends the request directly without consulting tools/list.
     *
     * @param array{name?: string, arguments?: array<string, mixed>} $params Parameters containing the tool name and arguments.
     * @return array{content: array<int, array<string, mixed>>, isError: bool} The result of the tool execution.
     * @throws Exception If the tool is blocked, not found or execution fails.
     */
    private function handleToolCall(array $params) : array
    {
    }
    // Resource handlers
    /**
     * Handles the 'resources/list' request.
     *
     * @return array{resources: array<int, array{uri: string, name: string, description: string, mimeType: string}>} A list of available static resources.
     */
    private function handleResourcesList() : array
    {
    }
    /**
     * Handles the 'resources/read' request.
     *
     * @param array{uri?: string} $params Parameters containing the URI of the resource to read.
     * @return array{contents: array<int, array{uri: string, mimeType: string, text: string}>} The content of the requested resource.
     * @throws Exception If the resource URI is not found.
     */
    private function handleResourceRead(array $params) : array
    {
    }
    // Following 2 functions is proof of concept implementation based on current tool products. This is not viable.
    // TODO move from hardcoded prompts to database with configuration option so admins can customize based on actual tools
    // Prompt handlers
    /**
     * Handles the 'prompts/list' request.
     *
     * @return array{prompts: array<int, array{name: string, description: string, arguments: array<int, array{name: string, description: string, required: bool}>}>} A list of available prompt templates.
     */
    private function handlePromptsList() : array
    {
    }
    /**
     * Handles the 'prompts/get' request.
     *
     * @param array{name?: string, arguments?: array<string, mixed>} $params Parameters containing the prompt name and arguments.
     * @return array{messages: array<int, array{role: string, content: array{type: string, text: string}}>} A list of messages forming the prompt.
     * @throws Exception If the prompt name is not found.
     */
    private function handlePromptGet(array $params) : array
    {
    }
    // --- RESPONSE HELPERS ---
    /**
     * Creates a successful JSON-RPC response.
     *
     * @param mixed $result The result data to include in the response.
     * @return array{jsonrpc: string, id: int|string, result: mixed}|null The formatted JSON-RPC response, or null for notifications.
     */
    private function successResponse($result) : ?array
    {
    }
    /**
     * Creates an error JSON-RPC response.
     *
     * @param int    $code    The error code.
     * @param string $message The error message.
     * @param mixed  $data    Optional error data.
     * @return array{jsonrpc: string, id: int|string, error: array{code: int, message: string, data?: mixed}}|null The formatted JSON-RPC error response, or null for notifications.
     */
    private function errorResponse(int $code, string $message, $data = \null) : ?array
    {
    }
}