<?php

namespace Luracast\Restler\Format;

/**
 * Comma Separated Value Format
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
class CsvFormat extends \Luracast\Restler\Format\Format implements \Luracast\Restler\Format\iDecodeStream
{
    const MIME = 'text/csv';
    const EXTENSION = 'csv';
    public static $delimiter = ',';
    public static $enclosure = '"';
    public static $escape = '\\';
    public static $haveHeaders = null;
    /**
     * Encode the given data in the csv format
     *
     * @param array   $data
     *            resulting data that needs to
     *            be encoded in the given format
     * @param boolean $humanReadable
     *            set to TRUE when restler
     *            is not running in production mode. Formatter has to
     *            make the encoded output more human readable
     *
     * @return string encoded string
     *
     * @throws RestException 500 on unsupported data
     */
    public function encode($data, $humanReadable = false)
    {
    }
    protected static function putRow($data)
    {
    }
    /**
     * Decode the given data from the csv format
     *
     * @param string $data
     *            data sent from client to
     *            the api in the given format.
     *
     * @return array associative array of the parsed data
     */
    public function decode($data)
    {
    }
    protected static function getRow($data, $keys = false)
    {
    }
    /**
     * Decode the given data stream
     *
     * @param string $stream A stream resource with data
     *                       sent from client to the api
     *                       in the given format.
     *
     * @return array associative array of the parsed data
     */
    public function decodeStream($stream)
    {
    }
}