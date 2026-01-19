<?php

namespace PhpOffice\PhpSpreadsheet\Cell;

class StringValueBinder implements \PhpOffice\PhpSpreadsheet\Cell\IValueBinder
{
    /**
     * Bind value to a cell.
     *
     * @param Cell $cell Cell to bind value to
     * @param mixed $value Value to bind in cell
     *
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     *
     * @return bool
     */
    public function bindValue(\PhpOffice\PhpSpreadsheet\Cell\Cell $cell, $value)
    {
    }
}