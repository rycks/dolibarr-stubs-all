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
 * @package    PHPExcel_Style
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    ##VERSION##, ##DATE##
 */
/**
 * PHPExcel_Style_Conditional
 *
 * @category   PHPExcel
 * @package    PHPExcel_Style
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Style_Conditional implements \PHPExcel_IComparable
{
    /* Condition types */
    const CONDITION_NONE = 'none';
    const CONDITION_CELLIS = 'cellIs';
    const CONDITION_CONTAINSTEXT = 'containsText';
    const CONDITION_EXPRESSION = 'expression';
    /* Operator types */
    const OPERATOR_NONE = '';
    const OPERATOR_BEGINSWITH = 'beginsWith';
    const OPERATOR_ENDSWITH = 'endsWith';
    const OPERATOR_EQUAL = 'equal';
    const OPERATOR_GREATERTHAN = 'greaterThan';
    const OPERATOR_GREATERTHANOREQUAL = 'greaterThanOrEqual';
    const OPERATOR_LESSTHAN = 'lessThan';
    const OPERATOR_LESSTHANOREQUAL = 'lessThanOrEqual';
    const OPERATOR_NOTEQUAL = 'notEqual';
    const OPERATOR_CONTAINSTEXT = 'containsText';
    const OPERATOR_NOTCONTAINS = 'notContains';
    const OPERATOR_BETWEEN = 'between';
    /**
     * Condition type
     *
     * @var int
     */
    private $_conditionType;
    /**
     * Operator type
     *
     * @var int
     */
    private $_operatorType;
    /**
     * Text
     *
     * @var string
     */
    private $_text;
    /**
     * Condition
     *
     * @var string[]
     */
    private $_condition = array();
    /**
     * Style
     *
     * @var PHPExcel_Style
     */
    private $_style;
    /**
     * Create a new PHPExcel_Style_Conditional
     */
    public function __construct()
    {
    }
    /**
     * Get Condition type
     *
     * @return string
     */
    public function getConditionType()
    {
    }
    /**
     * Set Condition type
     *
     * @param string $pValue	PHPExcel_Style_Conditional condition type
     * @return PHPExcel_Style_Conditional
     */
    public function setConditionType($pValue = \PHPExcel_Style_Conditional::CONDITION_NONE)
    {
    }
    /**
     * Get Operator type
     *
     * @return string
     */
    public function getOperatorType()
    {
    }
    /**
     * Set Operator type
     *
     * @param string $pValue	PHPExcel_Style_Conditional operator type
     * @return PHPExcel_Style_Conditional
     */
    public function setOperatorType($pValue = \PHPExcel_Style_Conditional::OPERATOR_NONE)
    {
    }
    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
    }
    /**
     * Set text
     *
     * @param string $value
     * @return PHPExcel_Style_Conditional
     */
    public function setText($value = \null)
    {
    }
    /**
     * Get Condition
     *
     * @deprecated Deprecated, use getConditions instead
     * @return string
     */
    public function getCondition()
    {
    }
    /**
     * Set Condition
     *
     * @deprecated Deprecated, use setConditions instead
     * @param string $pValue	Condition
     * @return PHPExcel_Style_Conditional
     */
    public function setCondition($pValue = '')
    {
    }
    /**
     * Get Conditions
     *
     * @return string[]
     */
    public function getConditions()
    {
    }
    /**
     * Set Conditions
     *
     * @param string[] $pValue	Condition
     * @return PHPExcel_Style_Conditional
     */
    public function setConditions($pValue)
    {
    }
    /**
     * Add Condition
     *
     * @param string $pValue	Condition
     * @return PHPExcel_Style_Conditional
     */
    public function addCondition($pValue = '')
    {
    }
    /**
     * Get Style
     *
     * @return PHPExcel_Style
     */
    public function getStyle()
    {
    }
    /**
     * Set Style
     *
     * @param 	PHPExcel_Style $pValue
     * @throws 	PHPExcel_Exception
     * @return PHPExcel_Style_Conditional
     */
    public function setStyle(\PHPExcel_Style $pValue = \null)
    {
    }
    /**
     * Get hash code
     *
     * @return string	Hash code
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