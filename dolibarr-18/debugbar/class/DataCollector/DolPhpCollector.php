<?php

/**
 * Class PhpCollector
 *
 * This class collects all PHP errors, notice, advices, trigger_error,...
 * Supports 15 different types included.
 */
class PhpCollector extends \DebugBar\DataCollector\DataCollector implements \DebugBar\DataCollector\Renderable
{
    /**
     * Collector name.
     *
     * @var string
     */
    protected $name;
    /**
     * List of messages. Each item includes:
     *  'message', 'message_html', 'is_string', 'label', 'time'.
     *
     * @var array
     */
    protected $messages = [];
    /**
     * PHPCollector constructor.
     *
     * @param string $name The name used by this collector widget.
     */
    public function __construct($name = 'Error handler')
    {
    }
    /**
     * Called by the DebugBar when data needs to be collected.
     *
     * @return array Collected data.
     */
    public function collect()
    {
    }
    /**
     * Returns a list of messages ordered by their timestamp.
     *
     * @return array A list of messages ordered by time.
     */
    public function getMessages()
    {
    }
    /**
     * Returns a hash where keys are control names and their values an array of options as defined in
     * {@see DebugBar\JavascriptRenderer::addControl()}
     *
     * @return array Needed details to render the widget.
     */
    public function getWidgets()
    {
    }
    /**
     * Returns the unique name of the collector.
     *
     * @return string The widget name.
     */
    public function getName()
    {
    }
    /**
     * Exception error handler. Called from constructor with set_error_handler to add all details.
     *
     * @param int    $severity Error type.
     * @param string $message  Message of error.
     * @param string $fileName File where error is generated.
     * @param int    $line     Line number where error is generated.
     *
     * @return void
     */
    public function errorHandler($severity, $message, $fileName, $line)
    {
    }
    /**
     * Return error name from error code.
     *
     * @info http://php.net/manual/es/errorfunc.constants.php
     *
     * @param int $type Error code.
     *
     * @return string Error name.
     */
    private function friendlyErrorType($type)
    {
    }
}