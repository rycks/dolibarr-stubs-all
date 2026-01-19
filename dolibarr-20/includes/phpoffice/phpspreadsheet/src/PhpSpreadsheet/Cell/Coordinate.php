<?php

namespace PhpOffice\PhpSpreadsheet\Cell;

/**
 * Helper class to manipulate cell coordinates.
 *
 * Columns indexes and rows are always based on 1, **not** on 0. This match the behavior
 * that Excel users are used to, and also match the Excel functions `COLUMN()` and `ROW()`.
 */
abstract class Coordinate
{
    /**
     * Default range variable constant.
     *
     * @var string
     */
    const DEFAULT_RANGE = 'A1:A1';
    /**
     * Coordinate from string.
     *
     * @param string $pCoordinateString eg: 'A1'
     *
     * @throws Exception
     *
     * @return string[] Array containing column and row (indexes 0 and 1)
     */
    public static function coordinateFromString($pCoordinateString)
    {
    }
    /**
     * Checks if a coordinate represents a range of cells.
     *
     * @param string $coord eg: 'A1' or 'A1:A2' or 'A1:A2,C1:C2'
     *
     * @return bool Whether the coordinate represents a range of cells
     */
    public static function coordinateIsRange($coord)
    {
    }
    /**
     * Make string row, column or cell coordinate absolute.
     *
     * @param string $pCoordinateString e.g. 'A' or '1' or 'A1'
     *                    Note that this value can be a row or column reference as well as a cell reference
     *
     * @throws Exception
     *
     * @return string Absolute coordinate        e.g. '$A' or '$1' or '$A$1'
     */
    public static function absoluteReference($pCoordinateString)
    {
    }
    /**
     * Make string coordinate absolute.
     *
     * @param string $pCoordinateString e.g. 'A1'
     *
     * @throws Exception
     *
     * @return string Absolute coordinate        e.g. '$A$1'
     */
    public static function absoluteCoordinate($pCoordinateString)
    {
    }
    /**
     * Split range into coordinate strings.
     *
     * @param string $pRange e.g. 'B4:D9' or 'B4:D9,H2:O11' or 'B4'
     *
     * @return array Array containing one or more arrays containing one or two coordinate strings
     *                                e.g. ['B4','D9'] or [['B4','D9'], ['H2','O11']]
     *                                        or ['B4']
     */
    public static function splitRange($pRange)
    {
    }
    /**
     * Build range from coordinate strings.
     *
     * @param array $pRange Array containg one or more arrays containing one or two coordinate strings
     *
     * @throws Exception
     *
     * @return string String representation of $pRange
     */
    public static function buildRange(array $pRange)
    {
    }
    /**
     * Calculate range boundaries.
     *
     * @param string $pRange Cell range (e.g. A1:A1)
     *
     * @return array Range coordinates [Start Cell, End Cell]
     *                    where Start Cell and End Cell are arrays (Column Number, Row Number)
     */
    public static function rangeBoundaries($pRange)
    {
    }
    /**
     * Calculate range dimension.
     *
     * @param string $pRange Cell range (e.g. A1:A1)
     *
     * @return array Range dimension (width, height)
     */
    public static function rangeDimension($pRange)
    {
    }
    /**
     * Calculate range boundaries.
     *
     * @param string $pRange Cell range (e.g. A1:A1)
     *
     * @return array Range coordinates [Start Cell, End Cell]
     *                    where Start Cell and End Cell are arrays [Column ID, Row Number]
     */
    public static function getRangeBoundaries($pRange)
    {
    }
    /**
     * Column index from string.
     *
     * @param string $pString eg 'A'
     *
     * @return int Column index (A = 1)
     */
    public static function columnIndexFromString($pString)
    {
    }
    /**
     * String from column index.
     *
     * @param int $columnIndex Column index (A = 1)
     *
     * @return string
     */
    public static function stringFromColumnIndex($columnIndex)
    {
    }
    /**
     * Extract all cell references in range, which may be comprised of multiple cell ranges.
     *
     * @param string $pRange Range (e.g. A1 or A1:C10 or A1:E10 A20:E25)
     *
     * @return array Array containing single cell references
     */
    public static function extractAllCellReferencesInRange($pRange)
    {
    }
    /**
     * Get all cell references for an individual cell block.
     *
     * @param string $cellBlock A cell range e.g. A4:B5
     *
     * @return array All individual cells in that range
     */
    private static function getReferencesForCellBlock($cellBlock)
    {
    }
    /**
     * Convert an associative array of single cell coordinates to values to an associative array
     * of cell ranges to values.  Only adjacent cell coordinates with the same
     * value will be merged.  If the value is an object, it must implement the method getHashCode().
     *
     * For example, this function converts:
     *
     *    [ 'A1' => 'x', 'A2' => 'x', 'A3' => 'x', 'A4' => 'y' ]
     *
     * to:
     *
     *    [ 'A1:A3' => 'x', 'A4' => 'y' ]
     *
     * @param array $pCoordCollection associative array mapping coordinates to values
     *
     * @return array associative array mapping coordinate ranges to valuea
     */
    public static function mergeRangesInCollection(array $pCoordCollection)
    {
    }
    /**
     * Get the individual cell blocks from a range string, splitting by space and removing any $ characters.
     *
     * @param string $pRange
     *
     * @return string[]
     */
    private static function getCellBlocksFromRangeString($pRange)
    {
    }
    /**
     * Check that the given range is valid, i.e. that the start column and row are not greater than the end column and
     * row.
     *
     * @param string $cellBlock The original range, for displaying a meaningful error message
     * @param int $startColumnIndex
     * @param int $endColumnIndex
     * @param int $currentRow
     * @param int $endRow
     */
    private static function validateRange($cellBlock, $startColumnIndex, $endColumnIndex, $currentRow, $endRow)
    {
    }
}