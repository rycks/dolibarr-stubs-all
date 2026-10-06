<?php

namespace PhpOffice\PhpSpreadsheet\Reader\Xls\Style;

class FillPattern
{
    protected static $map = [0x0 => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_NONE, 0x1 => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID, 0x2 => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_PATTERN_MEDIUMGRAY, 0x3 => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_PATTERN_DARKGRAY, 0x4 => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_PATTERN_LIGHTGRAY, 0x5 => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_PATTERN_DARKHORIZONTAL, 0x6 => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_PATTERN_DARKVERTICAL, 0x7 => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_PATTERN_DARKDOWN, 0x8 => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_PATTERN_DARKUP, 0x9 => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_PATTERN_DARKGRID, 0xa => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_PATTERN_DARKTRELLIS, 0xb => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_PATTERN_LIGHTHORIZONTAL, 0xc => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_PATTERN_LIGHTVERTICAL, 0xd => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_PATTERN_LIGHTDOWN, 0xe => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_PATTERN_LIGHTUP, 0xf => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_PATTERN_LIGHTGRID, 0x10 => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_PATTERN_LIGHTTRELLIS, 0x11 => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_PATTERN_GRAY125, 0x12 => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_PATTERN_GRAY0625];
    /**
     * Get fill pattern from index
     * OpenOffice documentation: 2.5.12.
     *
     * @param int $index
     *
     * @return string
     */
    public static function lookup($index)
    {
    }
}