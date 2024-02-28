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
 * @package	PHPExcel_Worksheet
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license	http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version	##VERSION##, ##DATE##
 */
/**
 * PHPExcel_Worksheet_ColumnCellIterator
 *
 * Used to iterate columns in a PHPExcel_Worksheet
 *
 * @category   PHPExcel
 * @package	PHPExcel_Worksheet
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Worksheet_ColumnCellIterator extends \PHPExcel_Worksheet_CellIterator implements \Iterator
{
    /**
     * Column index
     *
     * @var string
     */
    protected $_columnIndex;
    /**
     * Start position
     *
     * @var int
     */
    protected $_startRow = 1;
    /**
     * End position
     *
     * @var int
     */
    protected $_endRow = 1;
    /**
     * Create a new row iterator
     *
     * @param	PHPExcel_Worksheet	$subject	    The worksheet to iterate over
     * @param   string              $columnIndex    The column that we want to iterate
     * @param	integer				$startRow	    The row number at which to start iterating
     * @param	integer				$endRow	        Optionally, the row number at which to stop iterating
     */
    public function __construct(\PHPExcel_Worksheet $subject = \null, $columnIndex, $startRow = 1, $endRow = \null)
    {
    }
    /**
     * Destructor
     */
    public function __destruct()
    {
    }
    /**
     * (Re)Set the start row and the current row pointer
     *
     * @param integer	$startRow	The row number at which to start iterating
     * @return PHPExcel_Worksheet_ColumnCellIterator
     * @throws PHPExcel_Exception
     */
    public function resetStart($startRow = 1)
    {
    }
    /**
     * (Re)Set the end row
     *
     * @param integer	$endRow	The row number at which to stop iterating
     * @return PHPExcel_Worksheet_ColumnCellIterator
     * @throws PHPExcel_Exception
     */
    public function resetEnd($endRow = \null)
    {
    }
    /**
     * Set the row pointer to the selected row
     *
     * @param integer	$row	The row number to set the current pointer at
     * @return PHPExcel_Worksheet_ColumnCellIterator
     * @throws PHPExcel_Exception
     */
    public function seek($row = 1)
    {
    }
    /**
     * Rewind the iterator to the starting row
     */
    public function rewind()
    {
    }
    /**
     * Return the current cell in this worksheet column
     *
     * @return PHPExcel_Worksheet_Row
     */
    public function current()
    {
    }
    /**
     * Return the current iterator key
     *
     * @return int
     */
    public function key()
    {
    }
    /**
     * Set the iterator to its next value
     */
    public function next()
    {
    }
    /**
     * Set the iterator to its previous value
     */
    public function prev()
    {
    }
    /**
     * Indicate if more rows exist in the worksheet range of rows that we're iterating
     *
     * @return boolean
     */
    public function valid()
    {
    }
    /**
     * Validate start/end values for "IterateOnlyExistingCells" mode, and adjust if necessary
     *
     * @throws PHPExcel_Exception
     */
    protected function adjustForExistingOnlyRange()
    {
    }
}