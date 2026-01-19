<?php

namespace PhpOffice\PhpSpreadsheet\RichText;

class TextElement implements \PhpOffice\PhpSpreadsheet\RichText\ITextElement
{
    /**
     * Text.
     *
     * @var string
     */
    private $text;
    /**
     * Create a new TextElement instance.
     *
     * @param string $pText Text
     */
    public function __construct($pText = '')
    {
    }
    /**
     * Get text.
     *
     * @return string Text
     */
    public function getText()
    {
    }
    /**
     * Set text.
     *
     * @param $text string Text
     *
     * @return ITextElement
     */
    public function setText($text)
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
}