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
 * @package    PHPExcel_Shared
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    ##VERSION##, ##DATE##
 */
/**
 * PHPExcel_Shared_Excel5
 *
 * @category   PHPExcel
 * @package    PHPExcel_Shared
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Shared_Excel5
{
    /**
     * Get the width of a column in pixels. We use the relationship y = ceil(7x) where
     * x is the width in intrinsic Excel units (measuring width in number of normal characters)
     * This holds for Arial 10
     *
     * @param PHPExcel_Worksheet $sheet The sheet
     * @param string $col The column
     * @return integer The width in pixels
     */
    public static function sizeCol($sheet, $col = 'A')
    {
    }
    /**
     * Convert the height of a cell from user's units to pixels. By interpolation
     * the relationship is: y = 4/3x. If the height hasn't been set by the user we
     * use the default value. If the row is hidden we use a value of zero.
     *
     * @param PHPExcel_Worksheet $sheet The sheet
     * @param integer $row The row index (1-based)
     * @return integer The width in pixels
     */
    public static function sizeRow($sheet, $row = 1)
    {
    }
    /**
     * Get the horizontal distance in pixels between two anchors
     * The distanceX is found as sum of all the spanning columns widths minus correction for the two offsets
     *
     * @param PHPExcel_Worksheet $sheet
     * @param string $startColumn
     * @param integer $startOffsetX Offset within start cell measured in 1/1024 of the cell width
     * @param string $endColumn
     * @param integer $endOffsetX Offset within end cell measured in 1/1024 of the cell width
     * @return integer Horizontal measured in pixels
     */
    public static function getDistanceX(\PHPExcel_Worksheet $sheet, $startColumn = 'A', $startOffsetX = 0, $endColumn = 'A', $endOffsetX = 0)
    {
    }
    /**
     * Get the vertical distance in pixels between two anchors
     * The distanceY is found as sum of all the spanning rows minus two offsets
     *
     * @param PHPExcel_Worksheet $sheet
     * @param integer $startRow (1-based)
     * @param integer $startOffsetY Offset within start cell measured in 1/256 of the cell height
     * @param integer $endRow (1-based)
     * @param integer $endOffsetY Offset within end cell measured in 1/256 of the cell height
     * @return integer Vertical distance measured in pixels
     */
    public static function getDistanceY(\PHPExcel_Worksheet $sheet, $startRow = 1, $startOffsetY = 0, $endRow = 1, $endOffsetY = 0)
    {
    }
    /**
     * Convert 1-cell anchor coordinates to 2-cell anchor coordinates
     * This function is ported from PEAR Spreadsheet_Writer_Excel with small modifications
     *
     * Calculate the vertices that define the position of the image as required by
     * the OBJ record.
     *
     *		 +------------+------------+
     *		 |	 A	  |	  B	 |
     *   +-----+------------+------------+
     *   |	 |(x1,y1)	 |			|
     *   |  1  |(A1)._______|______	  |
     *   |	 |	|			  |	 |
     *   |	 |	|			  |	 |
     *   +-----+----|	BITMAP	|-----+
     *   |	 |	|			  |	 |
     *   |  2  |	|______________.	 |
     *   |	 |			|		(B2)|
     *   |	 |			|	 (x2,y2)|
     *   +---- +------------+------------+
     *
     * Example of a bitmap that covers some of the area from cell A1 to cell B2.
     *
     * Based on the width and height of the bitmap we need to calculate 8 vars:
     *	 $col_start, $row_start, $col_end, $row_end, $x1, $y1, $x2, $y2.
     * The width and height of the cells are also variable and have to be taken into
     * account.
     * The values of $col_start and $row_start are passed in from the calling
     * function. The values of $col_end and $row_end are calculated by subtracting
     * the width and height of the bitmap from the width and height of the
     * underlying cells.
     * The vertices are expressed as a percentage of the underlying cell width as
     * follows (rhs values are in pixels):
     *
     *	   x1 = X / W *1024
     *	   y1 = Y / H *256
     *	   x2 = (X-1) / W *1024
     *	   y2 = (Y-1) / H *256
     *
     *	   Where:  X is distance from the left side of the underlying cell
     *			   Y is distance from the top of the underlying cell
     *			   W is the width of the cell
     *			   H is the height of the cell
     *
     * @param PHPExcel_Worksheet $sheet
     * @param string $coordinates E.g. 'A1'
     * @param integer $offsetX Horizontal offset in pixels
     * @param integer $offsetY Vertical offset in pixels
     * @param integer $width Width in pixels
     * @param integer $height Height in pixels
     * @return array
     */
    public static function oneAnchor2twoAnchor($sheet, $coordinates, $offsetX, $offsetY, $width, $height)
    {
    }
}