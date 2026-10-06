<?php

namespace PhpOffice\PhpSpreadsheet\Shared;

class CodePage
{
    /**
     * Convert Microsoft Code Page Identifier to Code Page Name which iconv
     * and mbstring understands.
     *
     * @param int $codePage Microsoft Code Page Indentifier
     *
     * @throws PhpSpreadsheetException
     *
     * @return string Code Page Name
     */
    public static function numberToName($codePage)
    {
    }
}