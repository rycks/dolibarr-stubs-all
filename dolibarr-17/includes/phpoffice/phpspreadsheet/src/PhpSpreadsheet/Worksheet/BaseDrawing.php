<?php

namespace PhpOffice\PhpSpreadsheet\Worksheet;

class BaseDrawing implements \PhpOffice\PhpSpreadsheet\IComparable
{
    /**
     * Image counter.
     *
     * @var int
     */
    private static $imageCounter = 0;
    /**
     * Image index.
     *
     * @var int
     */
    private $imageIndex = 0;
    /**
     * Name.
     *
     * @var string
     */
    protected $name;
    /**
     * Description.
     *
     * @var string
     */
    protected $description;
    /**
     * Worksheet.
     *
     * @var Worksheet
     */
    protected $worksheet;
    /**
     * Coordinates.
     *
     * @var string
     */
    protected $coordinates;
    /**
     * Offset X.
     *
     * @var int
     */
    protected $offsetX;
    /**
     * Offset Y.
     *
     * @var int
     */
    protected $offsetY;
    /**
     * Width.
     *
     * @var int
     */
    protected $width;
    /**
     * Height.
     *
     * @var int
     */
    protected $height;
    /**
     * Proportional resize.
     *
     * @var bool
     */
    protected $resizeProportional;
    /**
     * Rotation.
     *
     * @var int
     */
    protected $rotation;
    /**
     * Shadow.
     *
     * @var Drawing\Shadow
     */
    protected $shadow;
    /**
     * Image hyperlink.
     *
     * @var null|Hyperlink
     */
    private $hyperlink;
    /**
     * Create a new BaseDrawing.
     */
    public function __construct()
    {
    }
    /**
     * Get image index.
     *
     * @return int
     */
    public function getImageIndex()
    {
    }
    /**
     * Get Name.
     *
     * @return string
     */
    public function getName()
    {
    }
    /**
     * Set Name.
     *
     * @param string $pValue
     *
     * @return BaseDrawing
     */
    public function setName($pValue)
    {
    }
    /**
     * Get Description.
     *
     * @return string
     */
    public function getDescription()
    {
    }
    /**
     * Set Description.
     *
     * @param string $description
     *
     * @return BaseDrawing
     */
    public function setDescription($description)
    {
    }
    /**
     * Get Worksheet.
     *
     * @return Worksheet
     */
    public function getWorksheet()
    {
    }
    /**
     * Set Worksheet.
     *
     * @param Worksheet $pValue
     * @param bool $pOverrideOld If a Worksheet has already been assigned, overwrite it and remove image from old Worksheet?
     *
     * @throws PhpSpreadsheetException
     *
     * @return BaseDrawing
     */
    public function setWorksheet(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pValue = null, $pOverrideOld = false)
    {
    }
    /**
     * Get Coordinates.
     *
     * @return string
     */
    public function getCoordinates()
    {
    }
    /**
     * Set Coordinates.
     *
     * @param string $pValue eg: 'A1'
     *
     * @return BaseDrawing
     */
    public function setCoordinates($pValue)
    {
    }
    /**
     * Get OffsetX.
     *
     * @return int
     */
    public function getOffsetX()
    {
    }
    /**
     * Set OffsetX.
     *
     * @param int $pValue
     *
     * @return BaseDrawing
     */
    public function setOffsetX($pValue)
    {
    }
    /**
     * Get OffsetY.
     *
     * @return int
     */
    public function getOffsetY()
    {
    }
    /**
     * Set OffsetY.
     *
     * @param int $pValue
     *
     * @return BaseDrawing
     */
    public function setOffsetY($pValue)
    {
    }
    /**
     * Get Width.
     *
     * @return int
     */
    public function getWidth()
    {
    }
    /**
     * Set Width.
     *
     * @param int $pValue
     *
     * @return BaseDrawing
     */
    public function setWidth($pValue)
    {
    }
    /**
     * Get Height.
     *
     * @return int
     */
    public function getHeight()
    {
    }
    /**
     * Set Height.
     *
     * @param int $pValue
     *
     * @return BaseDrawing
     */
    public function setHeight($pValue)
    {
    }
    /**
     * Set width and height with proportional resize.
     *
     * Example:
     * <code>
     * $objDrawing->setResizeProportional(true);
     * $objDrawing->setWidthAndHeight(160,120);
     * </code>
     *
     * @author Vincent@luo MSN:kele_100@hotmail.com
     *
     * @param int $width
     * @param int $height
     *
     * @return BaseDrawing
     */
    public function setWidthAndHeight($width, $height)
    {
    }
    /**
     * Get ResizeProportional.
     *
     * @return bool
     */
    public function getResizeProportional()
    {
    }
    /**
     * Set ResizeProportional.
     *
     * @param bool $pValue
     *
     * @return BaseDrawing
     */
    public function setResizeProportional($pValue)
    {
    }
    /**
     * Get Rotation.
     *
     * @return int
     */
    public function getRotation()
    {
    }
    /**
     * Set Rotation.
     *
     * @param int $pValue
     *
     * @return BaseDrawing
     */
    public function setRotation($pValue)
    {
    }
    /**
     * Get Shadow.
     *
     * @return Drawing\Shadow
     */
    public function getShadow()
    {
    }
    /**
     * Set Shadow.
     *
     * @param Drawing\Shadow $pValue
     *
     * @return BaseDrawing
     */
    public function setShadow(\PhpOffice\PhpSpreadsheet\Worksheet\Drawing\Shadow $pValue = null)
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
    /**
     * Implement PHP __clone to create a deep clone, not just a shallow copy.
     */
    public function __clone()
    {
    }
    /**
     * @param null|Hyperlink $pHyperlink
     */
    public function setHyperlink(\PhpOffice\PhpSpreadsheet\Cell\Hyperlink $pHyperlink = null)
    {
    }
    /**
     * @return null|Hyperlink
     */
    public function getHyperlink()
    {
    }
}