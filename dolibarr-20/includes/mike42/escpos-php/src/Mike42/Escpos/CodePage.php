<?php

namespace Mike42\Escpos;

/**
 * Class to handle data about a particular CodePage, as loaded from the receipt print
 * database.
 *
 * Also computes map between UTF-8 and this encoding if necessary, using the intl library.
 */
class CodePage
{
    /**
     * Value to use when no character is set. This is a space in ASCII.
     */
    const MISSING_CHAR_CODE = 0x20;
    /**
     * @var array|null $data
     *  Data string, null if not known (can be computed with iconv)
     */
    protected $data;
    /**
     * @var string|null $iconv
     *  Iconv encoding name, null if not known
     */
    protected $iconv;
    /**
     * @var string $id
     *  Internal ID of the CodePage
     */
    protected $id;
    /**
     * @var string $name
     *  Name of the code page. Substituted with the ID if not set.
     */
    protected $name;
    /**
     * @var string|null $notes
     *  Notes on this code page, or null if not set.
     */
    protected $notes;
    /**
     *
     * @param string $id
     *            Unique internal identifier for the CodePage.
     * @param array $codePageData
     *            Associative array of CodePage data, as
     *            specified by the upstream receipt-print-hq/escpos-printer-db database.
     *            May contain 'name', 'data', 'iconv', and 'notes' fields.
     */
    public function __construct($id, array $codePageData)
    {
    }
    /**
     * Get a 128-entry array of unicode code-points from this code page.
     *
     * @throws InvalidArgumentException Where the data is now known or computable.
     * @return array Data for this encoding.
     */
    public function getDataArray() : array
    {
    }
    /**
     *
     * @return string|null Iconv encoding name, or null if not set.
     */
    public function getIconv()
    {
    }
    /**
     *
     * @return string Unique identifier of the code page.
     */
    public function getId() : string
    {
    }
    /**
     * @return string Name of the code page.
     */
    public function getName() : string
    {
    }
    /**
     * The notes may explain quirks about a code-page, such as a source if it's non-standard or un-encodeable.
     *
     * @return string|null Notes on the code page, or null if not set.
     */
    public function getNotes()
    {
    }
    /**
     *
     * @return boolean True if we can encode with this code page (ie, we know what data it holds).
     *
     * Many printers contain vendor-specific code pages, which are named but have not been identified or
     * typed out. For our purposes, this is an "un-encodeable" code page.
     */
    public function isEncodable()
    {
    }
    /**
     * Given an ICU encoding name, generate a 128-entry array, with the unicode code points
     * for the character at positions 128-255 in this code page.
     *
     * @param string $encodingName Name of the encoding
     * @return array 128-entry array of code points
     */
    protected static function generateEncodingArray(string $encodingName) : array
    {
    }
    private static function encodingArrayFromData(array $data) : array
    {
    }
}