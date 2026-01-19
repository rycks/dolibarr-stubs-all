<?php

/* Copyright (C) 2016		Marcos García			<marcosgdf@gmail.com>
 * Copyright (C) 2018		Juanjo Menent			<jmenent@2byte.es>
 * Copyright (C) 2022   	Open-Dsi				<support@open-dsi.fr>
 * Copyright (C) 2024-2025	MDW						<mdeweerd@users.noreply.github.com>
 * Copyright (C) 2024-2025  Frédéric France         <frederic.france@free.fr>
 * Copyright (C) 2025       William Mead            <william@m34d.com>
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
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 */
/**
 *	\file       htdocs/variants/class/ProductCombination.class.php
 *	\ingroup    variants
 *	\brief      File of the ProductCombination class
 */
/**
 * Class ProductCombination
 * Used to represent the relation between a product and one of its variants.
 *
 * Example: a product "shirt" has two variants "shirt XL white" and "shirt XL grey".
 * This is represented with two ProductCombination objects:
 * - One for "shirt XL white":
 *     * $object->fk_product_parent     ID of the Product object "shirt"
 *     * $object->fk_product_child      ID of the Product object "shirt XL white"
 * - Another for "shirt XL grey":
 *     * $object->fk_product_parent     ID of the Product object "shirt"
 *     * $object->fk_product_child      ID of the Product object "shirt XL grey"
 */
class ProductCombination
{
    /**
     * Database handler
     * @var DoliDB
     */
    public $db;
    /**
     * Rowid of this ProductCombination
     * @var int
     */
    public $id;
    /**
     * Rowid of the parent Product
     * @var int
     */
    public $fk_product_parent;
    /**
     * Rowid of the variant Product
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
     * Can be an array if multiprice feature per level is enabled.
     * @var bool|array
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
     * Combination price level
     * @var ProductCombinationLevel[]
     */
    public $combination_price_levels;
    /**
     * External ref
     * @var string
     */
    public $variation_ref_ext = '';
    /**
     * Error message
     * @var string
     */
    public $error;
    /**
     * Array of error messages
     * @var string[]
     */
    public $errors = array();
    /**
     * Constructor
     *
     * @param   DoliDB $db     Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     * Retrieves a ProductCombination by its rowid
     *
     * @param   int     	$rowid      ID of the ProductCombination
     * @return  int<-1,1>               -1 if KO, 1 if OK
     */
    public function fetch($rowid)
    {
    }
    /**
     * Retrieves combination price levels
     *
     * @param 	int 		$fk_price_level 	The price level to fetch, use 0 for all
     * @param 	bool 		$useCache 			To use cache or not
     * @return 	int<-1,1> 						-1 if KO, 1 if OK
     */
    public function fetchCombinationPriceLevels($fk_price_level = 0, $useCache = \true)
    {
    }
    /**
     * Retrieves combination price levels
     *
     * @param 	int 	$clean 		Levels of PRODUIT_MULTIPRICES_LIMIT
     * @return 	int 				Return integer <0 KO, >0 OK
     */
    public function saveCombinationPriceLevels($clean = 1)
    {
    }
    /**
     * Retrieves information of a variant product and ID of its parent product.
     *
     * @param 	int 	$productid 				Product ID of variant
     * @param	int		$donotloadpricelevel	Avoid loading price impact for each level. If PRODUIT_MULTIPRICES is not set, this has no effect.
     * @return 	int 							Return integer <0 if KO, 0 if product ID is not ID of a variant product (so parent not found), >0 if OK (ID of parent)
     */
    public function fetchByFkProductChild($productid, $donotloadpricelevel = 0)
    {
    }
    /**
     * Retrieves all product combinations by the product parent row id
     *
     * @param	int							$fk_product_parent	Rowid of parent product
     * @param	bool						$sort_by_ref		Sort result by product child reference
     * @return	int|ProductCombination[]						Return integer <0 KO
     */
    public function fetchAllByFkProductParent($fk_product_parent, $sort_by_ref = \false)
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
     * @return 	int				Return integer <0 if KO, >0 if OK
     */
    public function create($user)
    {
    }
    /**
     * Updates a product combination
     *
     * @param	User	$user		Object user
     * @return 						int Return integer <0 KO, >0 OK
     */
    public function update(\User $user)
    {
    }
    /**
     * Deletes a product combination
     *
     * @param 	User 	$user	Object user
     * @return 	int 			Return integer <0 if KO, >0 if OK
     */
    public function delete(\User $user)
    {
    }
    /**
     * Deletes all product combinations of a parent product
     *
     * @param User		$user 				Object user
     * @param int 		$fk_product_parent 	Rowid of parent product
     * @return int 							Return integer <0 if KO, >0 if OK
     */
    public function deleteByFkProductParent($user, $fk_product_parent)
    {
    }
    /**
     * Updates the weight of the child product. The price must be updated using Product::updatePrices.
     * This method is called by the update() of a product.
     *
     * @param	Product $parent 	Parent product
     * @param	User	$user		Object user
     * @return 	int 				>0 if OK, <0 if KO
     */
    public function updateProperties(\Product $parent, \User $user)
    {
    }
    /**
     * Retrieves the combination that matches the given features.
     *
     * @param 	int 						$prodid 	Id of parent product
     * @param 	array<int|string,int|string> 		$features 	Format: [$attr] => $attr_val
     * @return 	false|ProductCombination 				False if not found
     */
    public function fetchByProductCombination2ValuePairs($prodid, array $features)
    {
    }
    /**
     * Retrieves all unique attributes for a parent product
     * (filtered on its 'to sell' variants)
     *
     * @param	int $productid			Parent Product rowid
     * @return	array<object{id:int,ref:string,label:string,values:ProductAttributeValue[]}>		Array of attributes
     */
    public function getUniqueAttributesAndValuesByFkProductParent($productid)
    {
    }
    /**
     * Creates a product combination. Check usages to find more about its use
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
     * @param User                      $user                   User
     * @param Product                   $product                Parent Product
     * @param array<int,int>            $combinations           Attribute and value combinations.
     * @param array<int,array<int,array{weight:string|float,price:string|float}>> $variations 	Price and weight variations (example: $variations[fk_product_attribute][fk_product_attribute_value]['weight'])
     * @param bool|bool[]               $price_var_percent      Is the price variation value a relative variation (in %)? (it is an array if global constant "PRODUIT_MULTIPRICES" is on)
     * @param false|float|float[]       $forced_pricevar        Value of the price variation if it is forced ; in currency or percent. (it is an array if global constant "PRODUIT_MULTIPRICES" is on)
     * @param false|float               $forced_weightvar       Value of the weight variation if it is forced
     * @param false|string              $forced_refvar          Value of the reference if it is forced
     * @param string                    $ref_ext                External reference
     * @return int<-1,1>                                        Return integer <0 KO, >0 OK
     */
    public function createProductCombination(\User $user, \Product $product, array $combinations, array $variations, $price_var_percent = \false, $forced_pricevar = \false, $forced_weightvar = \false, $forced_refvar = \false, $ref_ext = '')
    {
    }
    /**
     * Copies all product combinations from the origin product to the destination product
     *
     * @param 	User 	$user	Object user
     * @param   int     $origProductId  Origin product id
     * @param   Product $destProduct    Destination product
     * @return  int                     >0 OK <0 KO
     */
    public function copyAll(\User $user, $origProductId, \Product $destProduct)
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
/**
 * Class ProductCombinationLevel
 * Used to represent a product combination Level
 */
class ProductCombinationLevel
{
    /**
     * Database handler
     * @var DoliDB
     */
    public $db;
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'product_attribute_combination_price_level';
    /**
     * Rowid of combination
     * @var int
     */
    public $id;
    /**
     * Rowid of parent product combination
     * @var int
     */
    public $fk_product_attribute_combination;
    /**
     * Combination price level
     * @var int
     */
    public $fk_price_level;
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
     * @var string error
     */
    public $error;
    /**
     * @var string[] array of errors
     */
    public $errors = array();
    /**
     * Constructor
     *
     * @param DoliDB $db Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     * Retrieves a combination level by its rowid
     *
     * @param int $rowid Row id
     * @return int Return integer <0 KO, >0 OK
     */
    public function fetch($rowid)
    {
    }
    /**
     * Retrieves combination price levels
     *
     * @param 	int 	$fk_product_attribute_combination		Id of product combination
     * @param 	int 	$fk_price_level 						The price level to fetch, use 0 for all
     * @return  mixed											self[] | -1 on KO
     */
    public function fetchAll($fk_product_attribute_combination, $fk_price_level = 0)
    {
    }
    /**
     * Assign vars form an stdclass like sql obj
     *
     * @param 	Object 	$obj		Object resultset
     * @return 	int 				Return integer <0 KO, >0 OK
     */
    public function fetchFormObj($obj)
    {
    }
    /**
     * Save a price impact of a product combination for a price level
     *
     * @return int 		Return integer <0 KO, >0 OK
     */
    public function save()
    {
    }
    /**
     * delete
     *
     * @return int Return integer <0 KO, >0 OK
     */
    public function delete()
    {
    }
    /**
     * delete all for a combination
     *
     * @param 	int		$fk_product_attribute_combination	Id of combination
     * @return 	int 										Return integer <0 KO, >0 OK
     */
    public function deleteAllForCombination($fk_product_attribute_combination)
    {
    }
    /**
     * Clean not needed price levels for a combination
     *
     * @param 	int		$fk_product_attribute_combination	Id of combination
     * @return 	int 										Return integer <0 KO, >0 OK
     */
    public function clean($fk_product_attribute_combination)
    {
    }
    /**
     * Create new Product Combination Price level from Parent
     *
     * @param DoliDB 				$db						Database handler
     * @param ProductCombination 	$productCombination		Product combination
     * @param int					$fkPriceLevel			Price level
     * @return ProductCombinationLevel
     */
    public static function createFromParent(\DoliDB $db, \ProductCombination $productCombination, $fkPriceLevel)
    {
    }
}