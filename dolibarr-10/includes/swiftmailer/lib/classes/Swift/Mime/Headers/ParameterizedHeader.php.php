<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * An abstract base MIME Header.
 *
 * @author Chris Corbyn
 */
class Swift_Mime_Headers_ParameterizedHeader extends \Swift_Mime_Headers_UnstructuredHeader
{
    /**
     * RFC 2231's definition of a token.
     *
     * @var string
     */
    const TOKEN_REGEX = '(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2E\\x30-\\x39\\x41-\\x5A\\x5E-\\x7E]+)';
    /**
     * The Encoder used to encode the parameters.
     *
     * @var Swift_Encoder
     */
    private $paramEncoder;
    /**
     * The parameters as an associative array.
     *
     * @var string[]
     */
    private $params = array();
    /**
     * Creates a new ParameterizedHeader with $name.
     *
     * @param string                   $name
     * @param Swift_Mime_HeaderEncoder $encoder
     * @param Swift_Encoder            $paramEncoder, optional
     */
    public function __construct($name, \Swift_Mime_HeaderEncoder $encoder, \Swift_Encoder $paramEncoder = \null)
    {
    }
    /**
     * Get the type of Header that this instance represents.
     *
     * @see TYPE_TEXT, TYPE_PARAMETERIZED, TYPE_MAILBOX
     * @see TYPE_DATE, TYPE_ID, TYPE_PATH
     *
     * @return int
     */
    public function getFieldType()
    {
    }
    /**
     * Set the character set used in this Header.
     *
     * @param string $charset
     */
    public function setCharset($charset)
    {
    }
    /**
     * Set the value of $parameter.
     *
     * @param string $parameter
     * @param string $value
     */
    public function setParameter($parameter, $value)
    {
    }
    /**
     * Get the value of $parameter.
     *
     * @param string $parameter
     *
     * @return string
     */
    public function getParameter($parameter)
    {
    }
    /**
     * Set an associative array of parameter names mapped to values.
     *
     * @param string[] $parameters
     */
    public function setParameters(array $parameters)
    {
    }
    /**
     * Returns an associative array of parameter names mapped to values.
     *
     * @return string[]
     */
    public function getParameters()
    {
    }
    /**
     * Get the value of this header prepared for rendering.
     *
     * @return string
     */
    public function getFieldBody()
    {
    }
    /**
     * Generate a list of all tokens in the final header.
     *
     * This doesn't need to be overridden in theory, but it is for implementation
     * reasons to prevent potential breakage of attributes.
     *
     * @param string $string The string to tokenize
     *
     * @return array An array of tokens as strings
     */
    protected function toTokens($string = \null)
    {
    }
    /**
     * Render a RFC 2047 compliant header parameter from the $name and $value.
     *
     * @param string $name
     * @param string $value
     *
     * @return string
     */
    private function createParameter($name, $value)
    {
    }
    /**
     * Returns the parameter value from the "=" and beyond.
     *
     * @param string $value     to append
     * @param bool   $encoded
     * @param bool   $firstLine
     *
     * @return string
     */
    private function getEndOfParameterValue($value, $encoded = \false, $firstLine = \false)
    {
    }
}