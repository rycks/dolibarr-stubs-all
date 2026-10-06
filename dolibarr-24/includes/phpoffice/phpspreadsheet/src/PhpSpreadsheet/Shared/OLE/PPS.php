<?php

namespace PhpOffice\PhpSpreadsheet\Shared\OLE;

/**
 * Class for creating PPS's for OLE containers.
 *
 * @author   Xavier Noguer <xnoguer@php.net>
 *
 * @category PhpSpreadsheet
 */
class PPS
{
    /**
     * The PPS index.
     *
     * @var int
     */
    public $No;
    /**
     * The PPS name (in Unicode).
     *
     * @var string
     */
    public $Name;
    /**
     * The PPS type. Dir, Root or File.
     *
     * @var int
     */
    public $Type;
    /**
     * The index of the previous PPS.
     *
     * @var int
     */
    public $PrevPps;
    /**
     * The index of the next PPS.
     *
     * @var int
     */
    public $NextPps;
    /**
     * The index of it's first child if this is a Dir or Root PPS.
     *
     * @var int
     */
    public $DirPps;
    /**
     * A timestamp.
     *
     * @var int
     */
    public $Time1st;
    /**
     * A timestamp.
     *
     * @var int
     */
    public $Time2nd;
    /**
     * Starting block (small or big) for this PPS's data  inside the container.
     *
     * @var int
     */
    public $startBlock;
    /**
     * The size of the PPS's data (in bytes).
     *
     * @var int
     */
    public $Size;
    /**
     * The PPS's data (only used if it's not using a temporary file).
     *
     * @var string
     */
    public $_data;
    /**
     * Array of child PPS's (only used by Root and Dir PPS's).
     *
     * @var array
     */
    public $children = [];
    /**
     * Pointer to OLE container.
     *
     * @var OLE
     */
    public $ole;
    /**
     * The constructor.
     *
     * @param int $No The PPS index
     * @param string $name The PPS name
     * @param int $type The PPS type. Dir, Root or File
     * @param int $prev The index of the previous PPS
     * @param int $next The index of the next PPS
     * @param int $dir The index of it's first child if this is a Dir or Root PPS
     * @param int $time_1st A timestamp
     * @param int $time_2nd A timestamp
     * @param string $data The (usually binary) source data of the PPS
     * @param array $children Array containing children PPS for this PPS
     */
    public function __construct($No, $name, $type, $prev, $next, $dir, $time_1st, $time_2nd, $data, $children)
    {
    }
    /**
     * Returns the amount of data saved for this PPS.
     *
     * @return int The amount of data (in bytes)
     */
    public function getDataLen()
    {
    }
    /**
     * Returns a string with the PPS's WK (What is a WK?).
     *
     * @return string The binary string
     */
    public function _getPpsWk()
    {
    }
    /**
     * Updates index and pointers to previous, next and children PPS's for this
     * PPS. I don't think it'll work with Dir PPS's.
     *
     * @param array &$raList Reference to the array of PPS's for the whole OLE
     *                          container
     * @param mixed $to_save
     * @param mixed $depth
     *
     * @return int The index for this PPS
     */
    public static function _savePpsSetPnt(&$raList, $to_save, $depth = 0)
    {
    }
}