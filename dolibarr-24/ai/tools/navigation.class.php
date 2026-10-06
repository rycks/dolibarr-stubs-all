<?php

/**
 * \class ToolNavigation
 *
 * \brief AI tool for generating navigation URLs in Dolibarr
 */
class ToolNavigation extends \McpTool
{
    /**
     * Returns an array of tool definitions, including name, description, and input schema.
     *
     * @return list<array<string, mixed>> Array of tool definitions.
     */
    public function getDefinitions() : array
    {
    }
    /**
     * Return categories this tool belongs to.
     * Used by the intent parser to filter available tools.
     *
     * @return array<string> List of categories (e.g., ['billing', 'commercial'])
     */
    public function getCategories() : array
    {
    }
    /**
     * Executes the requested tool function based on its name.
     *
     * @param string $name The name of the tool to execute.
     * @param array<string, mixed> $args The arguments for the tool (key-value pairs).
     * @return mixed The result of the tool execution (usually an array) or an error array.
     */
    public function execute(string $name, array $args)
    {
    }
    /**
     * Maps human-readable status terms to Dolibarr URL parameters for a given element type.
     * This is the core logic for accurate list filtering.
     *
     * @param string $elementType The normalized element type (e.g., 'invoice_customer')
     * @param string $statusFilter The human-readable status (e.g., 'open', 'paid')
     * @return array<string, int|string>|null An associative array for the URL query string, or null if no match.
     */
    private function mapStatusToFilter($elementType, $statusFilter)
    {
    }
    /**
     * Maps user-friendly names to specific Dolibarr paths
     *
     * @param string $input User input object type
     * @param string $view View type (list, card, create)
     * @return array<string, mixed>|null Path information or null if not found
     */
    private function resolvePath($input, $view)
    {
    }
    /**
     * Check if user has permissions for the requested resource using the modern hasRight() method.
     *
     * @param string $elementType Element type
     * @param string $view View type
     * @param int $id Element ID (for specific record access)
     * @return bool True if user has permission
     */
    private function checkPermissions($elementType, $view, $id = 0)
    {
    }
    /**
     * Check if user has access to a specific record
     *
     * @param string $elementType Element type
     * @param int $id Element ID
     * @return bool True if user has access to the specific record
     */
    private function checkSpecificRecordAccess($elementType, $id)
    {
    }
    /**
     * Generate a human-readable description for the URL
     *
     * @param string $type Element type
     * @param string $view View type
     * @param int $id Element ID
     * @param string $statusFilter The status filter used
     * @return string Description
     */
    private function generateDescription($type, $view, $id, $statusFilter = '')
    {
    }
}