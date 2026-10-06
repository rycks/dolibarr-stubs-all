<?php

/**
 * Class ToolInvoices
 *
 * Provides various tools related to Dolibarr invoices.
 */
class ToolInvoices extends \McpTool
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
     * Return the authenticated user, preferring DI ($this->user) and falling back to global $user.
     * In HTTP MCP context there is no PHP web session — only the service user injected via DI.
     *
     * @return User|null
     */
    private function getUser()
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
     * @param array<string, mixed> $args The arguments for the tool (key-value pairs).
     * @return mixed The result of the tool execution (usually an array) or an error array.
     */
    public function execute(string $name, array $args)
    {
    }
    /**
     * Search invoices based on filters.
     *
     * @param array<string, mixed> $args Input filters (limit, status, customer)
     *
     * @return array<int, array<string, mixed>>|array<string, string>
     */
    private function searchInvoices($args)
    {
    }
    /**
     * Get full invoice details.
     *
     * @param array<string, mixed> $args Input parameters (ref or id)
     *
     * @return array<string, mixed>
     */
    private function getInvoice($args)
    {
    }
    /**
     * Validate a draft invoice.
     *
     * @param array<string, mixed> $args  Input parameters (invoice ref or id)
     *
     * @return array<string, mixed>
     */
    private function validateInvoice($args)
    {
    }
    /**
     * Register a payment on an invoice.
     *
     * @param array<string, mixed> $args Input parameters (invoice, amount, payment_mode, bank_account)
     *
     * @return array<string, mixed>
     */
    private function payInvoice($args)
    {
    }
    /**
     * Find a customer by identifier.
     *
     * @param string $identifier ID, ref, code or name
     * @return Societe|array<string, mixed>
     */
    private function findCustomer($identifier)
    {
    }
    /**
     * Find an invoice by identifier.
     *
     * @param string|int $identifier Invoice ID or ref
     * @return Facture|array<string, string>
     */
    private function findInvoice($identifier)
    {
    }
    /**
     * Find a bank account.
     *
     * @param string|int $identifier Bank account id, ref or label
     * @return object|null
     */
    private function findBankAccount($identifier)
    {
    }
}