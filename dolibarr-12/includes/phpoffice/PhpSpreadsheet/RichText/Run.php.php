<?php

namespace PhpOffice\PhpSpreadsheet\RichText;

class Run extends \PhpOffice\PhpSpreadsheet\RichText\TextElement implements \PhpOffice\PhpSpreadsheet\RichText\ITextElement
{
    /**
     * Font.
     *
     * @var Font
     */
    private $font;
    /**
     * Create a new Run instance.
     *
     * @param string $pText Text
     */
    public function __construct($pText = '')
    {
    }
    /**
     * Get font.
     *
     * @return null|\PhpOffice\PhpSpreadsheet\Style\Font
     */
    public function getFont()
    {
    }
    /**
     * Set font.
     *
     * @param Font $pFont Font
     *
     * @return ITextElement
     */
    public function setFont(\PhpOffice\PhpSpreadsheet\Style\Font $pFont = null)
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