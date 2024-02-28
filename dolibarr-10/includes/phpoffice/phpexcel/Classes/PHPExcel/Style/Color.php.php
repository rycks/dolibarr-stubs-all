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
 * @copyright Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version ##VERSION##, ##DATE##
 */
/**
 * PHPExcel_Style_Color
 *
 * @category   PHPExcel
 * @package	PHPExcel_Style
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Style_Color extends \PHPExcel_Style_Supervisor implements \PHPExcel_IComparable
{
    /* Colors */
    const COLOR_BLACK = 'FF000000';
    const COLOR_WHITE = 'FFFFFFFF';
    const COLOR_RED = 'FFFF0000';
    const COLOR_DARKRED = 'FF800000';
    const COLOR_BLUE = 'FF0000FF';
    const COLOR_DARKBLUE = 'FF000080';
    const COLOR_GREEN = 'FF00FF00';
    const COLOR_DARKGREEN = 'FF008000';
    const COLOR_YELLOW = 'FFFFFF00';
    const COLOR_DARKYELLOW = 'FF808000';
    /**
     * Indexed colors array
     *
     * @var array
     */
    protected static $_indexedColors;
    /**
     * ARGB - Alpha RGB
     *
     * @var string
     */
    protected $_argb = \NULL;
    /**
     * Parent property name
     *
     * @var string
     */
    protected $_parentPropertyName;
    /**
     * Create a new PHPExcel_Style_Color
     *
     * @param	string	$pARGB			ARGB value for the colour
     * @param	boolean	$isSupervisor	Flag indicating if this is a supervisor or not
     *									Leave this value at default unless you understand exactly what
     *										its ramifications are
     * @param	boolean	$isConditional	Flag indicating if this is a conditional style or not
     *									Leave this value at default unless you understand exactly what
     *										its ramifications are
     */
    public function __construct($pARGB = \PHPExcel_Style_Color::COLOR_BLACK, $isSupervisor = \FALSE, $isConditional = \FALSE)
    {
    }
    /**
     * Bind parent. Only used for supervisor
     *
     * @param mixed $parent
     * @param string $parentPropertyName
     * @return PHPExcel_Style_Color
     */
    public function bindParent($parent, $parentPropertyName = \NULL)
    {
    }
    /**
     * Get the shared style component for the currently active cell in currently active sheet.
     * Only used for style supervisor
     *
     * @return PHPExcel_Style_Color
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
     * $objPHPExcel->getActiveSheet()->getStyle('B2')->getFont()->getColor()->applyFromArray( array('rgb' => '808080') );
     * </code>
     *
     * @param	array	$pStyles	Array containing style information
     * @throws	PHPExcel_Exception
     * @return PHPExcel_Style_Color
     */
    public function applyFromArray($pStyles = \NULL)
    {
    }
    /**
     * Get ARGB
     *
     * @return string
     */
    public function getARGB()
    {
    }
    /**
     * Set ARGB
     *
     * @param string $pValue
     * @return PHPExcel_Style_Color
     */
    public function setARGB($pValue = \PHPExcel_Style_Color::COLOR_BLACK)
    {
    }
    /**
     * Get RGB
     *
     * @return string
     */
    public function getRGB()
    {
    }
    /**
     * Set RGB
     *
     * @param	string	$pValue	RGB value
     * @return PHPExcel_Style_Color
     */
    public function setRGB($pValue = '000000')
    {
    }
    /**
     * Get a specified colour component of an RGB value
     *
     * @private
     * @param	string		$RGB		The colour as an RGB value (e.g. FF00CCCC or CCDDEE
     * @param	int			$offset		Position within the RGB value to extract
     * @param	boolean		$hex		Flag indicating whether the component should be returned as a hex or a
     *									decimal value
     * @return	string		The extracted colour component
     */
    private static function _getColourComponent($RGB, $offset, $hex = \TRUE)
    {
    }
    /**
     * Get the red colour component of an RGB value
     *
     * @param	string		$RGB		The colour as an RGB value (e.g. FF00CCCC or CCDDEE
     * @param	boolean		$hex		Flag indicating whether the component should be returned as a hex or a
     *									decimal value
     * @return	string		The red colour component
     */
    public static function getRed($RGB, $hex = \TRUE)
    {
    }
    /**
     * Get the green colour component of an RGB value
     *
     * @param	string		$RGB		The colour as an RGB value (e.g. FF00CCCC or CCDDEE
     * @param	boolean		$hex		Flag indicating whether the component should be returned as a hex or a
     *									decimal value
     * @return	string		The green colour component
     */
    public static function getGreen($RGB, $hex = \TRUE)
    {
    }
    /**
     * Get the blue colour component of an RGB value
     *
     * @param	string		$RGB		The colour as an RGB value (e.g. FF00CCCC or CCDDEE
     * @param	boolean		$hex		Flag indicating whether the component should be returned as a hex or a
     *									decimal value
     * @return	string		The blue colour component
     */
    public static function getBlue($RGB, $hex = \TRUE)
    {
    }
    /**
     * Adjust the brightness of a color
     *
     * @param	string		$hex	The colour as an RGBA or RGB value (e.g. FF00CCCC or CCDDEE)
     * @param	float		$adjustPercentage	The percentage by which to adjust the colour as a float from -1 to 1
     * @return	string		The adjusted colour as an RGBA or RGB value (e.g. FF00CCCC or CCDDEE)
     */
    public static function changeBrightness($hex, $adjustPercentage)
    {
    }
    /**
     * Get indexed color
     *
     * @param	int			$pIndex			Index entry point into the colour array
     * @param	boolean		$background		Flag to indicate whether default background or foreground colour
     *											should be returned if the indexed colour doesn't exist
     * @return	PHPExcel_Style_Color
     */
    public static function indexedColor($pIndex, $background = \FALSE)
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