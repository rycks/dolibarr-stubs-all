<?php

namespace PhpOffice\PhpSpreadsheet\Cell;

class AdvancedValueBinder extends \PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder implements \PhpOffice\PhpSpreadsheet\Cell\IValueBinder
{
    /**
     * Bind value to a cell.
     *
     * @param Cell $cell Cell to bind value to
     * @param mixed $value Value to bind in cell
     *
     * @return bool
     */
    public function bindValue(\PhpOffice\PhpSpreadsheet\Cell\Cell $cell, $value = null)
    {
    }
}