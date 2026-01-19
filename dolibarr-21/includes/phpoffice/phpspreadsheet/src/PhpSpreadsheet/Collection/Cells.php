<?php

namespace PhpOffice\PhpSpreadsheet\Collection;

class Cells
{
    /**
     * @var \Psr\SimpleCache\CacheInterface
     */
    private $cache;
    /**
     * Parent worksheet.
     *
     * @var Worksheet
     */
    private $parent;
    /**
     * The currently active Cell.
     *
     * @var Cell
     */
    private $currentCell;
    /**
     * Coordinate of the currently active Cell.
     *
     * @var string
     */
    private $currentCoordinate;
    /**
     * Flag indicating whether the currently active Cell requires saving.
     *
     * @var bool
     */
    private $currentCellIsDirty = false;
    /**
     * An index of existing cells. Booleans indexed by their coordinate.
     *
     * @var bool[]
     */
    private $index = [];
    /**
     * Prefix used to uniquely identify cache data for this worksheet.
     *
     * @var string
     */
    private $cachePrefix;
    /**
     * Initialise this new cell collection.
     *
     * @param Worksheet $parent The worksheet for this cell collection
     * @param CacheInterface $cache
     */
    public function __construct(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $parent, \Psr\SimpleCache\CacheInterface $cache)
    {
    }
    /**
     * Return the parent worksheet for this cell collection.
     *
     * @return Worksheet
     */
    public function getParent()
    {
    }
    /**
     * Whether the collection holds a cell for the given coordinate.
     *
     * @param string $pCoord Coordinate of the cell to check
     *
     * @return bool
     */
    public function has($pCoord)
    {
    }
    /**
     * Add or update a cell in the collection.
     *
     * @param Cell $cell Cell to update
     *
     * @throws PhpSpreadsheetException
     *
     * @return Cell
     */
    public function update(\PhpOffice\PhpSpreadsheet\Cell\Cell $cell)
    {
    }
    /**
     * Delete a cell in cache identified by coordinate.
     *
     * @param string $pCoord Coordinate of the cell to delete
     */
    public function delete($pCoord)
    {
    }
    /**
     * Get a list of all cell coordinates currently held in the collection.
     *
     * @return string[]
     */
    public function getCoordinates()
    {
    }
    /**
     * Get a sorted list of all cell coordinates currently held in the collection by row and column.
     *
     * @return string[]
     */
    public function getSortedCoordinates()
    {
    }
    /**
     * Get highest worksheet column and highest row that have cell records.
     *
     * @return array Highest column name and highest row number
     */
    public function getHighestRowAndColumn()
    {
    }
    /**
     * Return the cell coordinate of the currently active cell object.
     *
     * @return string
     */
    public function getCurrentCoordinate()
    {
    }
    /**
     * Return the column coordinate of the currently active cell object.
     *
     * @return string
     */
    public function getCurrentColumn()
    {
    }
    /**
     * Return the row coordinate of the currently active cell object.
     *
     * @return int
     */
    public function getCurrentRow()
    {
    }
    /**
     * Get highest worksheet column.
     *
     * @param string $row Return the highest column for the specified row,
     *                    or the highest column of any row if no row number is passed
     *
     * @return string Highest column name
     */
    public function getHighestColumn($row = null)
    {
    }
    /**
     * Get highest worksheet row.
     *
     * @param string $column Return the highest row for the specified column,
     *                       or the highest row of any column if no column letter is passed
     *
     * @return int Highest row number
     */
    public function getHighestRow($column = null)
    {
    }
    /**
     * Generate a unique ID for cache referencing.
     *
     * @return string Unique Reference
     */
    private function getUniqueID()
    {
    }
    /**
     * Clone the cell collection.
     *
     * @param Worksheet $parent The new worksheet that we're copying to
     *
     * @return self
     */
    public function cloneCellCollection(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $parent)
    {
    }
    /**
     * Remove a row, deleting all cells in that row.
     *
     * @param string $row Row number to remove
     */
    public function removeRow($row)
    {
    }
    /**
     * Remove a column, deleting all cells in that column.
     *
     * @param string $column Column ID to remove
     */
    public function removeColumn($column)
    {
    }
    /**
     * Store cell data in cache for the current cell object if it's "dirty",
     * and the 'nullify' the current cell object.
     *
     * @throws PhpSpreadsheetException
     */
    private function storeCurrentCell()
    {
    }
    /**
     * Add or update a cell identified by its coordinate into the collection.
     *
     * @param string $pCoord Coordinate of the cell to update
     * @param Cell $cell Cell to update
     *
     * @throws PhpSpreadsheetException
     *
     * @return \PhpOffice\PhpSpreadsheet\Cell\Cell
     */
    public function add($pCoord, \PhpOffice\PhpSpreadsheet\Cell\Cell $cell)
    {
    }
    /**
     * Get cell at a specific coordinate.
     *
     * @param string $pCoord Coordinate of the cell
     *
     * @throws PhpSpreadsheetException
     *
     * @return \PhpOffice\PhpSpreadsheet\Cell\Cell Cell that was found, or null if not found
     */
    public function get($pCoord)
    {
    }
    /**
     * Clear the cell collection and disconnect from our parent.
     */
    public function unsetWorksheetCells()
    {
    }
    /**
     * Destroy this cell collection.
     */
    public function __destruct()
    {
    }
    /**
     * Returns all known cache keys.
     *
     * @return \Generator|string[]
     */
    private function getAllCacheKeys()
    {
    }
}