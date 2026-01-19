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
 * @package    PHPExcel_RichText
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 * @version    ##VERSION##, ##DATE##
 */
/**
 * PHPExcel_RichText
 *
 * @category   PHPExcel
 * @package    PHPExcel_RichText
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_RichText implements \PHPExcel_IComparable
{
    /**
     * Rich text elements
     *
     * @var PHPExcel_RichText_ITextElement[]
     */
    private $_richTextElements;
    /**
     * Create a new PHPExcel_RichText instance
     *
     * @param PHPExcel_Cell $pCell
     * @throws PHPExcel_Exception
     */
    public function __construct(\PHPExcel_Cell $pCell = \null)
    {
    }
    /**
     * Add text
     *
     * @param PHPExcel_RichText_ITextElement $pText Rich text element
     * @throws PHPExcel_Exception
     * @return PHPExcel_RichText
     */
    public function addText(\PHPExcel_RichText_ITextElement $pText = \null)
    {
    }
    /**
     * Create text
     *
     * @param string $pText Text
     * @return PHPExcel_RichText_TextElement
     * @throws PHPExcel_Exception
     */
    public function createText($pText = '')
    {
    }
    /**
     * Create text run
     *
     * @param string $pText Text
     * @return PHPExcel_RichText_Run
     * @throws PHPExcel_Exception
     */
    public function createTextRun($pText = '')
    {
    }
    /**
     * Get plain text
     *
     * @return string
     */
    public function getPlainText()
    {
    }
    /**
     * Convert to string
     *
     * @return string
     */
    public function __toString()
    {
    }
    /**
     * Get Rich Text elements
     *
     * @return PHPExcel_RichText_ITextElement[]
     */
    public function getRichTextElements()
    {
    }
    /**
     * Set Rich Text elements
     *
     * @param PHPExcel_RichText_ITextElement[] $pElements Array of elements
     * @throws PHPExcel_Exception
     * @return PHPExcel_RichText
     */
    public function setRichTextElements($pElements = \null)
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