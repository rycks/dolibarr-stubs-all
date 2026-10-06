<?php

namespace PhpOffice\PhpSpreadsheet\Shared\OLE\PPS;

/**
 * Class for creating File PPS's for OLE containers.
 *
 * @author   Xavier Noguer <xnoguer@php.net>
 *
 * @category PhpSpreadsheet
 */
class File extends \PhpOffice\PhpSpreadsheet\Shared\OLE\PPS
{
    /**
     * The constructor.
     *
     * @param string $name The name of the file (in Unicode)
     *
     * @see OLE::ascToUcs()
     */
    public function __construct($name)
    {
    }
    /**
     * Initialization method. Has to be called right after OLE_PPS_File().
     *
     * @return mixed true on success
     */
    public function init()
    {
    }
    /**
     * Append data to PPS.
     *
     * @param string $data The data to append
     */
    public function append($data)
    {
    }
}