<?php

namespace Mike42\Escpos;

/**
 * Implementation of EscposImage using the GD PHP plugin.
 */
class GdEscposImage extends \Mike42\Escpos\EscposImage
{
    /**
     * Load an image from disk, into memory, using GD.
     *
     * @param string|null $filename The filename to load from
     * @throws Exception if the image format is not supported,
     *  or the file cannot be opened.
     */
    protected function loadImageData(string $filename = null)
    {
    }
    /**
     * Load actual image pixels from GD resource.
     *
     * @param resource $im GD resource to use
     * @throws Exception Where the image can't be read.
     */
    public function readImageFromGdResource($im)
    {
    }
}