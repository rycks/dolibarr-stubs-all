<?php

namespace PhpOffice\PhpSpreadsheet\Worksheet;

class MemoryDrawing extends \PhpOffice\PhpSpreadsheet\Worksheet\BaseDrawing
{
    // Rendering functions
    const RENDERING_DEFAULT = 'imagepng';
    const RENDERING_PNG = 'imagepng';
    const RENDERING_GIF = 'imagegif';
    const RENDERING_JPEG = 'imagejpeg';
    // MIME types
    const MIMETYPE_DEFAULT = 'image/png';
    const MIMETYPE_PNG = 'image/png';
    const MIMETYPE_GIF = 'image/gif';
    const MIMETYPE_JPEG = 'image/jpeg';
    /**
     * Image resource.
     *
     * @var resource
     */
    private $imageResource;
    /**
     * Rendering function.
     *
     * @var string
     */
    private $renderingFunction;
    /**
     * Mime type.
     *
     * @var string
     */
    private $mimeType;
    /**
     * Unique name.
     *
     * @var string
     */
    private $uniqueName;
    /**
     * Create a new MemoryDrawing.
     */
    public function __construct()
    {
    }
    /**
     * Get image resource.
     *
     * @return resource
     */
    public function getImageResource()
    {
    }
    /**
     * Set image resource.
     *
     * @param resource $value
     *
     * @return MemoryDrawing
     */
    public function setImageResource($value)
    {
    }
    /**
     * Get rendering function.
     *
     * @return string
     */
    public function getRenderingFunction()
    {
    }
    /**
     * Set rendering function.
     *
     * @param string $value see self::RENDERING_*
     *
     * @return MemoryDrawing
     */
    public function setRenderingFunction($value)
    {
    }
    /**
     * Get mime type.
     *
     * @return string
     */
    public function getMimeType()
    {
    }
    /**
     * Set mime type.
     *
     * @param string $value see self::MIMETYPE_*
     *
     * @return MemoryDrawing
     */
    public function setMimeType($value)
    {
    }
    /**
     * Get indexed filename (using image index).
     *
     * @return string
     */
    public function getIndexedFilename()
    {
    }
    /**
     * Get hash code.
     *
     * @return string Hash code
     */
    public function getHashCode()
    {
    }
}