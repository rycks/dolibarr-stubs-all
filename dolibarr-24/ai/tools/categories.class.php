<?php

/**
 * Class ToolCategories
 *
 * Provides various tools related to Dolibarr categories.
 */
class ToolCategories extends \McpTool
{
    /**
     * 	Constructor
     *
     * 	@param	DoliDB		$db				Database handler
     * 	@param	User		$user			User object for permission checks
     */
    public function __construct($db, $user)
    {
    }
    /**
     * @var array<string,int>|null Cached category type map (scope string => integer type ID)
     */
    private $categoryTypeMapCache = \null;
    /**
     * @var array<int,string>|null Cached reverse type map (integer type ID => scope string)
     */
    private $reverseTypeMapCache = \null;
    /**
     * Get mapping of scope strings to integer type IDs (as stored in database).
     * Uses the Categorie class MAP_ID to ensure consistency, including hook-extended types.
     *
     * @return array<string, int> Associative array mapping scope names to integer type IDs
     */
    private function getCategoryTypeMap()
    {
    }
    /**
     * Get reverse mapping of integer type IDs to scope strings
     *
     * @return array<int, string> Associative array mapping integer type IDs to scope names
     */
    private function getReverseTypeMap()
    {
    }
    /**
     * Get list of valid category scopes
     *
     * @return string[] Array of valid scope strings
     */
    private function getValidScopes()
    {
    }
    /**
     * Get scope string from category type (integer ID as stored in database)
     *
     * @param int $type Category type ID (integer from database)
     * @return string|null Scope string or null if not found
     */
    private function getScopeFromType($type)
    {
    }
    /**
     * Check if user has create permission on categories
     *
     * @param int $category_type Category type ID (integer)
     * @return bool
     */
    private function hasCategoryCreatePermission($category_type)
    {
    }
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
     * @param array<string, mixed> $args The arguments for the tool (key-value pairs). Only SQL safe arguments!
     * @return mixed The result of the tool execution (usually an array) or an error array.
     */
    public function execute(string $name, array $args)
    {
    }
    /**
     * Internal helper to resolve a category ID from its name (label) and optional scope.
     * Returns category ID on success, or an error array.
     *
     * @param string $category_name The label to search for.
     * @param string|null $scope Optional category scope (e.g., 'product', 'ticket').
     * @return int|array<string, mixed> Category ID or an error array.
     */
    private function resolveCategoryIdFromName($category_name, $scope = \null)
    {
    }
    /**
     * Searches for categories based on a query and type.
     *
     * Note: Only call with sql safe parameters
     *
     * @param array<string, mixed> $args Array containing 'query' (string), 'scope' (string), 'limit' (int), 'offset' (int).
     * @return array{error:string}|array{count:int}|list<array<string, mixed>> A list of found categories or an error array.
     */
    private function searchCategories($args)
    {
    }
    /**
     * Retrieves comprehensive details for a specific category.
     *
     * @param array<string, mixed> $args Array containing 'category_id' (int) or 'category_name' (string) and optional 'scope'.
     * @return array<int, array<string, mixed>>|array<string, mixed> Category details or an error array.
     */
    private function getCategoryDetails($args)
    {
    }
    /**
     * Creates a new category in Dolibarr.
     *
     * @param array<string, mixed> $args Array containing 'label' (string), 'scope' (string), 'description' (string, optional), 'parent_category_id' (int, optional), 'color' (string, optional).
     * @return array<string, mixed> Success message with new category ID or an error array.
     */
    private function createCategory($args)
    {
    }
}