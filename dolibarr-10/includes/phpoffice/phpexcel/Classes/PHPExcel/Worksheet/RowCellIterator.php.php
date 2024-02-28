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
 * PHPExcel_Worksheet_RowCellIterator
 *
 * Used to iterate columns in a PHPExcel_Worksheet
 *
 * @category   PHPExcel
 * @package	PHPExcel_Worksheet
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Worksheet_RowCellIterator extends \PHPExcel_Worksheet_CellIterator implements \Iterator
{
    /**
     * Row index
     *
     * @var int
     */
    protected $_rowIndex;
    /**
     * Start position
     *
     * @var int
     */
    protected $_startColumn = 0;
    /**
     * End position
     *
     * @var int
     */
    protected $_endColumn = 0;
    /**
     * Create a new column iterator
     *
     * @param	PHPExcel_Worksheet	$subject	    The worksheet to iterate over
     * @param   integer             $rowIndex       The row that we want to iterate
     * @param	string				$startColumn	The column address at which to start iterating
     * @param	string				$endColumn	    Optionally, the column address at which to stop iterating
     */
    public function __construct(\PHPExcel_Worksheet $subject = \null, $rowIndex = 1, $startColumn = 'A', $endColumn = \null)
    {
    }
    /**
     * Destructor
     */
    public function __destruct()
    {
    }
    /**
     * (Re)Set the start column and the current column pointer
     *
     * @param integer	$startColumn	The column address at which to start iterating
     * @return PHPExcel_Worksheet_RowCellIterator
     * @throws PHPExcel_Exception
     */
    public function resetStart($startColumn = 'A')
    {
    }
    /**
     * (Re)Set the end column
     *
     * @param string	$endColumn	The column address at which to stop iterating
     * @return PHPExcel_Worksheet_RowCellIterator
     * @throws PHPExcel_Exception
     */
    public function resetEnd($endColumn = \null)
    {
    }
    /**
     * Set the column pointer to the selected column
     *
     * @param string	$column	The column address to set the current pointer at
     * @return PHPExcel_Worksheet_RowCellIterator
     * @throws PHPExcel_Exception
     */
    public function seek($column = 'A')
    {
    }
    /**
     * Rewind the iterator to the starting column
     */
    public function rewind()
    {
    }
    /**
     * Return the current cell in this worksheet row
     *
     * @return PHPExcel_Cell
     */
    public function current()
    {
    }
    /**
     * Return the current iterator key
     *
     * @return string
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
     *
     * @throws PHPExcel_Exception
     */
    public function prev()
    {
    }
    /**
     * Indicate if more columns exist in the worksheet range of columns that we're iterating
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