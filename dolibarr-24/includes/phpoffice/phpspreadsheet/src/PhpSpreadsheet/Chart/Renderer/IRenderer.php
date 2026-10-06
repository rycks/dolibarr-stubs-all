<?php

namespace PhpOffice\PhpSpreadsheet\Chart\Renderer;

interface IRenderer
{
    /**
     * IRenderer constructor.
     *
     * @param \PhpOffice\PhpSpreadsheet\Chart\Chart $chart
     */
    public function __construct(\PhpOffice\PhpSpreadsheet\Chart\Chart $chart);
    /**
     * Render the chart to given file (or stream).
     *
     * @param string $filename Name of the file render to
     *
     * @return bool true on success
     */
    public function render($filename);
}