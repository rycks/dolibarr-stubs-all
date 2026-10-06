<?php

namespace Sabre\VObject;

/**
 * FreeBusyData is a helper class that manages freebusy information.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class FreeBusyData
{
    /**
     * Start timestamp.
     *
     * @var int
     */
    protected $start;
    /**
     * End timestamp.
     *
     * @var int
     */
    protected $end;
    /**
     * A list of free-busy times.
     *
     * @var array
     */
    protected $data;
    public function __construct($start, $end)
    {
    }
    /**
     * Adds free or busytime to the data.
     *
     * @param int    $start
     * @param int    $end
     * @param string $type  FREE, BUSY, BUSY-UNAVAILABLE or BUSY-TENTATIVE
     */
    public function add($start, $end, $type)
    {
    }
    public function getData()
    {
    }
}