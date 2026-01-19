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
 * @package	PHPExcel_Style
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license	http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version	##VERSION##, ##DATE##
 */
/**
 * PHPExcel_Style_Border
 *
 * @category   PHPExcel
 * @package	PHPExcel_Style
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Style_Border extends \PHPExcel_Style_Supervisor implements \PHPExcel_IComparable
{
    /* Border style */
    const BORDER_NONE = 'none';
    const BORDER_DASHDOT = 'dashDot';
    const BORDER_DASHDOTDOT = 'dashDotDot';
    const BORDER_DASHED = 'dashed';
    const BORDER_DOTTED = 'dotted';
    const BORDER_DOUBLE = 'double';
    const BORDER_HAIR = 'hair';
    const BORDER_MEDIUM = 'medium';
    const BORDER_MEDIUMDASHDOT = 'mediumDashDot';
    const BORDER_MEDIUMDASHDOTDOT = 'mediumDashDotDot';
    const BORDER_MEDIUMDASHED = 'mediumDashed';
    const BORDER_SLANTDASHDOT = 'slantDashDot';
    const BORDER_THICK = 'thick';
    const BORDER_THIN = 'thin';
    /**
     * Border style
     *
     * @var string
     */
    protected $_borderStyle = \PHPExcel_Style_Border::BORDER_NONE;
    /**
     * Border color
     *
     * @var PHPExcel_Style_Color
     */
    protected $_color;
    /**
     * Parent property name
     *
     * @var string
     */
    protected $_parentPropertyName;
    /**
     * Create a new PHPExcel_Style_Border
     *
     * @param	boolean	$isSupervisor	Flag indicating if this is a supervisor or not
     *									Leave this value at default unless you understand exactly what
     *										its ramifications are
     * @param	boolean	$isConditional	Flag indicating if this is a conditional style or not
     *									Leave this value at default unless you understand exactly what
     *										its ramifications are
     */
    public function __construct($isSupervisor = \FALSE, $isConditional = \FALSE)
    {
    }
    /**
     * Bind parent. Only used for supervisor
     *
     * @param PHPExcel_Style_Borders $parent
     * @param string $parentPropertyName
     * @return PHPExcel_Style_Border
     */
    public function bindParent($parent, $parentPropertyName = \NULL)
    {
    }
    /**
     * Get the shared style component for the currently active cell in currently active sheet.
     * Only used for style supervisor
     *
     * @return PHPExcel_Style_Border
     * @throws PHPExcel_Exception
     */
    public function getSharedComponent()
    {
    }
    /**
     * Build style array from subcomponents
     *
     * @param array $array
     * @return array
     */
    public function getStyleArray($array)
    {
    }
    /**
     * Apply styles from array
     *
     * <code>
     * $objPHPExcel->getActiveSheet()->getStyle('B2')->getBorders()->getTop()->applyFromArray(
     *		array(
     *			'style' => PHPExcel_Style_Border::BORDER_DASHDOT,
     *			'color' => array(
     *				'rgb' => '808080'
     *			)
     *		)
     * );
     * </code>
     *
     * @param	array	$pStyles	Array containing style information
     * @throws	PHPExcel_Exception
     * @return PHPExcel_Style_Border
     */
    public function applyFromArray($pStyles = \null)
    {
    }
    /**
     * Get Border style
     *
     * @return string
     */
    public function getBorderStyle()
    {
    }
    /**
     * Set Border style
     *
     * @param string|boolean	$pValue
     *							When passing a boolean, FALSE equates PHPExcel_Style_Border::BORDER_NONE
     *								and TRUE to PHPExcel_Style_Border::BORDER_MEDIUM
     * @return PHPExcel_Style_Border
     */
    public function setBorderStyle($pValue = \PHPExcel_Style_Border::BORDER_NONE)
    {
    }
    /**
     * Get Border Color
     *
     * @return PHPExcel_Style_Color
     */
    public function getColor()
    {
    }
    /**
     * Set Border Color
     *
     * @param	PHPExcel_Style_Color $pValue
     * @throws	PHPExcel_Exception
     * @return PHPExcel_Style_Border
     */
    public function setColor(\PHPExcel_Style_Color $pValue = \null)
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
}