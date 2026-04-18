<?php

namespace PhpOffice\PhpSpreadsheet\Collection;

abstract class CellsFactory
{
    /**
     * Initialise the cache storage.
     *
     * @param Worksheet $parent Enable cell caching for this worksheet
     *
     * @return Cells
     * */
    public static function getInstance(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $parent)
    {
    }
}