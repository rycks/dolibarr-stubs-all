<?php

/**
 * Class ProductAttribute
 * Used to represent a product attribute
 */
class ProductAttribute extends \CommonObject
{
    /**
     * Database handler
     * @var DoliDB
     */
    public $db;
    /**
     * Id of the product attribute
     * @var int
     */
    public $id;
    /**
     * Ref of the product attribute
     * @var string
     */
    public $ref;
    /**
     * External ref of the product attribute
     * @var string
     */
    public $ref_ext;
    /**
     * Label of the product attribute
     * @var string
     */
    public $label;
    /**
     * Order of attribute.
     * Lower ones will be shown first and higher ones last
     * @var int
     */
    public $rang;
    /**
     * Constructor
     *
     * @param   DoliDB $db     Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     * Fetches the properties of a product attribute
     *
     * @param int $id Attribute id
     * @return int <1 KO, >1 OK
     */
    public function fetch($id)
    {
    }
    /**
     * Returns an array of all product variants
     *
     * @param	int		$returnonlydata		0: return object, 1: return only data
     * @return								ProductAttribute[]
     */
    public function fetchAll($returnonlydata = 0)
    {
    }
    /**
     * Creates a product attribute
     *
     * @param   User    $user      Object user
     * @param   int     $notrigger Do not execute trigger
     * @return 					int <0 KO, Id of new variant if OK
     */
    public function create(\User $user, $notrigger = 0)
    {
    }
    /**
     * Updates a product attribute
     *
     * @param   User    $user      Object user
     * @param   int     $notrigger Do not execute trigger
     * @return 	int 				<0 KO, >0 OK
     */
    public function update(\User $user, $notrigger = 0)
    {
    }
    /**
     * Deletes a product attribute
     *
     * @param   User    $user      Object user
     * @param   int     $notrigger Do not execute trigger
     * @return 	int <0 KO, >0 OK
     */
    public function delete(\User $user, $notrigger = 0)
    {
    }
    /**
     * Returns the number of values for this attribute
     *
     * @return int
     */
    public function countChildValues()
    {
    }
    /**
     * Returns the number of products that are using this attribute
     *
     * @return int
     */
    public function countChildProducts()
    {
    }
    /**
     * Reorders the order of the variants.
     * This is an internal function used by moveLine function
     *
     * @return int <0 KO >0 OK
     */
    protected function reorderLines()
    {
    }
    /**
     * Internal function to handle moveUp and moveDown functions
     *
     * @param string $type up/down
     * @return int <0 KO >0 OK
     */
    private function moveLine($type)
    {
    }
    /**
     * Shows this attribute before others
     *
     * @return int <0 KO >0 OK
     */
    public function moveUp()
    {
    }
    /**
     * Shows this attribute after others
     *
     * @return int <0 KO >0 OK
     */
    public function moveDown()
    {
    }
    /**
     * Updates the order of all variants. Used by AJAX page for drag&drop
     *
     * @param DoliDB $db Database handler
     * @param array $order Array with row id ordered in ascendent mode
     * @return int <0 KO >0 OK
     */
    public static function bulkUpdateOrder(\DoliDB $db, array $order)
    {
    }
}