<?php

/**
 * PHPExcel
 *
 * Copyright (c) 2006 - 2014 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package	PHPExcel
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license	http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version	##VERSION##, ##DATE##
 */
/**
 * PHPExcel_HashTable
 *
 * @category   PHPExcel
 * @package	PHPExcel
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_HashTable
{
    /**
     * HashTable elements
     *
     * @var array
     */
    public $_items = array();
    /**
     * HashTable key map
     *
     * @var array
     */
    public $_keyMap = array();
    /**
     * Create a new PHPExcel_HashTable
     *
     * @param	PHPExcel_IComparable[] $pSource	Optional source array to create HashTable from
     * @throws	PHPExcel_Exception
     */
    public function __construct($pSource = \null)
    {
    }
    /**
     * Add HashTable items from source
     *
     * @param	PHPExcel_IComparable[] $pSource	Source array to create HashTable from
     * @throws	PHPExcel_Exception
     */
    public function addFromSource($pSource = \null)
    {
    }
    /**
     * Add HashTable item
     *
     * @param	PHPExcel_IComparable $pSource	Item to add
     * @throws	PHPExcel_Exception
     */
    public function add(\PHPExcel_IComparable $pSource = \null)
    {
    }
    /**
     * Remove HashTable item
     *
     * @param	PHPExcel_IComparable $pSource	Item to remove
     * @throws	PHPExcel_Exception
     */
    public function remove(\PHPExcel_IComparable $pSource = \null)
    {
    }
    /**
     * Clear HashTable
     *
     */
    public function clear()
    {
    }
    /**
     * Count
     *
     * @return int
     */
    public function count()
    {
    }
    /**
     * Get index for hash code
     *
     * @param	string	$pHashCode
     * @return	int	Index
     */
    public function getIndexForHashCode($pHashCode = '')
    {
    }
    /**
     * Get by index
     *
     * @param	int	$pIndex
     * @return	PHPExcel_IComparable
     *
     */
    public function getByIndex($pIndex = 0)
    {
    }
    /**
     * Get by hashcode
     *
     * @param	string	$pHashCode
     * @return	PHPExcel_IComparable
     *
     */
    public function getByHashCode($pHashCode = '')
    {
    }
    /**
     * HashTable to array
     *
     * @return PHPExcel_IComparable[]
     */
    public function toArray()
    {
    }
    /**
     * Implement PHP __clone to create a deep clone, not just a shallow copy.
     */
    public function __clone()
    {
    }
}