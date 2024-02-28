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
 * @package    PHPExcel_Reader_Excel5
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    ##VERSION##, ##DATE##
 */
/**
 * PHPExcel_Reader_Excel5_Escher
 *
 * @category   PHPExcel
 * @package    PHPExcel_Reader_Excel5
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Reader_Excel5_Escher
{
    const DGGCONTAINER = 0xf000;
    const BSTORECONTAINER = 0xf001;
    const DGCONTAINER = 0xf002;
    const SPGRCONTAINER = 0xf003;
    const SPCONTAINER = 0xf004;
    const DGG = 0xf006;
    const BSE = 0xf007;
    const DG = 0xf008;
    const SPGR = 0xf009;
    const SP = 0xf00a;
    const OPT = 0xf00b;
    const CLIENTTEXTBOX = 0xf00d;
    const CLIENTANCHOR = 0xf010;
    const CLIENTDATA = 0xf011;
    const BLIPJPEG = 0xf01d;
    const BLIPPNG = 0xf01e;
    const SPLITMENUCOLORS = 0xf11e;
    const TERTIARYOPT = 0xf122;
    /**
     * Escher stream data (binary)
     *
     * @var string
     */
    private $_data;
    /**
     * Size in bytes of the Escher stream data
     *
     * @var int
     */
    private $_dataSize;
    /**
     * Current position of stream pointer in Escher stream data
     *
     * @var int
     */
    private $_pos;
    /**
     * The object to be returned by the reader. Modified during load.
     *
     * @var mixed
     */
    private $_object;
    /**
     * Create a new PHPExcel_Reader_Excel5_Escher instance
     *
     * @param mixed $object
     */
    public function __construct($object)
    {
    }
    /**
     * Load Escher stream data. May be a partial Escher stream.
     *
     * @param string $data
     */
    public function load($data)
    {
    }
    /**
     * Read a generic record
     */
    private function _readDefault()
    {
    }
    /**
     * Read DggContainer record (Drawing Group Container)
     */
    private function _readDggContainer()
    {
    }
    /**
     * Read Dgg record (Drawing Group)
     */
    private function _readDgg()
    {
    }
    /**
     * Read BstoreContainer record (Blip Store Container)
     */
    private function _readBstoreContainer()
    {
    }
    /**
     * Read BSE record
     */
    private function _readBSE()
    {
    }
    /**
     * Read BlipJPEG record. Holds raw JPEG image data
     */
    private function _readBlipJPEG()
    {
    }
    /**
     * Read BlipPNG record. Holds raw PNG image data
     */
    private function _readBlipPNG()
    {
    }
    /**
     * Read OPT record. This record may occur within DggContainer record or SpContainer
     */
    private function _readOPT()
    {
    }
    /**
     * Read TertiaryOPT record
     */
    private function _readTertiaryOPT()
    {
    }
    /**
     * Read SplitMenuColors record
     */
    private function _readSplitMenuColors()
    {
    }
    /**
     * Read DgContainer record (Drawing Container)
     */
    private function _readDgContainer()
    {
    }
    /**
     * Read Dg record (Drawing)
     */
    private function _readDg()
    {
    }
    /**
     * Read SpgrContainer record (Shape Group Container)
     */
    private function _readSpgrContainer()
    {
    }
    /**
     * Read SpContainer record (Shape Container)
     */
    private function _readSpContainer()
    {
    }
    /**
     * Read Spgr record (Shape Group)
     */
    private function _readSpgr()
    {
    }
    /**
     * Read Sp record (Shape)
     */
    private function _readSp()
    {
    }
    /**
     * Read ClientTextbox record
     */
    private function _readClientTextbox()
    {
    }
    /**
     * Read ClientAnchor record. This record holds information about where the shape is anchored in worksheet
     */
    private function _readClientAnchor()
    {
    }
    /**
     * Read ClientData record
     */
    private function _readClientData()
    {
    }
    /**
     * Read OfficeArtRGFOPTE table of property-value pairs
     *
     * @param string $data Binary data
     * @param int $n Number of properties
     */
    private function _readOfficeArtRGFOPTE($data, $n)
    {
    }
}