<?php

namespace Doctrine\Common\Lexer;

/**
 * Base class for writing simple lexers, i.e. for creating small DSLs.
 *
 * @since  2.0
 * @author Guilherme Blanco <guilhermeblanco@hotmail.com>
 * @author Jonathan Wage <jonwage@gmail.com>
 * @author Roman Borschel <roman@code-factory.org>
 */
abstract class AbstractLexer
{
    /**
     * Lexer original input string.
     *
     * @var string
     */
    private $input;
    /**
     * Array of scanned tokens.
     *
     * Each token is an associative array containing three items:
     *  - 'value'    : the string value of the token in the input string
     *  - 'type'     : the type of the token (identifier, numeric, string, input
     *                 parameter, none)
     *  - 'position' : the position of the token in the input string
     *
     * @var array
     */
    private $tokens = array();
    /**
     * Current lexer position in input string.
     *
     * @var integer
     */
    private $position = 0;
    /**
     * Current peek of current lexer position.
     *
     * @var integer
     */
    private $peek = 0;
    /**
     * The next token in the input.
     *
     * @var array
     */
    public $lookahead;
    /**
     * The last matched/seen token.
     *
     * @var array
     */
    public $token;
    /**
     * Sets the input data to be tokenized.
     *
     * The Lexer is immediately reset and the new input tokenized.
     * Any unprocessed tokens from any previous input are lost.
     *
     * @param string $input The input to be tokenized.
     *
     * @return void
     */
    public function setInput($input)
    {
    }
    /**
     * Resets the lexer.
     *
     * @return void
     */
    public function reset()
    {
    }
    /**
     * Resets the peek pointer to 0.
     *
     * @return void
     */
    public function resetPeek()
    {
    }
    /**
     * Resets the lexer position on the input to the given position.
     *
     * @param integer $position Position to place the lexical scanner.
     *
     * @return void
     */
    public function resetPosition($position = 0)
    {
    }
    /**
     * Retrieve the original lexer's input until a given position. 
     *
     * @param integer $position
     *
     * @return string
     */
    public function getInputUntilPosition($position)
    {
    }
    /**
     * Checks whether a given token matches the current lookahead.
     *
     * @param integer|string $token
     *
     * @return boolean
     */
    public function isNextToken($token)
    {
    }
    /**
     * Checks whether any of the given tokens matches the current lookahead.
     *
     * @param array $tokens
     *
     * @return boolean
     */
    public function isNextTokenAny(array $tokens)
    {
    }
    /**
     * Moves to the next token in the input string.
     *
     * @return boolean
     */
    public function moveNext()
    {
    }
    /**
     * Tells the lexer to skip input tokens until it sees a token with the given value.
     *
     * @param string $type The token type to skip until.
     *
     * @return void
     */
    public function skipUntil($type)
    {
    }
    /**
     * Checks if given value is identical to the given token.
     *
     * @param mixed   $value
     * @param integer $token
     *
     * @return boolean
     */
    public function isA($value, $token)
    {
    }
    /**
     * Moves the lookahead token forward.
     *
     * @return array|null The next token or NULL if there are no more tokens ahead.
     */
    public function peek()
    {
    }
    /**
     * Peeks at the next token, returns it and immediately resets the peek.
     *
     * @return array|null The next token or NULL if there are no more tokens ahead.
     */
    public function glimpse()
    {
    }
    /**
     * Scans the input string for tokens.
     *
     * @param string $input A query string.
     *
     * @return void
     */
    protected function scan($input)
    {
    }
    /**
     * Gets the literal for a given token.
     *
     * @param integer $token
     *
     * @return string
     */
    public function getLiteral($token)
    {
    }
    /**
     * Regex modifiers
     *
     * @return string
     */
    protected function getModifiers()
    {
    }
    /**
     * Lexical catchable patterns.
     *
     * @return array
     */
    protected abstract function getCatchablePatterns();
    /**
     * Lexical non-catchable patterns.
     *
     * @return array
     */
    protected abstract function getNonCatchablePatterns();
    /**
     * Retrieve token type. Also processes the token value if necessary.
     *
     * @param string $value
     *
     * @return integer
     */
    protected abstract function getType(&$value);
}