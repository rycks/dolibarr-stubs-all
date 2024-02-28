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
 * PHPExcel_Style_Borders
 *
 * @category   PHPExcel
 * @package    PHPExcel_Style
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Style_Borders extends \PHPExcel_Style_Supervisor implements \PHPExcel_IComparable
{
    /* Diagonal directions */
    const DIAGONAL_NONE = 0;
    const DIAGONAL_UP = 1;
    const DIAGONAL_DOWN = 2;
    const DIAGONAL_BOTH = 3;
    /**
     * Left
     *
     * @var PHPExcel_Style_Border
     */
    protected $_left;
    /**
     * Right
     *
     * @var PHPExcel_Style_Border
     */
    protected $_right;
    /**
     * Top
     *
     * @var PHPExcel_Style_Border
     */
    protected $_top;
    /**
     * Bottom
     *
     * @var PHPExcel_Style_Border
     */
    protected $_bottom;
    /**
     * Diagonal
     *
     * @var PHPExcel_Style_Border
     */
    protected $_diagonal;
    /**
     * DiagonalDirection
     *
     * @var int
     */
    protected $_diagonalDirection;
    /**
     * All borders psedo-border. Only applies to supervisor.
     *
     * @var PHPExcel_Style_Border
     */
    protected $_allBorders;
    /**
     * Outline psedo-border. Only applies to supervisor.
     *
     * @var PHPExcel_Style_Border
     */
    protected $_outline;
    /**
     * Inside psedo-border. Only applies to supervisor.
     *
     * @var PHPExcel_Style_Border
     */
    protected $_inside;
    /**
     * Vertical pseudo-border. Only applies to supervisor.
     *
     * @var PHPExcel_Style_Border
     */
    protected $_vertical;
    /**
     * Horizontal pseudo-border. Only applies to supervisor.
     *
     * @var PHPExcel_Style_Border
     */
    protected $_horizontal;
    /**
     * Create a new PHPExcel_Style_Borders
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
     * @return PHPExcel_Style_Borders
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
     * $objPHPExcel->getActiveSheet()->getStyle('B2')->getBorders()->applyFromArray(
     * 		array(
     * 			'bottom'     => array(
     * 				'style' => PHPExcel_Style_Border::BORDER_DASHDOT,
     * 				'color' => array(
     * 					'rgb' => '808080'
     * 				)
     * 			),
     * 			'top'     => array(
     * 				'style' => PHPExcel_Style_Border::BORDER_DASHDOT,
     * 				'color' => array(
     * 					'rgb' => '808080'
     * 				)
     * 			)
     * 		)
     * );
     * </code>
     * <code>
     * $objPHPExcel->getActiveSheet()->getStyle('B2')->getBorders()->applyFromArray(
     * 		array(
     * 			'allborders' => array(
     * 				'style' => PHPExcel_Style_Border::BORDER_DASHDOT,
     * 				'color' => array(
     * 					'rgb' => '808080'
     * 				)
     * 			)
     * 		)
     * );
     * </code>
     *
     * @param	array	$pStyles	Array containing style information
     * @throws	PHPExcel_Exception
     * @return PHPExcel_Style_Borders
     */
    public function applyFromArray($pStyles = \null)
    {
    }
    /**
     * Get Left
     *
     * @return PHPExcel_Style_Border
     */
    public function getLeft()
    {
    }
    /**
     * Get Right
     *
     * @return PHPExcel_Style_Border
     */
    public function getRight()
    {
    }
    /**
     * Get Top
     *
     * @return PHPExcel_Style_Border
     */
    public function getTop()
    {
    }
    /**
     * Get Bottom
     *
     * @return PHPExcel_Style_Border
     */
    public function getBottom()
    {
    }
    /**
     * Get Diagonal
     *
     * @return PHPExcel_Style_Border
     */
    public function getDiagonal()
    {
    }
    /**
     * Get AllBorders (pseudo-border). Only applies to supervisor.
     *
     * @return PHPExcel_Style_Border
     * @throws PHPExcel_Exception
     */
    public function getAllBorders()
    {
    }
    /**
     * Get Outline (pseudo-border). Only applies to supervisor.
     *
     * @return boolean
     * @throws PHPExcel_Exception
     */
    public function getOutline()
    {
    }
    /**
     * Get Inside (pseudo-border). Only applies to supervisor.
     *
     * @return boolean
     * @throws PHPExcel_Exception
     */
    public function getInside()
    {
    }
    /**
     * Get Vertical (pseudo-border). Only applies to supervisor.
     *
     * @return PHPExcel_Style_Border
     * @throws PHPExcel_Exception
     */
    public function getVertical()
    {
    }
    /**
     * Get Horizontal (pseudo-border). Only applies to supervisor.
     *
     * @return PHPExcel_Style_Border
     * @throws PHPExcel_Exception
     */
    public function getHorizontal()
    {
    }
    /**
     * Get DiagonalDirection
     *
     * @return int
     */
    public function getDiagonalDirection()
    {
    }
    /**
     * Set DiagonalDirection
     *
     * @param int $pValue
     * @return PHPExcel_Style_Borders
     */
    public function setDiagonalDirection($pValue = \PHPExcel_Style_Borders::DIAGONAL_NONE)
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