<?php

/* Copyright (C) 2016	Marcos García	<marcosgdf@gmail.com>
 * Copyright (C) 2018	Juanjo Menent	<jmenent@2byte.es>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */
/**
 * Class ProductCombination
 * Used to represent a product combination
 */
class ProductCombination
{
    /**
     * Database handler
     * @var DoliDB
     */
    private $db;
    /**
     * Rowid of combination
     * @var int
     */
    public $id;
    /**
     * Rowid of parent product
     * @var int
     */
    public $fk_product_parent;
    /**
     * Rowid of child product
     * @var int
     */
    public $fk_product_child;
    /**
     * Price variation
     * @var float
     */
    public $variation_price;
    /**
     * Is the price variation a relative variation?
     * @var bool
     */
    public $variation_price_percentage = \false;
    /**
     * Weight variation
     * @var float
     */
    public $variation_weight;
    /**
     * Combination entity
     * @var int
     */
    public $entity;
    /**
     * Constructor
     *
     * @param   DoliDB $db     Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     * Retrieves a combination by its rowid
     *
     * @param int $rowid Row id
     * @return int <0 KO, >0 OK
     */
    public function fetch($rowid)
    {
    }
    /**
     * Retrieves a product combination by a child product row id
     *
     * @param int $fk_child Product row id
     * @return int <0 KO, >0 OK
     */
    public function fetchByFkProductChild($fk_child)
    {
    }
    /**
     * Retrieves all product combinations by the product parent row id
     *
     * @param int $fk_product_parent Rowid of parent product
     * @return int|ProductCombination[] <0 KO
     */
    public function fetchAllByFkProductParent($fk_product_parent)
    {
    }
    /**
     * Retrieves all product combinations by the product parent row id
     *
     * @param  int     $fk_product_parent  Id of parent product
     * @return int                         Nb of record
     */
    public function countNbOfCombinationForFkProductParent($fk_product_parent)
    {
    }
    /**
     * Creates a product attribute combination
     *
     * @param	User	$user	Object user
     * @return 	int				<0 if KO, >0 if OK
     */
    public function create($user)
    {
    }
    /**
     * Updates a product combination
     *
     * @param	User	$user		Object user
     * @return 						int <0 KO, >0 OK
     */
    public function update(\User $user)
    {
    }
    /**
     * Deletes a product combination
     *
     * @param 	User 	$user	Object user
     * @return 	int 			<0 if KO, >0 if OK
     */
    public function delete(\User $user)
    {
    }
    /**
     * Deletes all product combinations of a parent product
     *
     * @param User		$user Object user
     * @param int 		$fk_product_parent Rowid of parent product
     * @return int <0 KO >0 OK
     */
    public function deleteByFkProductParent($user, $fk_product_parent)
    {
    }
    /**
     * Updates the weight of the child product. The price must be updated using Product::updatePrices
     *
     * @param Product $parent Parent product
     * @return int >0 OK <0 KO
     */
    public function updateProperties(\Product $parent)
    {
    }
    /**
     * Retrieves the combination that matches the given features.
     *
     * @param 	int 						$prodid 	Id of parent product
     * @param 	array 						$features 	Format: [$attr] => $attr_val
     * @return 	false|ProductCombination 				False if not found
     */
    public function fetchByProductCombination2ValuePairs($prodid, array $features)
    {
    }
    /**
     * Retrieves all unique attributres for a parent product
     *
     * @param int $productid Product rowid
     * @return ProductAttribute[]
     */
    public function getUniqueAttributesAndValuesByFkProductParent($productid)
    {
    }
    /**
     * Creates a product combination. Check usages to find more about its use
     *
     * Format of $combinations array:
     * array(
     * 	0 => array(
     * 		attr => value,
     * 		attr2 => value
     * 		[...]
     * 		),
     * [...]
     * )
     *
     * @param Product $product Parent product
     * @param array $combinations Attribute and value combinations.
     * @param array $variations Price and weight variations
     * @param bool $price_var_percent Is the price variation a relative variation?
     * @param bool|float $forced_pricevar If the price variation is forced
     * @param bool|float $forced_weightvar If the weight variation is forced
     * @return int <0 KO, >0 OK
     */
    public function createProductCombination(\Product $product, array $combinations, array $variations, $price_var_percent = \false, $forced_pricevar = \false, $forced_weightvar = \false)
    {
    }
    /**
     * Copies all product combinations from the origin product to the destination product
     *
     * @param   int     $origProductId  Origin product id
     * @param   Product $destProduct    Destination product
     * @return  int                     >0 OK <0 KO
     */
    public function copyAll($origProductId, \Product $destProduct)
    {
    }
    /**
     * Return label for combinations
     * @param   int 	$prod_child		id of child
     * @return  string					combination label
     */
    public function getCombinationLabel($prod_child)
    {
    }
}