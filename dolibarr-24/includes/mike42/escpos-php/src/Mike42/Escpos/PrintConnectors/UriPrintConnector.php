<?php

namespace Mike42\Escpos\PrintConnectors;

class UriPrintConnector
{
    const URI_ASSEMBLER_PATTERN = "~^(.+):/{2}(.+?)(?::(\\d{1,4}))?\$~";
    public static function get($uri)
    {
    }
}