<?php

/**
 * Class ToolReports
 *
 * Provides various tools related to Dolibarr reports.
 */
class ToolReports extends \McpTool
{
    /**
     * 	Constructor
     *
     * 	Aligned with McpHandler's instantiation contract: new $className($db, $user, $conf).
     *
     * 	@param	DoliDB		$db			Database handler
     * 	@param	User|null	$user		Service user provided by McpHandler (from AI_MCP_USER_ID)
     * 	@param	Conf|null	$conf		Dolibarr config (optional)
     */
    public function __construct(\DoliDB $db, $user = \null, $conf = \null)
    {
    }
    /**
     * Returns an array of tool definitions.
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
     * Resolves a Thirdparty ID from either an ID or a name.
     *
     * If `thirdparty_id` is provided, it is returned directly.
     * Otherwise, if `thirdparty_name` is provided, the function searches
     * the Dolibarr societe table using a LIKE match and returns the first match.
     *
     * @param array<string, mixed> $args Input parameters (thirdparty_id, thirdparty_name)
     *
     * @return int|null Thirdparty ID if found, otherwise null.
     */
    private function resolveThirdparty($args)
    {
    }
    /**
     * Generate a sales/revenue report.
     *
     * @param array<string, mixed> $args Input arguments (date_start, date_end, limit, etc.)
     * @return array<int, array<string, string>> List of sales with localized keys and values.
     */
    private function getSalesReport(array $args) : array
    {
    }
    /**
     * Generate a list of raw transactions (Invoices, Orders, Proposals).
     *
     * @param array<string, mixed> $args Input arguments.
     * @return array<int, array<string, string>> Combined list of transactions.
     */
    private function getThirdpartyTransactions(array $args) : array
    {
    }
    /**
     * Generate a purchase/expense report.
     *
     * @param array<string, mixed> $args Input arguments.
     * @return array<int, array<string, string>> List of purchases or groups.
     */
    private function getPurchaseReport(array $args) : array
    {
    }
    /**
     * Generate an inventory report.
     *
     * @param array<string, mixed> $args Input arguments.
     * @return array<int, array<string, string>> Stock list.
     */
    private function getInventoryReport(array $args) : array
    {
    }
    /**
     * Generate a summary financial report (Income vs Expense).
     *
     * @param array<string, mixed> $args Input arguments.
     * @return array<int, array<string, string>> Financial summary.
     */
    private function getFinancialReport(array $args) : array
    {
    }
}