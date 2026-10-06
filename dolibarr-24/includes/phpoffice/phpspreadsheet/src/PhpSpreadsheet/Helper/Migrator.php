<?php

namespace PhpOffice\PhpSpreadsheet\Helper;

class Migrator
{
    /**
     * @var string[]
     */
    private $from;
    /**
     * @var string[]
     */
    private $to;
    public function __construct()
    {
    }
    /**
     * Return the ordered mapping from old PHPExcel class names to new PhpSpreadsheet one.
     *
     * @return string[]
     */
    public function getMapping()
    {
    }
    /**
     * Search in all files in given directory.
     *
     * @param string $path
     */
    private function recursiveReplace($path)
    {
    }
    public function migrate()
    {
    }
    /**
     * Migrate the given code from PHPExcel to PhpSpreadsheet.
     *
     * @param string $original
     *
     * @return string
     */
    public function replace($original)
    {
    }
}