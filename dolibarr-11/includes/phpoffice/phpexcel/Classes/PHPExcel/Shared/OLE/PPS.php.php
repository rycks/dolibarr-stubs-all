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
// $Id: PPS.php,v 1.7 2007/02/13 21:00:42 schmidt Exp $
/**
* Class for creating PPS's for OLE containers
*
* @author   Xavier Noguer <xnoguer@php.net>
* @category PHPExcel
* @package  PHPExcel_Shared_OLE
*/
class PHPExcel_Shared_OLE_PPS
{
    /**
     * The PPS index
     * @var integer
     */
    public $No;
    /**
     * The PPS name (in Unicode)
     * @var string
     */
    public $Name;
    /**
     * The PPS type. Dir, Root or File
     * @var integer
     */
    public $Type;
    /**
     * The index of the previous PPS
     * @var integer
     */
    public $PrevPps;
    /**
     * The index of the next PPS
     * @var integer
     */
    public $NextPps;
    /**
     * The index of it's first child if this is a Dir or Root PPS
     * @var integer
     */
    public $DirPps;
    /**
     * A timestamp
     * @var integer
     */
    public $Time1st;
    /**
     * A timestamp
     * @var integer
     */
    public $Time2nd;
    /**
     * Starting block (small or big) for this PPS's data  inside the container
     * @var integer
     */
    public $_StartBlock;
    /**
     * The size of the PPS's data (in bytes)
     * @var integer
     */
    public $Size;
    /**
     * The PPS's data (only used if it's not using a temporary file)
     * @var string
     */
    public $_data;
    /**
     * Array of child PPS's (only used by Root and Dir PPS's)
     * @var array
     */
    public $children = array();
    /**
     * Pointer to OLE container
     * @var OLE
     */
    public $ole;
    /**
     * The constructor
     *
     * @access public
     * @param integer $No   The PPS index
     * @param string  $name The PPS name
     * @param integer $type The PPS type. Dir, Root or File
     * @param integer $prev The index of the previous PPS
     * @param integer $next The index of the next PPS
     * @param integer $dir  The index of it's first child if this is a Dir or Root PPS
     * @param integer $time_1st A timestamp
     * @param integer $time_2nd A timestamp
     * @param string  $data  The (usually binary) source data of the PPS
     * @param array   $children Array containing children PPS for this PPS
     */
    public function __construct($No, $name, $type, $prev, $next, $dir, $time_1st, $time_2nd, $data, $children)
    {
    }
    /**
     * Returns the amount of data saved for this PPS
     *
     * @access public
     * @return integer The amount of data (in bytes)
     */
    public function _DataLen()
    {
    }
    /**
     * Returns a string with the PPS's WK (What is a WK?)
     *
     * @access public
     * @return string The binary string
     */
    public function _getPpsWk()
    {
    }
    /**
     * Updates index and pointers to previous, next and children PPS's for this
     * PPS. I don't think it'll work with Dir PPS's.
     *
     * @access public
     * @param array &$raList Reference to the array of PPS's for the whole OLE
     *                          container
     * @return integer          The index for this PPS
     */
    public static function _savePpsSetPnt(&$raList, $to_save, $depth = 0)
    {
    }
}