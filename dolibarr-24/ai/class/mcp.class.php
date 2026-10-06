<?php

/**
 * Class to handle MCP (Model Context Protocol).
 *
 * This class is responsible for discovering, loading, and executing tools that implement
 * the Model Context Protocol. It supports both native tools from the ai/tools directory
 * and external tools registered via hooks.
 *
 * Context-aware: pass McpHandler::CTX_ASSISTANT (default) or McpHandler::CTX_MCP_SERVER
 * to the constructor so that the correct allow-list constant is applied.
 */
class McpHandler
{
    const CTX_ASSISTANT = 'assistant';
    const CTX_MCP_SERVER = 'mcp_server';
    /** @var DoliDB Database handler */
    private $db;
    /** @var User User object */
    private $user;
    /** @var Conf Configuration object */
    private $conf;
    /**
     * @var McpTool[] Array of loaded tool instances, keyed by their base filename or class name.
     */
    private $loadedTools = [];
    /**
     * @var McpTool[] Associative array mapping tool *names* (from schema) to their instances.
     * This provides O(1) lookup for execution.
     */
    private $toolsByName = [];
    /**
     * The active tool context. Determines which allow-list constant is read.
     * @var string
     */
    private $toolcontext;
    /**
     * Constructor.
     *
     * @param DoliDB    $db      Database handler object
     * @param User      $user    User object
     * @param Conf|null $conf_obj	Configuration object. Falls back to global $conf when null.
     * @param string    $toolcontext Pass McpHandler::CTX_ASSISTANT or McpHandler::CTX_MCP_SERVER.
     *                               Defaults to CTX_ASSISTANT when empty.
     */
    public function __construct($db, $user, $conf_obj = \null, $toolcontext = '')
    {
    }
    /**
     * Returns true if the given tool instance declares itself as a system tool.
     *
     * Detection is entirely delegated to the tool class via isSystem() — no tool
     * names are hardcoded here. Any tool class that overrides isSystem() returning
     * true is treated as a system tool automatically.
     *
     * @param McpTool $toolInstance The tool instance to evaluate.
     * @return bool
     */
    private function isSystemTool($toolInstance)
    {
    }
    /**
     * Returns the configured allow-list for the current context as an array of
     * tool names.
     *
     * Logic:
     *   constant not set / empty string → no restriction → returns array()
     *   constant = 'NONE'               → all blocked    → returns array('__blocked__')
     *   otherwise                       → returns the list of allowed names
     *
     * The sentinel '__blocked__' will never match any real tool name so
     * in_array() checks against it always return false.
     *
     * @return string[]
     */
    private function getAllowedToolsList()
    {
    }
    /**
     * Resolves a raw allow-list constant value into an explicit PHP array of tool names.
     *
     * @param string   $raw                Raw value of the constant from getDolGlobalString().
     * @param string[] $allDiscoveredTools Full list of all non-system tool names discovered.
     * @return string[] Explicit list of currently allowed tool names.
     */
    public static function resolveAllowList($raw, $allDiscoveredTools)
    {
    }
    /**
     * Load all available MCP tools.
     *
     * This method scans the ai/tools directory for native tools and executes the
     * 'addMcpTools' hook to allow external modules to register their own tools.
     *
     * @return void
     */
    private function loadTools()
    {
    }
    /**
     * Load native tools from the specific tools directory.
     *
     * Scans the ai/tools/ directory for PHP files. It validates the file paths
     * for security, attempts to load the corresponding class (following the
     * convention "Tool" + PascalCase filename), and registers the tool if it
     * is a valid instance of McpTool.
     *
     * @return void
     */
    private function loadNativeTools()
    {
    }
    /**
     * Loads external tools registered via the 'addMcpTools' hook.
     *
     * Initializes the HookManager for the 'aimcp' context and executes the
     * 'addMcpTools' hook. It expects modules to populate the result array
     * with arrays containing valid McpTool instances.
     *
     * @return void
     */
    private function loadExternalTools()
    {
    }
    /**
     * Helper method to register a tool instance and populate lookup arrays.
     *
     * @param string   $key          A unique key for the tool (e.g., filename or class name).
     * @param McpTool  $toolInstance The instantiated tool object.
     *
     * @return void
     */
    private function registerTool(string $key, \McpTool $toolInstance)
    {
    }
    /**
     * Returns the full schema of every loaded tool with no allow-list filtering.
     * Adds is_system and class_name metadata needed by admin/configure_tools.php.
     *
     * Must not be called from any user-facing entry point — admin use only.
     *
     * @return array<int, array<string, mixed>>
     */
    public function getToolsSchemaUnfiltered()
    {
    }
    /**
     * Returns the schema of all tools permitted in the current context.
     *
     * System tools (isSystem() = true) are always included and tagged with
     * is_system = true so callers can identify and exclude them from the schema
     * sent to the LLM (system tools are parse_intent.php infrastructure —
     * they must never be called directly by the model).
     *
     * All other tools are filtered against the tool context allow-list.
     *
     * @return array<int, array<string, mixed>> Array of tool schemas
     */
    public function getToolsSchema() : array
    {
    }
    /**
     * Returns the schema of tools permitted in the current context, with system
     * tools completely excluded. This is the exact list sent to the LLM.
     *
     * System tools (ask_for_confirmation, respond_to_user, etc.) must NEVER be
     * visible to the model. If the LLM sees ask_for_confirmation in its schema
     * it will call it directly with wrong arguments instead of the real action
     * tool, causing an infinite confirmation loop on the client side.
     *
     * parse_intent.php uses this method to build $toolsForLLM, and keeps
     * getToolsSchema() separately only for the post-LLM validation step
     * (where system tools must still be accepted as valid responses).
     *
     * @return array<int, array<string, mixed>>
     */
    public function getToolsSchemaForLLM()
    {
    }
    /**
     * Execute a specific tool by its name.
     *
     * Enforces the tool context allow-list as a second gate so that even a crafted
     * direct request cannot run a tool that was disabled in the admin UI.
     *
     * @param string               $toolName The name of the tool to execute.
     * @param array<string, mixed> $args     The arguments to pass to the tool.
     *
     * @return array<string, mixed> The result of the tool execution or an error array.
     */
    public function executeTool(string $toolName, array $args) : array
    {
    }
}