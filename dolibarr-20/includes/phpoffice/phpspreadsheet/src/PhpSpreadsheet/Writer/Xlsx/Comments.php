<?php

namespace PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Comments extends \PhpOffice\PhpSpreadsheet\Writer\Xlsx\WriterPart
{
    /**
     * Write comments to XML format.
     *
     * @param \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pWorksheet
     *
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     *
     * @return string XML Output
     */
    public function writeComments(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pWorksheet)
    {
    }
    /**
     * Write comment to XML format.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param string $pCellReference Cell reference
     * @param Comment $pComment Comment
     * @param array $pAuthors Array of authors
     *
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     */
    private function writeComment(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, $pCellReference, \PhpOffice\PhpSpreadsheet\Comment $pComment, array $pAuthors)
    {
    }
    /**
     * Write VML comments to XML format.
     *
     * @param \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pWorksheet
     *
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     *
     * @return string XML Output
     */
    public function writeVMLComments(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pWorksheet)
    {
    }
    /**
     * Write VML comment to XML format.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param string $pCellReference Cell reference, eg: 'A1'
     * @param Comment $pComment Comment
     */
    private function writeVMLComment(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, $pCellReference, \PhpOffice\PhpSpreadsheet\Comment $pComment)
    {
    }
}