<?php

namespace Carbon\Exceptions;

class ParseErrorException extends \InvalidArgumentException implements \Carbon\Exceptions\InvalidArgumentException
{
    /**
     * The expected.
     *
     * @var string
     */
    protected $expected;
    /**
     * The actual.
     *
     * @var string
     */
    protected $actual;
    /**
     * The help message.
     *
     * @var string
     */
    protected $help;
    /**
     * Constructor.
     *
     * @param string         $expected
     * @param string         $actual
     * @param int            $code
     * @param Throwable|null $previous
     */
    public function __construct($expected, $actual, $help = '', $code = 0, \Throwable $previous = null)
    {
    }
    /**
     * Get the expected.
     *
     * @return string
     */
    public function getExpected() : string
    {
    }
    /**
     * Get the actual.
     *
     * @return string
     */
    public function getActual() : string
    {
    }
    /**
     * Get the help message.
     *
     * @return string
     */
    public function getHelp() : string
    {
    }
}