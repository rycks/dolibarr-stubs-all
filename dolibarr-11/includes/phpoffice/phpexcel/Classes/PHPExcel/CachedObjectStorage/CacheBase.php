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
 * PHPExcel_CachedObjectStorage_CacheBase
 *
 * @category   PHPExcel
 * @package    PHPExcel_CachedObjectStorage
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
abstract class PHPExcel_CachedObjectStorage_CacheBase
{
    /**
     * Parent worksheet
     *
     * @var PHPExcel_Worksheet
     */
    protected $_parent;
    /**
     * The currently active Cell
     *
     * @var PHPExcel_Cell
     */
    protected $_currentObject = \null;
    /**
     * Coordinate address of the currently active Cell
     *
     * @var string
     */
    protected $_currentObjectID = \null;
    /**
     * Flag indicating whether the currently active Cell requires saving
     *
     * @var boolean
     */
    protected $_currentCellIsDirty = \true;
    /**
     * An array of cells or cell pointers for the worksheet cells held in this cache,
     *		and indexed by their coordinate address within the worksheet
     *
     * @var array of mixed
     */
    protected $_cellCache = array();
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
     * Return the parent worksheet for this cell collection
     *
     * @return	PHPExcel_Worksheet
     */
    public function getParent()
    {
    }
    /**
     * Is a value set in the current PHPExcel_CachedObjectStorage_ICache for an indexed cell?
     *
     * @param	string		$pCoord		Coordinate address of the cell to check
     * @return	boolean
     */
    public function isDataSet($pCoord)
    {
    }
    //	function isDataSet()
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
     * Add or Update a cell in cache
     *
     * @param	PHPExcel_Cell	$cell		Cell to update
     * @return	PHPExcel_Cell
     * @throws	PHPExcel_Exception
     */
    public function updateCacheData(\PHPExcel_Cell $cell)
    {
    }
    //	function updateCacheData()
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
     * Get a list of all cell addresses currently held in cache
     *
     * @return	string[]
     */
    public function getCellList()
    {
    }
    //	function getCellList()
    /**
     * Sort the list of all cell addresses currently held in cache by row and column
     *
     * @return	string[]
     */
    public function getSortedCellList()
    {
    }
    //	function sortCellList()
    /**
     * Get highest worksheet column and highest row that have cell records
     *
     * @return array Highest column name and highest row number
     */
    public function getHighestRowAndColumn()
    {
    }
    /**
     * Return the cell address of the currently active cell object
     *
     * @return	string
     */
    public function getCurrentAddress()
    {
    }
    /**
     * Return the column address of the currently active cell object
     *
     * @return	string
     */
    public function getCurrentColumn()
    {
    }
    /**
     * Return the row address of the currently active cell object
     *
     * @return	integer
     */
    public function getCurrentRow()
    {
    }
    /**
     * Get highest worksheet column
     *
     * @param   string     $row        Return the highest column for the specified row,
     *                                     or the highest column of any row if no row number is passed
     * @return  string     Highest column name
     */
    public function getHighestColumn($row = \null)
    {
    }
    /**
     * Get highest worksheet row
     *
     * @param   string     $column     Return the highest row for the specified column,
     *                                     or the highest row of any column if no column letter is passed
     * @return  int        Highest row number
     */
    public function getHighestRow($column = \null)
    {
    }
    /**
     * Generate a unique ID for cache referencing
     *
     * @return string Unique Reference
     */
    protected function _getUniqueID()
    {
    }
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
     * Remove a row, deleting all cells in that row
     *
     * @param string    $row    Row number to remove
     * @return void
     */
    public function removeRow($row)
    {
    }
    /**
     * Remove a column, deleting all cells in that column
     *
     * @param string    $column    Column ID to remove
     * @return void
     */
    public function removeColumn($column)
    {
    }
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