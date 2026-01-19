<?php

namespace PhpOffice\PhpSpreadsheet\Reader\Xls\Style;

class Border
{
    protected static $map = [0x0 => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_NONE, 0x1 => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, 0x2 => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM, 0x3 => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DASHED, 0x4 => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DOTTED, 0x5 => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK, 0x6 => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DOUBLE, 0x7 => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_HAIR, 0x8 => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUMDASHED, 0x9 => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DASHDOT, 0xa => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUMDASHDOT, 0xb => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DASHDOTDOT, 0xc => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUMDASHDOTDOT, 0xd => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_SLANTDASHDOT];
    /**
     * Map border style
     * OpenOffice documentation: 2.5.11.
     *
     * @param int $index
     *
     * @return string
     */
    public static function lookup($index)
    {
    }
}