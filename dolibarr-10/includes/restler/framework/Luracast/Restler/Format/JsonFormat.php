<?php

namespace Luracast\Restler\Format;

/**
 * Javascript Object Notation Format
 *
 * @category   Framework
 * @package    Restler
 * @subpackage format
 * @author     R.Arul Kumaran <arul@luracast.com>
 * @copyright  2010 Luracast
 * @license    http://www.opensource.org/licenses/lgpl-license.php LGPL
 * @link       http://luracast.com/products/restler/
 * @version    3.0.0rc6
 */
class JsonFormat extends \Luracast\Restler\Format\Format
{
    /**
     * @var boolean|null  shim for json_encode option JSON_PRETTY_PRINT set
     * it to null to use smart defaults
     */
    public static $prettyPrint = null;
    /**
     * @var boolean|null  shim for json_encode option JSON_UNESCAPED_SLASHES
     * set it to null to use smart defaults
     */
    public static $unEscapedSlashes = null;
    /**
     * @var boolean|null  shim for json_encode JSON_UNESCAPED_UNICODE set it
     * to null to use smart defaults
     */
    public static $unEscapedUnicode = null;
    /**
     * @var boolean|null  shim for json_decode JSON_BIGINT_AS_STRING set it to
     * null to
     * use smart defaults
     */
    public static $bigIntAsString = null;
    /**
     * @var boolean|null  shim for json_decode JSON_NUMERIC_CHECK set it to
     * null to
     * use smart defaults
     */
    public static $numbersAsNumbers = null;
    const MIME = 'application/json';
    const EXTENSION = 'json';
    public function encode($data, $humanReadable = false)
    {
    }
    public function decode($data)
    {
    }
    /**
     * Pretty print JSON string
     *
     * @param  string $json
     *
     * @return string formatted json
     */
    private function formatJson($json)
    {
    }
    /**
     * Throws an exception if an error occurred during the last JSON encoding/decoding
     *
     * @return void
     * @throws \RuntimeException
     */
    protected function handleJsonError()
    {
    }
}