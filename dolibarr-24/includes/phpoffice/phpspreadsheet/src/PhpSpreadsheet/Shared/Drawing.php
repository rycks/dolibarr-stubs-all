<?php

namespace PhpOffice\PhpSpreadsheet\Shared;

class Drawing
{
    /**
     * Convert pixels to EMU.
     *
     * @param int $pValue Value in pixels
     *
     * @return int Value in EMU
     */
    public static function pixelsToEMU($pValue)
    {
    }
    /**
     * Convert EMU to pixels.
     *
     * @param int $pValue Value in EMU
     *
     * @return int Value in pixels
     */
    public static function EMUToPixels($pValue)
    {
    }
    /**
     * Convert pixels to column width. Exact algorithm not known.
     * By inspection of a real Excel file using Calibri 11, one finds 1000px ~ 142.85546875
     * This gives a conversion factor of 7. Also, we assume that pixels and font size are proportional.
     *
     * @param int $pValue Value in pixels
     * @param \PhpOffice\PhpSpreadsheet\Style\Font $pDefaultFont Default font of the workbook
     *
     * @return int Value in cell dimension
     */
    public static function pixelsToCellDimension($pValue, \PhpOffice\PhpSpreadsheet\Style\Font $pDefaultFont)
    {
    }
    /**
     * Convert column width from (intrinsic) Excel units to pixels.
     *
     * @param float $pValue Value in cell dimension
     * @param \PhpOffice\PhpSpreadsheet\Style\Font $pDefaultFont Default font of the workbook
     *
     * @return int Value in pixels
     */
    public static function cellDimensionToPixels($pValue, \PhpOffice\PhpSpreadsheet\Style\Font $pDefaultFont)
    {
    }
    /**
     * Convert pixels to points.
     *
     * @param int $pValue Value in pixels
     *
     * @return float Value in points
     */
    public static function pixelsToPoints($pValue)
    {
    }
    /**
     * Convert points to pixels.
     *
     * @param int $pValue Value in points
     *
     * @return int Value in pixels
     */
    public static function pointsToPixels($pValue)
    {
    }
    /**
     * Convert degrees to angle.
     *
     * @param int $pValue Degrees
     *
     * @return int Angle
     */
    public static function degreesToAngle($pValue)
    {
    }
    /**
     * Convert angle to degrees.
     *
     * @param int $pValue Angle
     *
     * @return int Degrees
     */
    public static function angleToDegrees($pValue)
    {
    }
    /**
     * Create a new image from file. By alexander at alexauto dot nl.
     *
     * @see http://www.php.net/manual/en/function.imagecreatefromwbmp.php#86214
     *
     * @param string $p_sFile Path to Windows DIB (BMP) image
     *
     * @return resource
     */
    public static function imagecreatefrombmp($p_sFile)
    {
    }
}