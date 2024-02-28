<?php

namespace PhpOffice\PhpSpreadsheet;

class Comment implements \PhpOffice\PhpSpreadsheet\IComparable
{
    /**
     * Author.
     *
     * @var string
     */
    private $author;
    /**
     * Rich text comment.
     *
     * @var RichText
     */
    private $text;
    /**
     * Comment width (CSS style, i.e. XXpx or YYpt).
     *
     * @var string
     */
    private $width = '96pt';
    /**
     * Left margin (CSS style, i.e. XXpx or YYpt).
     *
     * @var string
     */
    private $marginLeft = '59.25pt';
    /**
     * Top margin (CSS style, i.e. XXpx or YYpt).
     *
     * @var string
     */
    private $marginTop = '1.5pt';
    /**
     * Visible.
     *
     * @var bool
     */
    private $visible = false;
    /**
     * Comment height (CSS style, i.e. XXpx or YYpt).
     *
     * @var string
     */
    private $height = '55.5pt';
    /**
     * Comment fill color.
     *
     * @var Style\Color
     */
    private $fillColor;
    /**
     * Alignment.
     *
     * @var string
     */
    private $alignment;
    /**
     * Create a new Comment.
     */
    public function __construct()
    {
    }
    /**
     * Get Author.
     *
     * @return string
     */
    public function getAuthor()
    {
    }
    /**
     * Set Author.
     *
     * @param string $author
     *
     * @return Comment
     */
    public function setAuthor($author)
    {
    }
    /**
     * Get Rich text comment.
     *
     * @return RichText
     */
    public function getText()
    {
    }
    /**
     * Set Rich text comment.
     *
     * @param RichText $pValue
     *
     * @return Comment
     */
    public function setText(\PhpOffice\PhpSpreadsheet\RichText\RichText $pValue)
    {
    }
    /**
     * Get comment width (CSS style, i.e. XXpx or YYpt).
     *
     * @return string
     */
    public function getWidth()
    {
    }
    /**
     * Set comment width (CSS style, i.e. XXpx or YYpt).
     *
     * @param string $width
     *
     * @return Comment
     */
    public function setWidth($width)
    {
    }
    /**
     * Get comment height (CSS style, i.e. XXpx or YYpt).
     *
     * @return string
     */
    public function getHeight()
    {
    }
    /**
     * Set comment height (CSS style, i.e. XXpx or YYpt).
     *
     * @param string $value
     *
     * @return Comment
     */
    public function setHeight($value)
    {
    }
    /**
     * Get left margin (CSS style, i.e. XXpx or YYpt).
     *
     * @return string
     */
    public function getMarginLeft()
    {
    }
    /**
     * Set left margin (CSS style, i.e. XXpx or YYpt).
     *
     * @param string $value
     *
     * @return Comment
     */
    public function setMarginLeft($value)
    {
    }
    /**
     * Get top margin (CSS style, i.e. XXpx or YYpt).
     *
     * @return string
     */
    public function getMarginTop()
    {
    }
    /**
     * Set top margin (CSS style, i.e. XXpx or YYpt).
     *
     * @param string $value
     *
     * @return Comment
     */
    public function setMarginTop($value)
    {
    }
    /**
     * Is the comment visible by default?
     *
     * @return bool
     */
    public function getVisible()
    {
    }
    /**
     * Set comment default visibility.
     *
     * @param bool $value
     *
     * @return Comment
     */
    public function setVisible($value)
    {
    }
    /**
     * Get fill color.
     *
     * @return Style\Color
     */
    public function getFillColor()
    {
    }
    /**
     * Set Alignment.
     *
     * @param string $alignment see Style\Alignment::HORIZONTAL_*
     *
     * @return Comment
     */
    public function setAlignment($alignment)
    {
    }
    /**
     * Get Alignment.
     *
     * @return string
     */
    public function getAlignment()
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
     * Convert to string.
     *
     * @return string
     */
    public function __toString()
    {
    }
}