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
 * @package    PHPExcel_Worksheet
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    ##VERSION##, ##DATE##
 */
/**
 * PHPExcel_Worksheet_MemoryDrawing
 *
 * @category   PHPExcel
 * @package    PHPExcel_Worksheet
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Worksheet_MemoryDrawing extends \PHPExcel_Worksheet_BaseDrawing implements \PHPExcel_IComparable
{
    /* Rendering functions */
    const RENDERING_DEFAULT = 'imagepng';
    const RENDERING_PNG = 'imagepng';
    const RENDERING_GIF = 'imagegif';
    const RENDERING_JPEG = 'imagejpeg';
    /* MIME types */
    const MIMETYPE_DEFAULT = 'image/png';
    const MIMETYPE_PNG = 'image/png';
    const MIMETYPE_GIF = 'image/gif';
    const MIMETYPE_JPEG = 'image/jpeg';
    /**
     * Image resource
     *
     * @var resource
     */
    private $_imageResource;
    /**
     * Rendering function
     *
     * @var string
     */
    private $_renderingFunction;
    /**
     * Mime type
     *
     * @var string
     */
    private $_mimeType;
    /**
     * Unique name
     *
     * @var string
     */
    private $_uniqueName;
    /**
     * Create a new PHPExcel_Worksheet_MemoryDrawing
     */
    public function __construct()
    {
    }
    /**
     * Get image resource
     *
     * @return resource
     */
    public function getImageResource()
    {
    }
    /**
     * Set image resource
     *
     * @param	$value resource
     * @return PHPExcel_Worksheet_MemoryDrawing
     */
    public function setImageResource($value = \null)
    {
    }
    /**
     * Get rendering function
     *
     * @return string
     */
    public function getRenderingFunction()
    {
    }
    /**
     * Set rendering function
     *
     * @param string $value
     * @return PHPExcel_Worksheet_MemoryDrawing
     */
    public function setRenderingFunction($value = \PHPExcel_Worksheet_MemoryDrawing::RENDERING_DEFAULT)
    {
    }
    /**
     * Get mime type
     *
     * @return string
     */
    public function getMimeType()
    {
    }
    /**
     * Set mime type
     *
     * @param string $value
     * @return PHPExcel_Worksheet_MemoryDrawing
     */
    public function setMimeType($value = \PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT)
    {
    }
    /**
     * Get indexed filename (using image index)
     *
     * @return string
     */
    public function getIndexedFilename()
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