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
 * @package    PHPExcel_CachedObjectStorage
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    ##VERSION##, ##DATE##
 */
/**
 * PHPExcel_CachedObjectStorage_SQLite
 *
 * @category   PHPExcel
 * @package    PHPExcel_CachedObjectStorage
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_CachedObjectStorage_SQLite extends \PHPExcel_CachedObjectStorage_CacheBase implements \PHPExcel_CachedObjectStorage_ICache
{
    /**
     * Database table name
     *
     * @var string
     */
    private $_TableName = \null;
    /**
     * Database handle
     *
     * @var resource
     */
    private $_DBHandle = \null;
    /**
     * Store cell data in cache for the current cell object if it's "dirty",
     *     and the 'nullify' the current cell object
     *
     * @return	void
     * @throws	PHPExcel_Exception
     */
    protected function _storeData()
    {
    }
    //	function _storeData()
    /**
     * Add or Update a cell in cache identified by coordinate address
     *
     * @param	string			$pCoord		Coordinate address of the cell to update
     * @param	PHPExcel_Cell	$cell		Cell to update
     * @return	PHPExcel_Cell
     * @throws	PHPExcel_Exception
     */
    public function addCacheData($pCoord, \PHPExcel_Cell $cell)
    {
    }
    //	function addCacheData()
    /**
     * Get cell at a specific coordinate
     *
     * @param 	string 			$pCoord		Coordinate of the cell
     * @throws 	PHPExcel_Exception
     * @return 	PHPExcel_Cell 	Cell that was found, or null if not found
     */
    public function getCacheData($pCoord)
    {
    }
    //	function getCacheData()
    /**
     * Is a value set for an indexed cell?
     *
     * @param	string		$pCoord		Coordinate address of the cell to check
     * @return	boolean
     */
    public function isDataSet($pCoord)
    {
    }
    //	function isDataSet()
    /**
     * Delete a cell in cache identified by coordinate address
     *
     * @param	string			$pCoord		Coordinate address of the cell to delete
     * @throws	PHPExcel_Exception
     */
    public function deleteCacheData($pCoord)
    {
    }
    //	function deleteCacheData()
    /**
     * Move a cell object from one address to another
     *
     * @param	string		$fromAddress	Current address of the cell to move
     * @param	string		$toAddress		Destination address of the cell to move
     * @return	boolean
     */
    public function moveCell($fromAddress, $toAddress)
    {
    }
    //	function moveCell()
    /**
     * Get a list of all cell addresses currently held in cache
     *
     * @return	string[]
     */
    public function getCellList()
    {
    }
    //	function getCellList()
    /**
     * Clone the cell collection
     *
     * @param	PHPExcel_Worksheet	$parent		The new worksheet
     * @return	void
     */
    public function copyCellCollection(\PHPExcel_Worksheet $parent)
    {
    }
    //	function copyCellCollection()
    /**
     * Clear the cell collection and disconnect from our parent
     *
     * @return	void
     */
    public function unsetWorksheetCells()
    {
    }
    //	function unsetWorksheetCells()
    /**
     * Initialise this new cell collection
     *
     * @param	PHPExcel_Worksheet	$parent		The worksheet for this cell collection
     */
    public function __construct(\PHPExcel_Worksheet $parent)
    {
    }
    //	function __construct()
    /**
     * Destroy this cell collection
     */
    public function __destruct()
    {
    }
    //	function __destruct()
    /**
     * Identify whether the caching method is currently available
     * Some methods are dependent on the availability of certain extensions being enabled in the PHP build
     *
     * @return	boolean
     */
    public static function cacheMethodIsAvailable()
    {
    }
}