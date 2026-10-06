<?php

/**
 * Tool class for CRUD operations on Dolibarr objects
 * TODO Remove all tools in this file. Must be into the objectname.class.php
 * to follow the same structure than APIs.
 */
class ToolCrudObjects extends \McpTool
{
    /**
     * 	Constructor
     *
     * 	Aligned with McpHandler's instantiation contract: new $className($db, $user, $conf).
     * 	Accepting $user via DI allows this tool to work in HTTP MCP context where no PHP
     * 	web session exists. Some sibling tool classes (ToolThirdParty, ToolCategories,
     * 	ToolProducts) already use this signature; this aligns ToolCrudObjects with them.
     *
     * 	@param	DoliDB		$db			Database handler
     * 	@param	User|null	$user		Service user provided by McpHandler (from AI_MCP_USER_ID)
     * 	@param	Conf|null	$conf		Dolibarr config (optional)
     */
    public function __construct(\DoliDB $db, $user = \null, $conf = \null)
    {
    }
    /**
     * Configuration Map.
     *
     * Defines specific field names for each object type to ensure correct data mapping.
     * Each entry contains: class, path, card, date_field, soc_field
     *
     * @var array<string, array{class:string,path:string,card:string,date_field:string,soc_field:string}>
     */
    private $map = [
        // --- CUSTOMER OBJECTS ---
        'proposal' => [
            'class' => 'Propal',
            'path' => '/comm/propal/class/propal.class.php',
            'card' => '/comm/propal/card.php',
            'date_field' => 'datep',
            // Propal uses 'datep'
            'soc_field' => 'socid',
        ],
        'order' => [
            'class' => 'Commande',
            'path' => '/commande/class/commande.class.php',
            'card' => '/commande/card.php',
            'date_field' => 'date_commande',
            // Commande uses 'date_commande'
            'soc_field' => 'socid',
        ],
        'invoice' => ['class' => 'Facture', 'path' => '/compta/facture/class/facture.class.php', 'card' => '/compta/facture/card.php', 'date_field' => 'date', 'soc_field' => 'socid'],
        // --- SUPPLIER OBJECTS ---
        'supplier_proposal' => [
            'class' => 'SupplierProposal',
            'path' => '/supplier_proposal/class/supplier_proposal.class.php',
            'card' => '/supplier_proposal/card.php',
            'date_field' => 'date',
            // Uses standard 'date' property for doc date
            'soc_field' => 'socid',
        ],
        'supplier_order' => ['class' => 'CommandeFournisseur', 'path' => '/fourn/class/fournisseur.commande.class.php', 'card' => '/fourn/commande/card.php', 'date_field' => 'date_commande', 'soc_field' => 'socid'],
        'supplier_invoice' => ['class' => 'FactureFournisseur', 'path' => '/fourn/class/fournisseur.facture.class.php', 'card' => '/fourn/facture/card.php', 'date_field' => 'date', 'soc_field' => 'socid'],
        // --- LOGISTICS ---
        'shipment' => ['class' => 'Expedition', 'path' => '/expedition/class/expedition.class.php', 'card' => '/expedition/card.php', 'date_field' => 'date_expedition', 'soc_field' => 'socid'],
        'reception' => ['class' => 'Reception', 'path' => '/reception/class/reception.class.php', 'card' => '/reception/card.php', 'date_field' => 'date_reception', 'soc_field' => 'socid'],
    ];
    /**
     * Permission map for CRUD operations.
     * Maps object types to their required Dolibarr permission (module, permission).
     *
     * @var array<string, array{0:string, 1:string}>
     */
    private const PERM_MAP = ['proposal' => ['propal', 'creer'], 'order' => ['commande', 'creer'], 'invoice' => ['facture', 'creer'], 'supplier_proposal' => ['supplier_proposal', 'creer'], 'supplier_order' => ['fournisseur', 'commande'], 'supplier_invoice' => ['fournisseur', 'facture'], 'shipment' => ['expedition', 'creer'], 'reception' => ['reception', 'creer']];
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
     * Create Document
     *
     * @param array<string, mixed> $args {
     *                                   object_type: string,
     *                                   header: array<string, mixed>,
     *                                   lines?: array<array<string, mixed>>
     *                                   } Arguments including type, header data, and optional lines.
     *
     * @return array<string, mixed>
     */
    private function createDocument(array $args)
    {
    }
    /**
     * Add a line to a document object.
     *
     * @param CommonObject $object The Dolibarr object (Propal, Commande, Facture, etc.).
     * @param array<string, mixed> $args {
     *                                   product?: string,
     *                                   description?: string,
     *                                   qty?: float|int|string,
     *                                   quantity?: float|int|string,
     *                                   price?: float|int|string,
     *                                   unit_price?: float|int|string,
     *                                   vat_rate?: float|int|string,
     *                                   discount?: float|int|string,
     *                                   object_type: string
     *                                   } Line arguments.
     *
     * @return array<string, mixed>
     */
    private function processAddLine(\CommonObject $object, array $args)
    {
    }
    /**
     * Entry point for the 'add_line_item' tool. Adds line to an already existing object.
     * Instantiates the document and calls the line processing helper.
     *
     * @param array{object_type:string,parent_id:int,product_id?:int,description?:string,quantity?:float|int,unit_price?:float|int,vat_rate?:float|int} $args Tool arguments for adding a line item
     *
     * @return array{success:bool,line_id?:int,error?:string}
     */
    private function addLineItem(array $args)
    {
    }
    /**
     * Find a product by various identifiers (ID, Ref, Barcode, Label).
     *
     * @param   string|int $identifier The search term (ID, ref, barcode, etc.).
     *
     * @return  Product|array{error: string, matches?: list<string>} Returns the Product object on success, or an error array.
     */
    private function findProduct($identifier)
    {
    }
    /**
     * Delete a document object.
     *
     * @param   array{object_type: string, id: int|string} $args   Arguments containing type and ID.
     *
     * @return  array{success: bool}|array{error: string} Result array.
     */
    private function deleteObject(array $args) : array
    {
    }
    /**
     * Check if the current user has permission for the given object type.
     *
     * @param   string $type  Object type key.
     *
     * @return  array{error: string}|null  Null if allowed, error array if denied.
     */
    private function checkPermission(string $type) : ?array
    {
    }
    /**
     * Factory Helper to instantiate Dolibarr objects.
     *
     * @param   string $type  Object type key (e.g., 'proposal', 'invoice').
     *
     * @return  CommonObject  New instance of the specific Dolibarr class.
     * @throws  Exception     If the type is unknown or class not found.
     */
    private function instantiate(string $type) : \CommonObject
    {
    }
    /**
     * Helper to update units via SQL directly.
     *
     * @param   string $type   Document type (e.g., 'invoice', 'order').
     * @param   int    $lineId Line RowID.
     * @param   int    $unitId Unit RowID.
     *
     * @return  void			Only attempts to update the database, no result indication
     */
    private function updateLineUnit(string $type, int $lineId, int $unitId) : void
    {
    }
}