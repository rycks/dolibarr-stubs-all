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
 * @author     Chris Corbyn
 */
abstract class Swift_Mime_Headers_AbstractHeader implements \Swift_Mime_Header
{
    const PHRASE_PATTERN = '(?:(?:(?:(?:(?:(?:(?:[ \\t]*(?:\\r\\n))?[ \\t])?(\\((?:(?:(?:[ \\t]*(?:\\r\\n))?[ \\t])|(?:(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x19\\x7F]|[\\x21-\\x27\\x2A-\\x5B\\x5D-\\x7E])|(?:\\[\\x00-\\x08\\x0B\\x0C\\x0E-\\x7F])|(?1)))*(?:(?:[ \\t]*(?:\\r\\n))?[ \\t])?\\)))*(?:(?:(?:(?:[ \\t]*(?:\\r\\n))?[ \\t])?(\\((?:(?:(?:[ \\t]*(?:\\r\\n))?[ \\t])|(?:(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x19\\x7F]|[\\x21-\\x27\\x2A-\\x5B\\x5D-\\x7E])|(?:\\[\\x00-\\x08\\x0B\\x0C\\x0E-\\x7F])|(?1)))*(?:(?:[ \\t]*(?:\\r\\n))?[ \\t])?\\)))|(?:(?:[ \\t]*(?:\\r\\n))?[ \\t])))?[a-zA-Z0-9!#\\$%&\'\\*\\+\\-\\/=\\?\\^_`\\{\\}\\|~]+(?:(?:(?:(?:[ \\t]*(?:\\r\\n))?[ \\t])?(\\((?:(?:(?:[ \\t]*(?:\\r\\n))?[ \\t])|(?:(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x19\\x7F]|[\\x21-\\x27\\x2A-\\x5B\\x5D-\\x7E])|(?:\\[\\x00-\\x08\\x0B\\x0C\\x0E-\\x7F])|(?1)))*(?:(?:[ \\t]*(?:\\r\\n))?[ \\t])?\\)))*(?:(?:(?:(?:[ \\t]*(?:\\r\\n))?[ \\t])?(\\((?:(?:(?:[ \\t]*(?:\\r\\n))?[ \\t])|(?:(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x19\\x7F]|[\\x21-\\x27\\x2A-\\x5B\\x5D-\\x7E])|(?:\\[\\x00-\\x08\\x0B\\x0C\\x0E-\\x7F])|(?1)))*(?:(?:[ \\t]*(?:\\r\\n))?[ \\t])?\\)))|(?:(?:[ \\t]*(?:\\r\\n))?[ \\t])))?)|(?:(?:(?:(?:(?:[ \\t]*(?:\\r\\n))?[ \\t])?(\\((?:(?:(?:[ \\t]*(?:\\r\\n))?[ \\t])|(?:(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x19\\x7F]|[\\x21-\\x27\\x2A-\\x5B\\x5D-\\x7E])|(?:\\[\\x00-\\x08\\x0B\\x0C\\x0E-\\x7F])|(?1)))*(?:(?:[ \\t]*(?:\\r\\n))?[ \\t])?\\)))*(?:(?:(?:(?:[ \\t]*(?:\\r\\n))?[ \\t])?(\\((?:(?:(?:[ \\t]*(?:\\r\\n))?[ \\t])|(?:(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x19\\x7F]|[\\x21-\\x27\\x2A-\\x5B\\x5D-\\x7E])|(?:\\[\\x00-\\x08\\x0B\\x0C\\x0E-\\x7F])|(?1)))*(?:(?:[ \\t]*(?:\\r\\n))?[ \\t])?\\)))|(?:(?:[ \\t]*(?:\\r\\n))?[ \\t])))?"((?:(?:[ \\t]*(?:\\r\\n))?[ \\t])?(?:(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x19\\x7F]|[\\x21\\x23-\\x5B\\x5D-\\x7E])|(?:\\[\\x00-\\x08\\x0B\\x0C\\x0E-\\x7F])))*(?:(?:[ \\t]*(?:\\r\\n))?[ \\t])?"(?:(?:(?:(?:[ \\t]*(?:\\r\\n))?[ \\t])?(\\((?:(?:(?:[ \\t]*(?:\\r\\n))?[ \\t])|(?:(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x19\\x7F]|[\\x21-\\x27\\x2A-\\x5B\\x5D-\\x7E])|(?:\\[\\x00-\\x08\\x0B\\x0C\\x0E-\\x7F])|(?1)))*(?:(?:[ \\t]*(?:\\r\\n))?[ \\t])?\\)))*(?:(?:(?:(?:[ \\t]*(?:\\r\\n))?[ \\t])?(\\((?:(?:(?:[ \\t]*(?:\\r\\n))?[ \\t])|(?:(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x19\\x7F]|[\\x21-\\x27\\x2A-\\x5B\\x5D-\\x7E])|(?:\\[\\x00-\\x08\\x0B\\x0C\\x0E-\\x7F])|(?1)))*(?:(?:[ \\t]*(?:\\r\\n))?[ \\t])?\\)))|(?:(?:[ \\t]*(?:\\r\\n))?[ \\t])))?))+?)';
    /**
     * The name of this Header.
     *
     * @var string
     */
    private $name;
    /**
     * The Encoder used to encode this Header.
     *
     * @var Swift_Encoder
     */
    private $encoder;
    /**
     * The maximum length of a line in the header.
     *
     * @var int
     */
    private $lineLength = 78;
    /**
     * The language used in this Header.
     *
     * @var string
     */
    private $lang;
    /**
     * The character set of the text in this Header.
     *
     * @var string
     */
    private $charset = 'utf-8';
    /**
     * The value of this Header, cached.
     *
     * @var string
     */
    private $cachedValue = \null;
    /**
     * Set the character set used in this Header.
     *
     * @param string $charset
     */
    public function setCharset($charset)
    {
    }
    /**
     * Get the character set used in this Header.
     *
     * @return string
     */
    public function getCharset()
    {
    }
    /**
     * Set the language used in this Header.
     *
     * For example, for US English, 'en-us'.
     * This can be unspecified.
     *
     * @param string $lang
     */
    public function setLanguage($lang)
    {
    }
    /**
     * Get the language used in this Header.
     *
     * @return string
     */
    public function getLanguage()
    {
    }
    /**
     * Set the encoder used for encoding the header.
     *
     * @param Swift_Mime_HeaderEncoder $encoder
     */
    public function setEncoder(\Swift_Mime_HeaderEncoder $encoder)
    {
    }
    /**
     * Get the encoder used for encoding this Header.
     *
     * @return Swift_Mime_HeaderEncoder
     */
    public function getEncoder()
    {
    }
    /**
     * Get the name of this header (e.g. charset).
     *
     * @return string
     */
    public function getFieldName()
    {
    }
    /**
     * Set the maximum length of lines in the header (excluding EOL).
     *
     * @param int $lineLength
     */
    public function setMaxLineLength($lineLength)
    {
    }
    /**
     * Get the maximum permitted length of lines in this Header.
     *
     * @return int
     */
    public function getMaxLineLength()
    {
    }
    /**
     * Get this Header rendered as a RFC 2822 compliant string.
     *
     * @return string
     *
     * @throws Swift_RfcComplianceException
     */
    public function toString()
    {
    }
    /**
     * Returns a string representation of this object.
     *
     * @return string
     *
     * @see toString()
     */
    public function __toString()
    {
    }
    /**
     * Set the name of this Header field.
     *
     * @param string $name
     */
    protected function setFieldName($name)
    {
    }
    /**
     * Produces a compliant, formatted RFC 2822 'phrase' based on the string given.
     *
     * @param Swift_Mime_Header        $header
     * @param string                   $string  as displayed
     * @param string                   $charset of the text
     * @param Swift_Mime_HeaderEncoder $encoder
     * @param bool                     $shorten the first line to make remove for header name
     *
     * @return string
     */
    protected function createPhrase(\Swift_Mime_Header $header, $string, $charset, \Swift_Mime_HeaderEncoder $encoder = \null, $shorten = \false)
    {
    }
    /**
     * Escape special characters in a string (convert to quoted-pairs).
     *
     * @param string   $token
     * @param string[] $include additional chars to escape
     *
     * @return string
     */
    private function escapeSpecials($token, $include = array())
    {
    }
    /**
     * Encode needed word tokens within a string of input.
     *
     * @param Swift_Mime_Header $header
     * @param string            $input
     * @param string            $usedLength optional
     *
     * @return string
     */
    protected function encodeWords(\Swift_Mime_Header $header, $input, $usedLength = -1)
    {
    }
    /**
     * Test if a token needs to be encoded or not.
     *
     * @param string $token
     *
     * @return bool
     */
    protected function tokenNeedsEncoding($token)
    {
    }
    /**
     * Splits a string into tokens in blocks of words which can be encoded quickly.
     *
     * @param string $string
     *
     * @return string[]
     */
    protected function getEncodableWordTokens($string)
    {
    }
    /**
     * Get a token as an encoded word for safe insertion into headers.
     *
     * @param string $token           token to encode
     * @param int    $firstLineOffset optional
     *
     * @return string
     */
    protected function getTokenAsEncodedWord($token, $firstLineOffset = 0)
    {
    }
    /**
     * Generates tokens from the given string which include CRLF as individual tokens.
     *
     * @param string $token
     *
     * @return string[]
     */
    protected function generateTokenLines($token)
    {
    }
    /**
     * Set a value into the cache.
     *
     * @param string $value
     */
    protected function setCachedValue($value)
    {
    }
    /**
     * Get the value in the cache.
     *
     * @return string
     */
    protected function getCachedValue()
    {
    }
    /**
     * Clear the cached value if $condition is met.
     *
     * @param bool $condition
     */
    protected function clearCachedValueIf($condition)
    {
    }
    /**
     * Generate a list of all tokens in the final header.
     *
     * @param string $string The string to tokenize
     *
     * @return array An array of tokens as strings
     */
    protected function toTokens($string = \null)
    {
    }
    /**
     * Takes an array of tokens which appear in the header and turns them into
     * an RFC 2822 compliant string, adding FWSP where needed.
     *
     * @param string[] $tokens
     *
     * @return string
     */
    private function tokensToString(array $tokens)
    {
    }
}