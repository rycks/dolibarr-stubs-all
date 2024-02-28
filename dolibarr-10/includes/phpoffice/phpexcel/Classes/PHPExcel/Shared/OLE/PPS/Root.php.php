<?php

/* vim: set expandtab tabstop=4 shiftwidth=4: */
// +----------------------------------------------------------------------+
// | PHP Version 4                                                        |
// +----------------------------------------------------------------------+
// | Copyright (c) 1997-2002 The PHP Group                                |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.02 of the PHP license,      |
// | that is bundled with this package in the file LICENSE, and is        |
// | available at through the world-wide-web at                           |
// | http://www.php.net/license/2_02.txt.                                 |
// | If you did not receive a copy of the PHP license and are unable to   |
// | obtain it through the world-wide-web, please send a note to          |
// | license@php.net so we can mail you a copy immediately.               |
// +----------------------------------------------------------------------+
// | Author: Xavier Noguer <xnoguer@php.net>                              |
// | Based on OLE::Storage_Lite by Kawai, Takanori                        |
// +----------------------------------------------------------------------+
//
// $Id: Root.php,v 1.9 2005/04/23 21:53:49 dufuz Exp $
/**
* Class for creating Root PPS's for OLE containers
*
* @author   Xavier Noguer <xnoguer@php.net>
* @category PHPExcel
* @package  PHPExcel_Shared_OLE
*/
class PHPExcel_Shared_OLE_PPS_Root extends \PHPExcel_Shared_OLE_PPS
{
    /**
     * Directory for temporary files
     * @var string
     */
    protected $_tmp_dir = \NULL;
    /**
     * @param integer $time_1st A timestamp
     * @param integer $time_2nd A timestamp
     */
    public function __construct($time_1st, $time_2nd, $raChild)
    {
    }
    /**
     * Method for saving the whole OLE container (including files).
     * In fact, if called with an empty argument (or '-'), it saves to a
     * temporary file and then outputs it's contents to stdout.
     * If a resource pointer to a stream created by fopen() is passed
     * it will be used, but you have to close such stream by yourself.
     *
     * @param string|resource $filename The name of the file or stream where to save the OLE container.
     * @access public
     * @return mixed true on success
     */
    public function save($filename)
    {
    }
    /**
     * Calculate some numbers
     *
     * @access public
     * @param array $raList Reference to an array of PPS's
     * @return array The array of numbers
     */
    public function _calcSize(&$raList)
    {
    }
    /**
     * Helper function for caculating a magic value for block sizes
     *
     * @access public
     * @param integer $i2 The argument
     * @see save()
     * @return integer
     */
    private static function _adjust2($i2)
    {
    }
    /**
     * Save OLE header
     *
     * @access public
     * @param integer $iSBDcnt
     * @param integer $iBBcnt
     * @param integer $iPPScnt
     */
    public function _saveHeader($iSBDcnt, $iBBcnt, $iPPScnt)
    {
    }
    /**
     * Saving big data (PPS's with data bigger than PHPExcel_Shared_OLE::OLE_DATA_SIZE_SMALL)
     *
     * @access public
     * @param integer $iStBlk
     * @param array &$raList Reference to array of PPS's
     */
    public function _saveBigData($iStBlk, &$raList)
    {
    }
    /**
     * get small data (PPS's with data smaller than PHPExcel_Shared_OLE::OLE_DATA_SIZE_SMALL)
     *
     * @access public
     * @param array &$raList Reference to array of PPS's
     */
    public function _makeSmallData(&$raList)
    {
    }
    /**
     * Saves all the PPS's WKs
     *
     * @access public
     * @param array $raList Reference to an array with all PPS's
     */
    public function _savePps(&$raList)
    {
    }
    /**
     * Saving Big Block Depot
     *
     * @access public
     * @param integer $iSbdSize
     * @param integer $iBsize
     * @param integer $iPpsCnt
     */
    public function _saveBbd($iSbdSize, $iBsize, $iPpsCnt)
    {
    }
}