<?php

namespace PhpOffice\PhpSpreadsheet\Reader\Xls\Color;

class BIFF5
{
    protected static $map = [0x8 => '000000', 0x9 => 'FFFFFF', 0xa => 'FF0000', 0xb => '00FF00', 0xc => '0000FF', 0xd => 'FFFF00', 0xe => 'FF00FF', 0xf => '00FFFF', 0x10 => '800000', 0x11 => '008000', 0x12 => '000080', 0x13 => '808000', 0x14 => '800080', 0x15 => '008080', 0x16 => 'C0C0C0', 0x17 => '808080', 0x18 => '8080FF', 0x19 => '802060', 0x1a => 'FFFFC0', 0x1b => 'A0E0F0', 0x1c => '600080', 0x1d => 'FF8080', 0x1e => '0080C0', 0x1f => 'C0C0FF', 0x20 => '000080', 0x21 => 'FF00FF', 0x22 => 'FFFF00', 0x23 => '00FFFF', 0x24 => '800080', 0x25 => '800000', 0x26 => '008080', 0x27 => '0000FF', 0x28 => '00CFFF', 0x29 => '69FFFF', 0x2a => 'E0FFE0', 0x2b => 'FFFF80', 0x2c => 'A6CAF0', 0x2d => 'DD9CB3', 0x2e => 'B38FEE', 0x2f => 'E3E3E3', 0x30 => '2A6FF9', 0x31 => '3FB8CD', 0x32 => '488436', 0x33 => '958C41', 0x34 => '8E5E42', 0x35 => 'A0627A', 0x36 => '624FAC', 0x37 => '969696', 0x38 => '1D2FBE', 0x39 => '286676', 0x3a => '004500', 0x3b => '453E01', 0x3c => '6A2813', 0x3d => '85396A', 0x3e => '4A3285', 0x3f => '424242'];
    /**
     * Map color array from BIFF5 built-in color index.
     *
     * @param int $color
     *
     * @return array
     */
    public static function lookup($color)
    {
    }
}