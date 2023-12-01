<?php

namespace PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Styles extends \PhpOffice\PhpSpreadsheet\Reader\Xlsx\BaseParserClass
{
    /**
     * Theme instance.
     *
     * @var Theme
     */
    private static $theme = null;
    private $styles = [];
    private $cellStyles = [];
    private $styleXml;
    public function __construct(\SimpleXMLElement $styleXml)
    {
    }
    public function setStyleBaseData(\PhpOffice\PhpSpreadsheet\Reader\Xlsx\Theme $theme = null, $styles = [], $cellStyles = [])
    {
    }
    private static function readFontStyle(\PhpOffice\PhpSpreadsheet\Style\Font $fontStyle, \SimpleXMLElement $fontStyleXml)
    {
    }
    private static function readFillStyle(\PhpOffice\PhpSpreadsheet\Style\Fill $fillStyle, \SimpleXMLElement $fillStyleXml)
    {
    }
    private static function readBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Borders $borderStyle, \SimpleXMLElement $borderStyleXml)
    {
    }
    private static function readBorder(\PhpOffice\PhpSpreadsheet\Style\Border $border, \SimpleXMLElement $borderXml)
    {
    }
    private static function readAlignmentStyle(\PhpOffice\PhpSpreadsheet\Style\Alignment $alignment, \SimpleXMLElement $alignmentXml)
    {
    }
    private function readStyle(\PhpOffice\PhpSpreadsheet\Style\Style $docStyle, $style)
    {
    }
    private function readProtectionLocked(\PhpOffice\PhpSpreadsheet\Style\Style $docStyle, $style)
    {
    }
    private function readProtectionHidden(\PhpOffice\PhpSpreadsheet\Style\Style $docStyle, $style)
    {
    }
    private static function readColor($color, $background = false)
    {
    }
    public function dxfs($readDataOnly = false)
    {
    }
    public function styles()
    {
    }
    private static function getArrayItem($array, $key = 0)
    {
    }
}