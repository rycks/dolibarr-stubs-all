<?php

namespace DebugBar\DataFormatter\VarDumper;

/**
 * We have to extend the base HtmlDumper class in order to get access to the protected-only
 * getDumpHeader function.
 */
class DebugBarHtmlDumper extends \Symfony\Component\VarDumper\Dumper\HtmlDumper
{
    /**
     * Resets an HTML header.
     */
    public function resetDumpHeader()
    {
    }
    public function getDumpHeaderByDebugBar()
    {
    }
}