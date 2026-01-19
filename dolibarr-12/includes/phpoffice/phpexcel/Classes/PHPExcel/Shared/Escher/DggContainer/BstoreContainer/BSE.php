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
 * @package    PHPExcel_Shared_Escher
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    ##VERSION##, ##DATE##
 */
/**
 * PHPExcel_Shared_Escher_DggContainer_BstoreContainer_BSE
 *
 * @category   PHPExcel
 * @package    PHPExcel_Shared_Escher
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Shared_Escher_DggContainer_BstoreContainer_BSE
{
    const BLIPTYPE_ERROR = 0x0;
    const BLIPTYPE_UNKNOWN = 0x1;
    const BLIPTYPE_EMF = 0x2;
    const BLIPTYPE_WMF = 0x3;
    const BLIPTYPE_PICT = 0x4;
    const BLIPTYPE_JPEG = 0x5;
    const BLIPTYPE_PNG = 0x6;
    const BLIPTYPE_DIB = 0x7;
    const BLIPTYPE_TIFF = 0x11;
    const BLIPTYPE_CMYKJPEG = 0x12;
    /**
     * The parent BLIP Store Entry Container
     *
     * @var PHPExcel_Shared_Escher_DggContainer_BstoreContainer
     */
    private $_parent;
    /**
     * The BLIP (Big Large Image or Picture)
     *
     * @var PHPExcel_Shared_Escher_DggContainer_BstoreContainer_BSE_Blip
     */
    private $_blip;
    /**
     * The BLIP type
     *
     * @var int
     */
    private $_blipType;
    /**
     * Set parent BLIP Store Entry Container
     *
     * @param PHPExcel_Shared_Escher_DggContainer_BstoreContainer $parent
     */
    public function setParent($parent)
    {
    }
    /**
     * Get the BLIP
     *
     * @return PHPExcel_Shared_Escher_DggContainer_BstoreContainer_BSE_Blip
     */
    public function getBlip()
    {
    }
    /**
     * Set the BLIP
     *
     * @param PHPExcel_Shared_Escher_DggContainer_BstoreContainer_BSE_Blip $blip
     */
    public function setBlip($blip)
    {
    }
    /**
     * Get the BLIP type
     *
     * @return int
     */
    public function getBlipType()
    {
    }
    /**
     * Set the BLIP type
     *
     * @param int
     */
    public function setBlipType($blipType)
    {
    }
}