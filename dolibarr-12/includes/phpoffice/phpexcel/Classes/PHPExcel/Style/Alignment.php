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
 * PHPExcel_Style_Alignment
 *
 * @category   PHPExcel
 * @package	PHPExcel_Style
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Style_Alignment extends \PHPExcel_Style_Supervisor implements \PHPExcel_IComparable
{
    /* Horizontal alignment styles */
    const HORIZONTAL_GENERAL = 'general';
    const HORIZONTAL_LEFT = 'left';
    const HORIZONTAL_RIGHT = 'right';
    const HORIZONTAL_CENTER = 'center';
    const HORIZONTAL_CENTER_CONTINUOUS = 'centerContinuous';
    const HORIZONTAL_JUSTIFY = 'justify';
    const HORIZONTAL_FILL = 'fill';
    const HORIZONTAL_DISTRIBUTED = 'distributed';
    // Excel2007 only
    /* Vertical alignment styles */
    const VERTICAL_BOTTOM = 'bottom';
    const VERTICAL_TOP = 'top';
    const VERTICAL_CENTER = 'center';
    const VERTICAL_JUSTIFY = 'justify';
    const VERTICAL_DISTRIBUTED = 'distributed';
    // Excel2007 only
    /* Read order */
    const READORDER_CONTEXT = 0;
    const READORDER_LTR = 1;
    const READORDER_RTL = 2;
    /**
     * Horizontal alignment
     *
     * @var string
     */
    protected $_horizontal = \PHPExcel_Style_Alignment::HORIZONTAL_GENERAL;
    /**
     * Vertical alignment
     *
     * @var string
     */
    protected $_vertical = \PHPExcel_Style_Alignment::VERTICAL_BOTTOM;
    /**
     * Text rotation
     *
     * @var integer
     */
    protected $_textRotation = 0;
    /**
     * Wrap text
     *
     * @var boolean
     */
    protected $_wrapText = \FALSE;
    /**
     * Shrink to fit
     *
     * @var boolean
     */
    protected $_shrinkToFit = \FALSE;
    /**
     * Indent - only possible with horizontal alignment left and right
     *
     * @var integer
     */
    protected $_indent = 0;
    /**
     * Read order
     *
     * @var integer
     */
    protected $_readorder = 0;
    /**
     * Create a new PHPExcel_Style_Alignment
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
     * Get the shared style component for the currently active cell in currently active sheet.
     * Only used for style supervisor
     *
     * @return PHPExcel_Style_Alignment
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
     * $objPHPExcel->getActiveSheet()->getStyle('B2')->getAlignment()->applyFromArray(
     *		array(
     *			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
     *			'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
     *			'rotation'   => 0,
     *			'wrap'			=> TRUE
     *		)
     * );
     * </code>
     *
     * @param	array	$pStyles	Array containing style information
     * @throws	PHPExcel_Exception
     * @return PHPExcel_Style_Alignment
     */
    public function applyFromArray($pStyles = \NULL)
    {
    }
    /**
     * Get Horizontal
     *
     * @return string
     */
    public function getHorizontal()
    {
    }
    /**
     * Set Horizontal
     *
     * @param string $pValue
     * @return PHPExcel_Style_Alignment
     */
    public function setHorizontal($pValue = \PHPExcel_Style_Alignment::HORIZONTAL_GENERAL)
    {
    }
    /**
     * Get Vertical
     *
     * @return string
     */
    public function getVertical()
    {
    }
    /**
     * Set Vertical
     *
     * @param string $pValue
     * @return PHPExcel_Style_Alignment
     */
    public function setVertical($pValue = \PHPExcel_Style_Alignment::VERTICAL_BOTTOM)
    {
    }
    /**
     * Get TextRotation
     *
     * @return int
     */
    public function getTextRotation()
    {
    }
    /**
     * Set TextRotation
     *
     * @param int $pValue
     * @throws PHPExcel_Exception
     * @return PHPExcel_Style_Alignment
     */
    public function setTextRotation($pValue = 0)
    {
    }
    /**
     * Get Wrap Text
     *
     * @return boolean
     */
    public function getWrapText()
    {
    }
    /**
     * Set Wrap Text
     *
     * @param boolean $pValue
     * @return PHPExcel_Style_Alignment
     */
    public function setWrapText($pValue = \FALSE)
    {
    }
    /**
     * Get Shrink to fit
     *
     * @return boolean
     */
    public function getShrinkToFit()
    {
    }
    /**
     * Set Shrink to fit
     *
     * @param boolean $pValue
     * @return PHPExcel_Style_Alignment
     */
    public function setShrinkToFit($pValue = \FALSE)
    {
    }
    /**
     * Get indent
     *
     * @return int
     */
    public function getIndent()
    {
    }
    /**
     * Set indent
     *
     * @param int $pValue
     * @return PHPExcel_Style_Alignment
     */
    public function setIndent($pValue = 0)
    {
    }
    /**
     * Get read order
     *
     * @return integer
     */
    public function getReadorder()
    {
    }
    /**
     * Set read order
     *
     * @param int $pValue
     * @return PHPExcel_Style_Alignment
     */
    public function setReadorder($pValue = 0)
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