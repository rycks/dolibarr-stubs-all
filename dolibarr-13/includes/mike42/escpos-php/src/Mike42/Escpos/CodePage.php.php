<?php

namespace Mike42\Escpos;

/**
 * Class to handle data about a particular CodePage, as loaded from the receipt print
 * database.
 *
 * Also computes map between UTF-8 and this encoding if necessary, using the iconv library.
 */
class CodePage
{
    /**
     * The input encoding for generating character maps with iconv.
     */
    const INPUT_ENCODING = "UTF-8";
    /**
     * @var string $data
     *  Data string, null if not known (can be computed with iconv)
     */
    protected $data;
    /**
     * @var string $iconv
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
     * @var string $notes
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
     * Get a 128-character data string representing this encoding.
     * It will be
     * calculated and cached if it was not previously known.
     *
     * @throws InvalidArgumentException Where the data is now known or computable.
     * @return string Data for this encoding.
     */
    public function getData()
    {
    }
    /**
     *
     * @return string Iconv encoding name, or blank if not set.
     */
    public function getIconv()
    {
    }
    /**
     *
     * @return string Unique identifier of the code page.
     */
    public function getId()
    {
    }
    /**
     * Name of the code page.
     */
    public function getName()
    {
    }
    /**
     * The notes may explain quirks about a code-page, such as a source if it's non-standard or un-encodeable.
     *
     * @return string Notes on the code page, or null if not set.
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
     * Given an iconv encoding name, generate a 128-character UTF-8 string, containing code points 128-255.
     *
     * This string is used to map UTF-8 characters to their location in this code page.
     *
     * @param string $iconvName
     *            Name of the encoding
     * @return string 128-character string in UTF-8.
     */
    protected static function generateEncodingMap($iconvName)
    {
    }
}