<?php

namespace PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class StringTable extends \PhpOffice\PhpSpreadsheet\Writer\Xlsx\WriterPart
{
    /**
     * Create worksheet stringtable.
     *
     * @param Worksheet $pSheet Worksheet
     * @param string[] $pExistingTable Existing table to eventually merge with
     *
     * @return string[] String table for worksheet
     */
    public function createStringTable(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pSheet, $pExistingTable = null)
    {
    }
    /**
     * Write string table to XML format.
     *
     * @param string[] $pStringTable
     *
     * @throws WriterException
     *
     * @return string XML Output
     */
    public function writeStringTable(array $pStringTable)
    {
    }
    /**
     * Write Rich Text.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param RichText $pRichText Rich text
     * @param string $prefix Optional Namespace prefix
     */
    public function writeRichText(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\RichText\RichText $pRichText, $prefix = null)
    {
    }
    /**
     * Write Rich Text.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param RichText|string $pRichText text string or Rich text
     * @param string $prefix Optional Namespace prefix
     */
    public function writeRichTextForCharts(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, $pRichText = null, $prefix = null)
    {
    }
    /**
     * Flip string table (for index searching).
     *
     * @param array $stringTable Stringtable
     *
     * @return array
     */
    public function flipStringTable(array $stringTable)
    {
    }
}