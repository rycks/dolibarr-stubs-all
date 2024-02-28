<?php

namespace PhpOffice\PhpSpreadsheet\Cell;

class DefaultValueBinder implements \PhpOffice\PhpSpreadsheet\Cell\IValueBinder
{
    /**
     * Bind value to a cell.
     *
     * @param Cell $cell Cell to bind value to
     * @param mixed $value Value to bind in cell
     *
     * @return bool
     */
    public function bindValue(\PhpOffice\PhpSpreadsheet\Cell\Cell $cell, $value)
    {
    }
    /**
     * DataType for value.
     *
     * @param mixed $pValue
     *
     * @return string
     */
    public static function dataTypeForValue($pValue)
    {
    }
}