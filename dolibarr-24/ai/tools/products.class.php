<?php

/**
 * Class ToolProducts
 *
 * Provides various tools related to Dolibarr products and services.
 */
class ToolProducts extends \McpTool
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
     * Find a product by various identifiers (ID, Ref, Barcode, Label).
     *
     * @param   string|int       $identifier The search term (ID, ref, barcode, etc.).
     * @param   string|null      $type       Optional filter: 'product' or 'service'.
     *
     * @return  Product|array{error: string, matches?: list<string>} Returns the Product object on success, or an error array.
     */
    private function findProduct($identifier, ?string $type = \null)
    {
    }
    /**
     * Extracts the product identifier from arguments.
     * Returns the identifier string/int or null if missing.
     *
     * @param   array{product_id?: int|string, product_name?: string, type?: string} $args Arguments array
     * @return  array{identifier: string|int|null, type: string|null}   The identifier and optional type.
     */
    private function extractIdentifier(array $args) : array
    {
    }
    /**
     * Searches for products or services based on a query, type, and pagination.
     *
     * @param   array{query?: string, type?: string, limit?: int, offset?: int} $args Arguments array.
     * @return  array<string, mixed>    Result array containing 'count', 'offset', 'limit', and 'results'.
     *                                  Results is a list of array<string, mixed>.
     *                                  Returns ['error' => string] on failure.
     */
    private function search(array $args)
    {
    }
    /**
     * Fetch product categories.
     *
     * @param   int $product_id Product ID
     * @return  array<int, array{id: int, label: string, fk_parent: int}> List of categories
     */
    private function getProductCategories(int $product_id) : array
    {
    }
    /**
     * Retrieves comprehensive details for a specific product or service.
     *
     * @param   array{product_id?: int|string, product_name?: string, type?: string} $args Arguments array.
     * @return  array<string, mixed>    Product details or an error array.
     *                                  Returns ['error' => string] on failure.
     */
    private function getDetails(array $args)
    {
    }
    /**
     * Get pending customer orders quantity for a product.
     * Calculates the total quantity found in Sales Orders with status Validated (1) or In Process (2).
     *
     * @param   int   $product_id   Product ID
     * @return  float               Pending quantity
     */
    private function getPendingCustomerOrdersQty(int $product_id) : float
    {
    }
    /**
     * Get pending supplier orders quantity for a product.
     * Sums quantity from Supplier Orders with status Validated(1), Approved(2), Ordered(3), or Partially Received(4).
     *
     * @param   int   $product_id   Product ID
     * @return  float               Pending quantity
     */
    private function getPendingSupplierOrdersQty(int $product_id) : float
    {
    }
    /**
     * Generate replenishment recommendation.
     * Logic prioritizes Critical (Negative) -> High (Below Alert) -> Low (Below Desired).
     *
     * @param   float   $virtual_stock    Current virtual stock (Physical + Incoming - Outgoing).
     * @param   float   $min_stock_alert  Minimum stock alert level (Seuil alerte).
     * @param   float   $desired_stock    Desired stock level.
     * @param   float   $dailyBurnRate    Estimated daily consumption rate.
     *
     * @return  array{action: string, urgency: string, suggested_qty: int, reason: string}
     */
    private function generateReplenishmentRecommendation(float $virtual_stock, float $min_stock_alert, float $desired_stock, float $dailyBurnRate) : array
    {
    }
    /**
     * Performs an inventory analysis for a specific product.
     * Calculates burn rate based on last 90 days of sales (Invoices) and predicts stockout dates.
     *
     * @param   array{product_id?: int|string, product_name?: string, type?: string} $args Arguments array.
     * @return  array<string, mixed>    Analysis results or an error array.
     *                                  Returns ['error' => string] on failure.
     *                                  Success shape:
     *                                  {
     *                                    id: int, ref: string, label: string, type: string,
     *                                    physical_stock: float, virtual_stock: float,
     *                                    min_stock_alert: float, desired_stock: float,
     *                                    pending_customer_orders_qty: float, pending_supplier_orders_qty: float,
     *                                    analysis: array{sales_last_90_days: float, daily_burn_rate: float, estimated_days_until_stockout: ?int, predicted_stockout_date: ?string, note?: string},
     *                                    recommendation: array
     *                                  }
     */
    private function analyze(array $args)
    {
    }
    /**
     * Retrieves a list of all defined supplier prices for a given product or service.
     *
     * @param array<string, mixed> $args Input parameters (product_id, product_name, type)
     * @return array<string, mixed>|array<string, string>
     *
     */
    private function getSupplierPrices(array $args)
    {
    }
}