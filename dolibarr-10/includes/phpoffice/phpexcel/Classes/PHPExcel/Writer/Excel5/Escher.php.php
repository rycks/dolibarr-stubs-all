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
 * @package    PHPExcel_Writer_Excel5
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    ##VERSION##, ##DATE##
 */
/**
 * PHPExcel_Shared_Escher_DggContainer_BstoreContainer
 *
 * @category   PHPExcel
 * @package    PHPExcel_Writer_Excel5
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Writer_Excel5_Escher
{
    /**
     * The object we are writing
     */
    private $_object;
    /**
     * The written binary data
     */
    private $_data;
    /**
     * Shape offsets. Positions in binary stream where a new shape record begins
     *
     * @var array
     */
    private $_spOffsets;
    /**
     * Shape types.
     *
     * @var array
     */
    private $_spTypes;
    /**
     * Constructor
     *
     * @param mixed
     */
    public function __construct($object)
    {
    }
    /**
     * Process the object to be written
     */
    public function close()
    {
    }
    /**
     * Gets the shape offsets
     *
     * @return array
     */
    public function getSpOffsets()
    {
    }
    /**
     * Gets the shape types
     *
     * @return array
     */
    public function getSpTypes()
    {
    }
}