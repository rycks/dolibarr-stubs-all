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
 * @package    PHPExcel_Calculation
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    ##VERSION##, ##DATE##
 */
/**
 * PHPExcel_Calculation_Function
 *
 * @category   PHPExcel
 * @package    PHPExcel_Calculation
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Calculation_Function
{
    /* Function categories */
    const CATEGORY_CUBE = 'Cube';
    const CATEGORY_DATABASE = 'Database';
    const CATEGORY_DATE_AND_TIME = 'Date and Time';
    const CATEGORY_ENGINEERING = 'Engineering';
    const CATEGORY_FINANCIAL = 'Financial';
    const CATEGORY_INFORMATION = 'Information';
    const CATEGORY_LOGICAL = 'Logical';
    const CATEGORY_LOOKUP_AND_REFERENCE = 'Lookup and Reference';
    const CATEGORY_MATH_AND_TRIG = 'Math and Trig';
    const CATEGORY_STATISTICAL = 'Statistical';
    const CATEGORY_TEXT_AND_DATA = 'Text and Data';
    /**
     * Category (represented by CATEGORY_*)
     *
     * @var string
     */
    private $_category;
    /**
     * Excel name
     *
     * @var string
     */
    private $_excelName;
    /**
     * PHPExcel name
     *
     * @var string
     */
    private $_phpExcelName;
    /**
     * Create a new PHPExcel_Calculation_Function
     *
     * @param 	string		$pCategory 		Category (represented by CATEGORY_*)
     * @param 	string		$pExcelName		Excel function name
     * @param 	string		$pPHPExcelName	PHPExcel function mapping
     * @throws 	PHPExcel_Calculation_Exception
     */
    public function __construct($pCategory = \NULL, $pExcelName = \NULL, $pPHPExcelName = \NULL)
    {
    }
    /**
     * Get Category (represented by CATEGORY_*)
     *
     * @return string
     */
    public function getCategory()
    {
    }
    /**
     * Set Category (represented by CATEGORY_*)
     *
     * @param 	string		$value
     * @throws 	PHPExcel_Calculation_Exception
     */
    public function setCategory($value = \null)
    {
    }
    /**
     * Get Excel name
     *
     * @return string
     */
    public function getExcelName()
    {
    }
    /**
     * Set Excel name
     *
     * @param string	$value
     */
    public function setExcelName($value)
    {
    }
    /**
     * Get PHPExcel name
     *
     * @return string
     */
    public function getPHPExcelName()
    {
    }
    /**
     * Set PHPExcel name
     *
     * @param string	$value
     */
    public function setPHPExcelName($value)
    {
    }
}