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
 * PHPExcel_Style_Font
 *
 * @category   PHPExcel
 * @package	PHPExcel_Style
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Style_Font extends \PHPExcel_Style_Supervisor implements \PHPExcel_IComparable
{
    /* Underline types */
    const UNDERLINE_NONE = 'none';
    const UNDERLINE_DOUBLE = 'double';
    const UNDERLINE_DOUBLEACCOUNTING = 'doubleAccounting';
    const UNDERLINE_SINGLE = 'single';
    const UNDERLINE_SINGLEACCOUNTING = 'singleAccounting';
    /**
     * Font Name
     *
     * @var string
     */
    protected $_name = 'Calibri';
    /**
     * Font Size
     *
     * @var float
     */
    protected $_size = 11;
    /**
     * Bold
     *
     * @var boolean
     */
    protected $_bold = \FALSE;
    /**
     * Italic
     *
     * @var boolean
     */
    protected $_italic = \FALSE;
    /**
     * Superscript
     *
     * @var boolean
     */
    protected $_superScript = \FALSE;
    /**
     * Subscript
     *
     * @var boolean
     */
    protected $_subScript = \FALSE;
    /**
     * Underline
     *
     * @var string
     */
    protected $_underline = self::UNDERLINE_NONE;
    /**
     * Strikethrough
     *
     * @var boolean
     */
    protected $_strikethrough = \FALSE;
    /**
     * Foreground color
     *
     * @var PHPExcel_Style_Color
     */
    protected $_color;
    /**
     * Create a new PHPExcel_Style_Font
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
     * @return PHPExcel_Style_Font
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
     * $objPHPExcel->getActiveSheet()->getStyle('B2')->getFont()->applyFromArray(
     *		array(
     *			'name'		=> 'Arial',
     *			'bold'		=> TRUE,
     *			'italic'	=> FALSE,
     *			'underline' => PHPExcel_Style_Font::UNDERLINE_DOUBLE,
     *			'strike'	=> FALSE,
     *			'color'		=> array(
     *				'rgb' => '808080'
     *			)
     *		)
     * );
     * </code>
     *
     * @param	array	$pStyles	Array containing style information
     * @throws	PHPExcel_Exception
     * @return PHPExcel_Style_Font
     */
    public function applyFromArray($pStyles = \null)
    {
    }
    /**
     * Get Name
     *
     * @return string
     */
    public function getName()
    {
    }
    /**
     * Set Name
     *
     * @param string $pValue
     * @return PHPExcel_Style_Font
     */
    public function setName($pValue = 'Calibri')
    {
    }
    /**
     * Get Size
     *
     * @return double
     */
    public function getSize()
    {
    }
    /**
     * Set Size
     *
     * @param double $pValue
     * @return PHPExcel_Style_Font
     */
    public function setSize($pValue = 10)
    {
    }
    /**
     * Get Bold
     *
     * @return boolean
     */
    public function getBold()
    {
    }
    /**
     * Set Bold
     *
     * @param boolean $pValue
     * @return PHPExcel_Style_Font
     */
    public function setBold($pValue = \false)
    {
    }
    /**
     * Get Italic
     *
     * @return boolean
     */
    public function getItalic()
    {
    }
    /**
     * Set Italic
     *
     * @param boolean $pValue
     * @return PHPExcel_Style_Font
     */
    public function setItalic($pValue = \false)
    {
    }
    /**
     * Get SuperScript
     *
     * @return boolean
     */
    public function getSuperScript()
    {
    }
    /**
     * Set SuperScript
     *
     * @param boolean $pValue
     * @return PHPExcel_Style_Font
     */
    public function setSuperScript($pValue = \false)
    {
    }
    /**
     * Get SubScript
     *
     * @return boolean
     */
    public function getSubScript()
    {
    }
    /**
     * Set SubScript
     *
     * @param boolean $pValue
     * @return PHPExcel_Style_Font
     */
    public function setSubScript($pValue = \false)
    {
    }
    /**
     * Get Underline
     *
     * @return string
     */
    public function getUnderline()
    {
    }
    /**
     * Set Underline
     *
     * @param string|boolean $pValue	PHPExcel_Style_Font underline type
     *									If a boolean is passed, then TRUE equates to UNDERLINE_SINGLE,
     *										false equates to UNDERLINE_NONE
     * @return PHPExcel_Style_Font
     */
    public function setUnderline($pValue = self::UNDERLINE_NONE)
    {
    }
    /**
     * Get Strikethrough
     *
     * @return boolean
     */
    public function getStrikethrough()
    {
    }
    /**
     * Set Strikethrough
     *
     * @param boolean $pValue
     * @return PHPExcel_Style_Font
     */
    public function setStrikethrough($pValue = \false)
    {
    }
    /**
     * Get Color
     *
     * @return PHPExcel_Style_Color
     */
    public function getColor()
    {
    }
    /**
     * Set Color
     *
     * @param	PHPExcel_Style_Color $pValue
     * @throws	PHPExcel_Exception
     * @return PHPExcel_Style_Font
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