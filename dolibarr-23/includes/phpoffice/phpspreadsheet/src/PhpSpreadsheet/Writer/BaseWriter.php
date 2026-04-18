<?php

namespace PhpOffice\PhpSpreadsheet\Writer;

abstract class BaseWriter implements \PhpOffice\PhpSpreadsheet\Writer\IWriter
{
    /**
     * Write charts that are defined in the workbook?
     * Identifies whether the Writer should write definitions for any charts that exist in the PhpSpreadsheet object;.
     *
     * @var bool
     */
    protected $includeCharts = false;
    /**
     * Pre-calculate formulas
     * Forces PhpSpreadsheet to recalculate all formulae in a workbook when saving, so that the pre-calculated values are
     * immediately available to MS Excel or other office spreadsheet viewer when opening the file.
     *
     * @var bool
     */
    protected $preCalculateFormulas = true;
    /**
     * Use disk caching where possible?
     *
     * @var bool
     */
    private $useDiskCaching = false;
    /**
     * Disk caching directory.
     *
     * @var string
     */
    private $diskCachingDirectory = './';
    public function getIncludeCharts()
    {
    }
    public function setIncludeCharts($pValue)
    {
    }
    public function getPreCalculateFormulas()
    {
    }
    public function setPreCalculateFormulas($pValue)
    {
    }
    public function getUseDiskCaching()
    {
    }
    public function setUseDiskCaching($pValue, $pDirectory = null)
    {
    }
    public function getDiskCachingDirectory()
    {
    }
}