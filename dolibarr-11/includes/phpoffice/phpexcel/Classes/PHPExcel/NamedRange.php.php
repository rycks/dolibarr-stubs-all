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
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    ##VERSION##, ##DATE##
 */
/**
 * PHPExcel_NamedRange
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_NamedRange
{
    /**
     * Range name
     *
     * @var string
     */
    private $_name;
    /**
     * Worksheet on which the named range can be resolved
     *
     * @var PHPExcel_Worksheet
     */
    private $_worksheet;
    /**
     * Range of the referenced cells
     *
     * @var string
     */
    private $_range;
    /**
     * Is the named range local? (i.e. can only be used on $this->_worksheet)
     *
     * @var bool
     */
    private $_localOnly;
    /**
     * Scope
     *
     * @var PHPExcel_Worksheet
     */
    private $_scope;
    /**
     * Create a new NamedRange
     *
     * @param string $pName
     * @param PHPExcel_Worksheet $pWorksheet
     * @param string $pRange
     * @param bool $pLocalOnly
     * @param PHPExcel_Worksheet|null $pScope	Scope. Only applies when $pLocalOnly = true. Null for global scope.
     * @throws PHPExcel_Exception
     */
    public function __construct($pName = \null, \PHPExcel_Worksheet $pWorksheet, $pRange = 'A1', $pLocalOnly = \false, $pScope = \null)
    {
    }
    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
    }
    /**
     * Set name
     *
     * @param string $value
     * @return PHPExcel_NamedRange
     */
    public function setName($value = \null)
    {
    }
    /**
     * Get worksheet
     *
     * @return PHPExcel_Worksheet
     */
    public function getWorksheet()
    {
    }
    /**
     * Set worksheet
     *
     * @param PHPExcel_Worksheet $value
     * @return PHPExcel_NamedRange
     */
    public function setWorksheet(\PHPExcel_Worksheet $value = \null)
    {
    }
    /**
     * Get range
     *
     * @return string
     */
    public function getRange()
    {
    }
    /**
     * Set range
     *
     * @param string $value
     * @return PHPExcel_NamedRange
     */
    public function setRange($value = \null)
    {
    }
    /**
     * Get localOnly
     *
     * @return bool
     */
    public function getLocalOnly()
    {
    }
    /**
     * Set localOnly
     *
     * @param bool $value
     * @return PHPExcel_NamedRange
     */
    public function setLocalOnly($value = \false)
    {
    }
    /**
     * Get scope
     *
     * @return PHPExcel_Worksheet|null
     */
    public function getScope()
    {
    }
    /**
     * Set scope
     *
     * @param PHPExcel_Worksheet|null $value
     * @return PHPExcel_NamedRange
     */
    public function setScope(\PHPExcel_Worksheet $value = \null)
    {
    }
    /**
     * Resolve a named range to a regular cell range
     *
     * @param string $pNamedRange Named range
     * @param PHPExcel_Worksheet|null $pSheet Scope. Use null for global scope
     * @return PHPExcel_NamedRange
     */
    public static function resolveRange($pNamedRange = '', \PHPExcel_Worksheet $pSheet)
    {
    }
    /**
     * Implement PHP __clone to create a deep clone, not just a shallow copy.
     */
    public function __clone()
    {
    }
}