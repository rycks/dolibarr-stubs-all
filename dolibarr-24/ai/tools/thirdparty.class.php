<?php

/**
 * Class ToolThirdParty
 *
 * Provides various tools related to Dolibarr categories.
 */
class ToolThirdParty extends \McpTool
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
     * Search for third parties based on provided criteria.
     *
     * @param   array{query:string|int, type?:string, country_code?:string, limit?:int|string} $args   Array of arguments:
     *                                                                                                 - query: Search string or ID
     *                                                                                                 - country_code: ISO country code on 2 chars (FR, US, GR...)
     *                                                                                                 - type: 'customer', 'prospect', 'supplier'
     *                                                                                                 - limit: Limit results (default 5)
     * @param	int		$count		If set to 1, returns only the count of results.
     * @return array{error:string}|array{count:int}|list<array{id:int,name:string,alias:string,code_cust:string,code_sup:string,email:string,type:string,url:string}>
     */
    private function search(array $args, int $count = 0)
    {
    }
    /**
     * Fetch details for a specific third party (Societe).
     *
     * @param   array{id: int|string} $args   Arguments array containing the thirdparty ID.
     *
     * @return array{error:string}|array<string,mixed>
     *
     */
    private function getDetails(array $args) : array
    {
    }
    /**
     * Create a new third party (Societe).
     *
     * @param array<string,mixed> $args Arguments array. 'name' is mandatory.
     *
     * @return array{error:string}|array<string,mixed>
     *
     */
    private function create(array $args)
    {
    }
    /**
     * Update a thirdparty record.
     *
     * @param array{id:int|string,name?:string,email?:string,phone?:string,address?:string,zip?:string,town?:string,country_code?:string} $args Thirdparty fields to update (ID required).
     *
     * @return array{status:string,message:string,id:int,url:string}|array{error:string}
     *
     */
    private function update(array $args)
    {
    }
    /**
     * List all contacts for a given thirdparty.
     *
     * @param   array{id: int|string} $args   Arguments array containing the thirdparty ID.
     *
     * @return array{error: string}|list<array<string, int|string>>
     *
     */
    private function listContacts(array $args)
    {
    }
    /**
     * Add a contact linked to a thirdparty.
     *
     * @param array{thirdparty_identifier:int|string,firstname:string,lastname:string,email?:string,phone?:string} $args Arguments array (identifier, firstname, lastname required).
     *
     * @return array{status:string,message:string,id:int,url?:string}|array{error:string}
     *
     *
     */
    private function addContact(array $args)
    {
    }
}