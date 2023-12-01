<?php

namespace DebugBar\DataCollector;

/**
 * Abstract class for data collectors
 */
abstract class DataCollector implements \DebugBar\DataCollector\DataCollectorInterface
{
    private static $defaultDataFormatter;
    private static $defaultVarDumper;
    protected $dataFormater;
    protected $varDumper;
    protected $xdebugLinkTemplate = '';
    protected $xdebugShouldUseAjax = false;
    protected $xdebugReplacements = array();
    /**
     * Sets the default data formater instance used by all collectors subclassing this class
     *
     * @param DataFormatterInterface $formater
     */
    public static function setDefaultDataFormatter(\DebugBar\DataFormatter\DataFormatterInterface $formater)
    {
    }
    /**
     * Returns the default data formater
     *
     * @return DataFormatterInterface
     */
    public static function getDefaultDataFormatter()
    {
    }
    /**
     * Sets the data formater instance used by this collector
     *
     * @param DataFormatterInterface $formater
     * @return $this
     */
    public function setDataFormatter(\DebugBar\DataFormatter\DataFormatterInterface $formater)
    {
    }
    /**
     * @return DataFormatterInterface
     */
    public function getDataFormatter()
    {
    }
    /**
     * Get an Xdebug Link to a file
     *
     * @param string $file
     * @param int    $line
     *
     * @return array {
     * @var string   $url
     * @var bool     $ajax should be used to open the url instead of a normal links
     * }
     */
    public function getXdebugLink($file, $line = 1)
    {
    }
    /**  
     * Sets the default variable dumper used by all collectors subclassing this class
     *
     * @param DebugBarVarDumper $varDumper
     */
    public static function setDefaultVarDumper(\DebugBar\DataFormatter\DebugBarVarDumper $varDumper)
    {
    }
    /**
     * Returns the default variable dumper
     *
     * @return DebugBarVarDumper
     */
    public static function getDefaultVarDumper()
    {
    }
    /**
     * Sets the variable dumper instance used by this collector
     *
     * @param DebugBarVarDumper $varDumper
     * @return $this
     */
    public function setVarDumper(\DebugBar\DataFormatter\DebugBarVarDumper $varDumper)
    {
    }
    /**
     * Gets the variable dumper instance used by this collector; note that collectors using this
     * instance need to be sure to return the static assets provided by the variable dumper.
     *
     * @return DebugBarVarDumper
     */
    public function getVarDumper()
    {
    }
    /**
     * @deprecated
     */
    public function formatVar($var)
    {
    }
    /**
     * @deprecated
     */
    public function formatDuration($seconds)
    {
    }
    /**
     * @deprecated
     */
    public function formatBytes($size, $precision = 2)
    {
    }
    /**
     * @return string
     */
    public function getXdebugLinkTemplate()
    {
    }
    /**
     * @param string $xdebugLinkTemplate
     * @param bool $shouldUseAjax
     */
    public function setXdebugLinkTemplate($xdebugLinkTemplate, $shouldUseAjax = false)
    {
    }
    /**
     * @return bool
     */
    public function getXdebugShouldUseAjax()
    {
    }
    /**
     * returns an array of filename-replacements
     *
     * this is useful f.e. when using vagrant or remote servers,
     * where the path of the file is different between server and
     * development environment
     *
     * @return array key-value-pairs of replacements, key = path on server, value = replacement
     */
    public function getXdebugReplacements()
    {
    }
    /**
     * @param array $xdebugReplacements
     */
    public function setXdebugReplacements($xdebugReplacements)
    {
    }
    public function setXdebugReplacement($serverPath, $replacement)
    {
    }
}