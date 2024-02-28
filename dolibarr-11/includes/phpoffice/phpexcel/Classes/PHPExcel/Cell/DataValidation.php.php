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
 * @package    PHPExcel_Cell
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 * @version    ##VERSION##, ##DATE##
 */
/**
 * PHPExcel_Cell_DataValidation
 *
 * @category   PHPExcel
 * @package    PHPExcel_Cell
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Cell_DataValidation
{
    /* Data validation types */
    const TYPE_NONE = 'none';
    const TYPE_CUSTOM = 'custom';
    const TYPE_DATE = 'date';
    const TYPE_DECIMAL = 'decimal';
    const TYPE_LIST = 'list';
    const TYPE_TEXTLENGTH = 'textLength';
    const TYPE_TIME = 'time';
    const TYPE_WHOLE = 'whole';
    /* Data validation error styles */
    const STYLE_STOP = 'stop';
    const STYLE_WARNING = 'warning';
    const STYLE_INFORMATION = 'information';
    /* Data validation operators */
    const OPERATOR_BETWEEN = 'between';
    const OPERATOR_EQUAL = 'equal';
    const OPERATOR_GREATERTHAN = 'greaterThan';
    const OPERATOR_GREATERTHANOREQUAL = 'greaterThanOrEqual';
    const OPERATOR_LESSTHAN = 'lessThan';
    const OPERATOR_LESSTHANOREQUAL = 'lessThanOrEqual';
    const OPERATOR_NOTBETWEEN = 'notBetween';
    const OPERATOR_NOTEQUAL = 'notEqual';
    /**
     * Formula 1
     *
     * @var string
     */
    private $_formula1;
    /**
     * Formula 2
     *
     * @var string
     */
    private $_formula2;
    /**
     * Type
     *
     * @var string
     */
    private $_type = \PHPExcel_Cell_DataValidation::TYPE_NONE;
    /**
     * Error style
     *
     * @var string
     */
    private $_errorStyle = \PHPExcel_Cell_DataValidation::STYLE_STOP;
    /**
     * Operator
     *
     * @var string
     */
    private $_operator;
    /**
     * Allow Blank
     *
     * @var boolean
     */
    private $_allowBlank;
    /**
     * Show DropDown
     *
     * @var boolean
     */
    private $_showDropDown;
    /**
     * Show InputMessage
     *
     * @var boolean
     */
    private $_showInputMessage;
    /**
     * Show ErrorMessage
     *
     * @var boolean
     */
    private $_showErrorMessage;
    /**
     * Error title
     *
     * @var string
     */
    private $_errorTitle;
    /**
     * Error
     *
     * @var string
     */
    private $_error;
    /**
     * Prompt title
     *
     * @var string
     */
    private $_promptTitle;
    /**
     * Prompt
     *
     * @var string
     */
    private $_prompt;
    /**
     * Create a new PHPExcel_Cell_DataValidation
     */
    public function __construct()
    {
    }
    /**
     * Get Formula 1
     *
     * @return string
     */
    public function getFormula1()
    {
    }
    /**
     * Set Formula 1
     *
     * @param  string    $value
     * @return PHPExcel_Cell_DataValidation
     */
    public function setFormula1($value = '')
    {
    }
    /**
     * Get Formula 2
     *
     * @return string
     */
    public function getFormula2()
    {
    }
    /**
     * Set Formula 2
     *
     * @param  string    $value
     * @return PHPExcel_Cell_DataValidation
     */
    public function setFormula2($value = '')
    {
    }
    /**
     * Get Type
     *
     * @return string
     */
    public function getType()
    {
    }
    /**
     * Set Type
     *
     * @param  string    $value
     * @return PHPExcel_Cell_DataValidation
     */
    public function setType($value = \PHPExcel_Cell_DataValidation::TYPE_NONE)
    {
    }
    /**
     * Get Error style
     *
     * @return string
     */
    public function getErrorStyle()
    {
    }
    /**
     * Set Error style
     *
     * @param  string    $value
     * @return PHPExcel_Cell_DataValidation
     */
    public function setErrorStyle($value = \PHPExcel_Cell_DataValidation::STYLE_STOP)
    {
    }
    /**
     * Get Operator
     *
     * @return string
     */
    public function getOperator()
    {
    }
    /**
     * Set Operator
     *
     * @param  string    $value
     * @return PHPExcel_Cell_DataValidation
     */
    public function setOperator($value = '')
    {
    }
    /**
     * Get Allow Blank
     *
     * @return boolean
     */
    public function getAllowBlank()
    {
    }
    /**
     * Set Allow Blank
     *
     * @param  boolean    $value
     * @return PHPExcel_Cell_DataValidation
     */
    public function setAllowBlank($value = \false)
    {
    }
    /**
     * Get Show DropDown
     *
     * @return boolean
     */
    public function getShowDropDown()
    {
    }
    /**
     * Set Show DropDown
     *
     * @param  boolean    $value
     * @return PHPExcel_Cell_DataValidation
     */
    public function setShowDropDown($value = \false)
    {
    }
    /**
     * Get Show InputMessage
     *
     * @return boolean
     */
    public function getShowInputMessage()
    {
    }
    /**
     * Set Show InputMessage
     *
     * @param  boolean    $value
     * @return PHPExcel_Cell_DataValidation
     */
    public function setShowInputMessage($value = \false)
    {
    }
    /**
     * Get Show ErrorMessage
     *
     * @return boolean
     */
    public function getShowErrorMessage()
    {
    }
    /**
     * Set Show ErrorMessage
     *
     * @param  boolean    $value
     * @return PHPExcel_Cell_DataValidation
     */
    public function setShowErrorMessage($value = \false)
    {
    }
    /**
     * Get Error title
     *
     * @return string
     */
    public function getErrorTitle()
    {
    }
    /**
     * Set Error title
     *
     * @param  string    $value
     * @return PHPExcel_Cell_DataValidation
     */
    public function setErrorTitle($value = '')
    {
    }
    /**
     * Get Error
     *
     * @return string
     */
    public function getError()
    {
    }
    /**
     * Set Error
     *
     * @param  string    $value
     * @return PHPExcel_Cell_DataValidation
     */
    public function setError($value = '')
    {
    }
    /**
     * Get Prompt title
     *
     * @return string
     */
    public function getPromptTitle()
    {
    }
    /**
     * Set Prompt title
     *
     * @param  string    $value
     * @return PHPExcel_Cell_DataValidation
     */
    public function setPromptTitle($value = '')
    {
    }
    /**
     * Get Prompt
     *
     * @return string
     */
    public function getPrompt()
    {
    }
    /**
     * Set Prompt
     *
     * @param  string    $value
     * @return PHPExcel_Cell_DataValidation
     */
    public function setPrompt($value = '')
    {
    }
    /**
     * Get hash code
     *
     * @return string    Hash code
     */
    public function getHashCode()
    {
    }
    /**
     * Implement PHP __clone to create a deep clone, not just a shallow copy.
     */
    public function __clone()
    {
    }
}