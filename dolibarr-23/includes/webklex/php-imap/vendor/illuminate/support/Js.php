<?php

namespace Illuminate\Support;

class Js implements \Illuminate\Contracts\Support\Htmlable
{
    /**
     * The JavaScript string.
     *
     * @var string
     */
    protected $js;
    /**
     * Flags that should be used when encoding to JSON.
     *
     * @var int
     */
    protected const REQUIRED_FLAGS = JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT | JSON_THROW_ON_ERROR;
    /**
     * Create a new class instance.
     *
     * @param  mixed  $data
     * @param  int|null  $flags
     * @param  int  $depth
     * @return void
     *
     * @throws \JsonException
     */
    public function __construct($data, $flags = 0, $depth = 512)
    {
    }
    /**
     * Create a new JavaScript string from the given data.
     *
     * @param  mixed  $data
     * @param  int  $flags
     * @param  int  $depth
     * @return static
     *
     * @throws \JsonException
     */
    public static function from($data, $flags = 0, $depth = 512)
    {
    }
    /**
     * Convert the given data to a JavaScript expression.
     *
     * @param  mixed  $data
     * @param  int  $flags
     * @param  int  $depth
     * @return string
     *
     * @throws \JsonException
     */
    protected function convertDataToJavaScriptExpression($data, $flags = 0, $depth = 512)
    {
    }
    /**
     * Encode the given data as JSON.
     *
     * @param  mixed  $data
     * @param  int  $flags
     * @param  int  $depth
     * @return string
     *
     * @throws \JsonException
     */
    protected function jsonEncode($data, $flags = 0, $depth = 512)
    {
    }
    /**
     * Convert the given JSON to a JavaScript expression.
     *
     * @param  string  $json
     * @param  int  $flags
     * @return string
     *
     * @throws \JsonException
     */
    protected function convertJsonToJavaScriptExpression($json, $flags = 0)
    {
    }
    /**
     * Get the string representation of the data for use in HTML.
     *
     * @return string
     */
    public function toHtml()
    {
    }
    /**
     * Get the string representation of the data for use in HTML.
     *
     * @return string
     */
    public function __toString()
    {
    }
}