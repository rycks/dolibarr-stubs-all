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
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 * @version    ##VERSION##, ##DATE##
 */
/**
 * PHPExcel_Style
 *
 * @category   PHPExcel
 * @package    PHPExcel_Style
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Style extends \PHPExcel_Style_Supervisor implements \PHPExcel_IComparable
{
    /**
     * Font
     *
     * @var PHPExcel_Style_Font
     */
    protected $_font;
    /**
     * Fill
     *
     * @var PHPExcel_Style_Fill
     */
    protected $_fill;
    /**
     * Borders
     *
     * @var PHPExcel_Style_Borders
     */
    protected $_borders;
    /**
     * Alignment
     *
     * @var PHPExcel_Style_Alignment
     */
    protected $_alignment;
    /**
     * Number Format
     *
     * @var PHPExcel_Style_NumberFormat
     */
    protected $_numberFormat;
    /**
     * Conditional styles
     *
     * @var PHPExcel_Style_Conditional[]
     */
    protected $_conditionalStyles;
    /**
     * Protection
     *
     * @var PHPExcel_Style_Protection
     */
    protected $_protection;
    /**
     * Index of style in collection. Only used for real style.
     *
     * @var int
     */
    protected $_index;
    /**
     * Use Quote Prefix when displaying in cell editor. Only used for real style.
     *
     * @var boolean
     */
    protected $_quotePrefix = \false;
    /**
     * Create a new PHPExcel_Style
     *
     * @param boolean $isSupervisor Flag indicating if this is a supervisor or not
     * 		Leave this value at default unless you understand exactly what
     *    its ramifications are
     * @param boolean $isConditional Flag indicating if this is a conditional style or not
     *   	Leave this value at default unless you understand exactly what
     *    its ramifications are
     */
    public function __construct($isSupervisor = \false, $isConditional = \false)
    {
    }
    /**
     * Get the shared style component for the currently active cell in currently active sheet.
     * Only used for style supervisor
     *
     * @return PHPExcel_Style
     */
    public function getSharedComponent()
    {
    }
    /**
     * Get parent. Only used for style supervisor
     *
     * @return PHPExcel
     */
    public function getParent()
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
     * $objPHPExcel->getActiveSheet()->getStyle('B2')->applyFromArray(
     *         array(
     *             'font'    => array(
     *                 'name'      => 'Arial',
     *                 'bold'      => true,
     *                 'italic'    => false,
     *                 'underline' => PHPExcel_Style_Font::UNDERLINE_DOUBLE,
     *                 'strike'    => false,
     *                 'color'     => array(
     *                     'rgb' => '808080'
     *                 )
     *             ),
     *             'borders' => array(
     *                 'bottom'     => array(
     *                     'style' => PHPExcel_Style_Border::BORDER_DASHDOT,
     *                     'color' => array(
     *                         'rgb' => '808080'
     *                     )
     *                 ),
     *                 'top'     => array(
     *                     'style' => PHPExcel_Style_Border::BORDER_DASHDOT,
     *                     'color' => array(
     *                         'rgb' => '808080'
     *                     )
     *                 )
     *             ),
     *             'quotePrefix'    => true
     *         )
     * );
     * </code>
     *
     * @param    array    $pStyles    Array containing style information
     * @param     boolean        $pAdvanced    Advanced mode for setting borders.
     * @throws    PHPExcel_Exception
     * @return PHPExcel_Style
     */
    public function applyFromArray($pStyles = \null, $pAdvanced = \true)
    {
    }
    /**
     * Get Fill
     *
     * @return PHPExcel_Style_Fill
     */
    public function getFill()
    {
    }
    /**
     * Get Font
     *
     * @return PHPExcel_Style_Font
     */
    public function getFont()
    {
    }
    /**
     * Set font
     *
     * @param PHPExcel_Style_Font $font
     * @return PHPExcel_Style
     */
    public function setFont(\PHPExcel_Style_Font $font)
    {
    }
    /**
     * Get Borders
     *
     * @return PHPExcel_Style_Borders
     */
    public function getBorders()
    {
    }
    /**
     * Get Alignment
     *
     * @return PHPExcel_Style_Alignment
     */
    public function getAlignment()
    {
    }
    /**
     * Get Number Format
     *
     * @return PHPExcel_Style_NumberFormat
     */
    public function getNumberFormat()
    {
    }
    /**
     * Get Conditional Styles. Only used on supervisor.
     *
     * @return PHPExcel_Style_Conditional[]
     */
    public function getConditionalStyles()
    {
    }
    /**
     * Set Conditional Styles. Only used on supervisor.
     *
     * @param PHPExcel_Style_Conditional[] $pValue Array of condtional styles
     * @return PHPExcel_Style
     */
    public function setConditionalStyles($pValue = \null)
    {
    }
    /**
     * Get Protection
     *
     * @return PHPExcel_Style_Protection
     */
    public function getProtection()
    {
    }
    /**
     * Get quote prefix
     *
     * @return boolean
     */
    public function getQuotePrefix()
    {
    }
    /**
     * Set quote prefix
     *
     * @param boolean $pValue
     */
    public function setQuotePrefix($pValue)
    {
    }
    /**
     * Get hash code
     *
     * @return string Hash code
     */
    public function getHashCode()
    {
    }
    /**
     * Get own index in style collection
     *
     * @return int
     */
    public function getIndex()
    {
    }
    /**
     * Set own index in style collection
     *
     * @param int $pValue
     */
    public function setIndex($pValue)
    {
    }
}