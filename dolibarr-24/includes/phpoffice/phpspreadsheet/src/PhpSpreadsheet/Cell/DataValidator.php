<?php

namespace PhpOffice\PhpSpreadsheet\Cell;

/**
 * Validate a cell value according to its validation rules.
 */
class DataValidator
{
    /**
     * Does this cell contain valid value?
     *
     * @param Cell $cell Cell to check the value
     *
     * @return bool
     */
    public function isValid(\PhpOffice\PhpSpreadsheet\Cell\Cell $cell)
    {
    }
    /**
     * Does this cell contain valid value, based on list?
     *
     * @param Cell $cell Cell to check the value
     *
     * @return bool
     */
    private function isValueInList(\PhpOffice\PhpSpreadsheet\Cell\Cell $cell)
    {
    }
}