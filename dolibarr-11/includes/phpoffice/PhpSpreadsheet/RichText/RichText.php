<?php

namespace PhpOffice\PhpSpreadsheet\RichText;

class RichText implements \PhpOffice\PhpSpreadsheet\IComparable
{
    /**
     * Rich text elements.
     *
     * @var ITextElement[]
     */
    private $richTextElements;
    /**
     * Create a new RichText instance.
     *
     * @param Cell $pCell
     *
     * @throws Exception
     */
    public function __construct(\PhpOffice\PhpSpreadsheet\Cell\Cell $pCell = null)
    {
    }
    /**
     * Add text.
     *
     * @param ITextElement $pText Rich text element
     *
     * @return RichText
     */
    public function addText(\PhpOffice\PhpSpreadsheet\RichText\ITextElement $pText)
    {
    }
    /**
     * Create text.
     *
     * @param string $pText Text
     *
     * @throws Exception
     *
     * @return TextElement
     */
    public function createText($pText)
    {
    }
    /**
     * Create text run.
     *
     * @param string $pText Text
     *
     * @throws Exception
     *
     * @return Run
     */
    public function createTextRun($pText)
    {
    }
    /**
     * Get plain text.
     *
     * @return string
     */
    public function getPlainText()
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
    /**
     * Get Rich Text elements.
     *
     * @return ITextElement[]
     */
    public function getRichTextElements()
    {
    }
    /**
     * Set Rich Text elements.
     *
     * @param ITextElement[] $textElements Array of elements
     *
     * @return RichText
     */
    public function setRichTextElements(array $textElements)
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