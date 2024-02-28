<?php

namespace Sabre\VObject\Parser;

/**
 * MimeDir parser.
 *
 * This class parses iCalendar 2.0 and vCard 2.1, 3.0 and 4.0 files. This
 * parser will return one of the following two objects from the parse method:
 *
 * Sabre\VObject\Component\VCalendar
 * Sabre\VObject\Component\VCard
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class MimeDir extends \Sabre\VObject\Parser\Parser
{
    /**
     * The input stream.
     *
     * @var resource
     */
    protected $input;
    /**
     * Root component.
     *
     * @var Component
     */
    protected $root;
    /**
     * By default all input will be assumed to be UTF-8.
     *
     * However, both iCalendar and vCard might be encoded using different
     * character sets. The character set is usually set in the mime-type.
     *
     * If this is the case, use setEncoding to specify that a different
     * encoding will be used. If this is set, the parser will automatically
     * convert all incoming data to UTF-8.
     *
     * @var string
     */
    protected $charset = 'UTF-8';
    /**
     * The list of character sets we support when decoding.
     *
     * This would be a const expression but for now we need to support PHP 5.5
     */
    protected static $SUPPORTED_CHARSETS = ['UTF-8', 'ISO-8859-1', 'Windows-1252'];
    /**
     * Parses an iCalendar or vCard file.
     *
     * Pass a stream or a string. If null is parsed, the existing buffer is
     * used.
     *
     * @param string|resource|null $input
     * @param int $options
     *
     * @return Sabre\VObject\Document
     */
    function parse($input = null, $options = 0)
    {
    }
    /**
     * By default all input will be assumed to be UTF-8.
     *
     * However, both iCalendar and vCard might be encoded using different
     * character sets. The character set is usually set in the mime-type.
     *
     * If this is the case, use setEncoding to specify that a different
     * encoding will be used. If this is set, the parser will automatically
     * convert all incoming data to UTF-8.
     *
     * @param string $charset
     */
    function setCharset($charset)
    {
    }
    /**
     * Sets the input buffer. Must be a string or stream.
     *
     * @param resource|string $input
     *
     * @return void
     */
    function setInput($input)
    {
    }
    /**
     * Parses an entire document.
     *
     * @return void
     */
    protected function parseDocument()
    {
    }
    /**
     * Parses a line, and if it hits a component, it will also attempt to parse
     * the entire component.
     *
     * @param string $line Unfolded line
     *
     * @return Node
     */
    protected function parseLine($line)
    {
    }
    /**
     * We need to look ahead 1 line every time to see if we need to 'unfold'
     * the next line.
     *
     * If that was not the case, we store it here.
     *
     * @var null|string
     */
    protected $lineBuffer;
    /**
     * The real current line number.
     */
    protected $lineIndex = 0;
    /**
     * In the case of unfolded lines, this property holds the line number for
     * the start of the line.
     *
     * @var int
     */
    protected $startLine = 0;
    /**
     * Contains a 'raw' representation of the current line.
     *
     * @var string
     */
    protected $rawLine;
    /**
     * Reads a single line from the buffer.
     *
     * This method strips any newlines and also takes care of unfolding.
     *
     * @throws \Sabre\VObject\EofException
     *
     * @return string
     */
    protected function readLine()
    {
    }
    /**
     * Reads a property or component from a line.
     *
     * @return void
     */
    protected function readProperty($line)
    {
    }
    /**
     * Unescapes a property value.
     *
     * vCard 2.1 says:
     *   * Semi-colons must be escaped in some property values, specifically
     *     ADR, ORG and N.
     *   * Semi-colons must be escaped in parameter values, because semi-colons
     *     are also use to separate values.
     *   * No mention of escaping backslashes with another backslash.
     *   * newlines are not escaped either, instead QUOTED-PRINTABLE is used to
     *     span values over more than 1 line.
     *
     * vCard 3.0 says:
     *   * (rfc2425) Backslashes, newlines (\n or \N) and comma's must be
     *     escaped, all time time.
     *   * Comma's are used for delimeters in multiple values
     *   * (rfc2426) Adds to to this that the semi-colon MUST also be escaped,
     *     as in some properties semi-colon is used for separators.
     *   * Properties using semi-colons: N, ADR, GEO, ORG
     *   * Both ADR and N's individual parts may be broken up further with a
     *     comma.
     *   * Properties using commas: NICKNAME, CATEGORIES
     *
     * vCard 4.0 (rfc6350) says:
     *   * Commas must be escaped.
     *   * Semi-colons may be escaped, an unescaped semi-colon _may_ be a
     *     delimiter, depending on the property.
     *   * Backslashes must be escaped
     *   * Newlines must be escaped as either \N or \n.
     *   * Some compound properties may contain multiple parts themselves, so a
     *     comma within a semi-colon delimited property may also be unescaped
     *     to denote multiple parts _within_ the compound property.
     *   * Text-properties using semi-colons: N, ADR, ORG, CLIENTPIDMAP.
     *   * Text-properties using commas: NICKNAME, RELATED, CATEGORIES, PID.
     *
     * Even though the spec says that commas must always be escaped, the
     * example for GEO in Section 6.5.2 seems to violate this.
     *
     * iCalendar 2.0 (rfc5545) says:
     *   * Commas or semi-colons may be used as delimiters, depending on the
     *     property.
     *   * Commas, semi-colons, backslashes, newline (\N or \n) are always
     *     escaped, unless they are delimiters.
     *   * Colons shall not be escaped.
     *   * Commas can be considered the 'default delimiter' and is described as
     *     the delimiter in cases where the order of the multiple values is
     *     insignificant.
     *   * Semi-colons are described as the delimiter for 'structured values'.
     *     They are specifically used in Semi-colons are used as a delimiter in
     *     REQUEST-STATUS, RRULE, GEO and EXRULE. EXRULE is deprecated however.
     *
     * Now for the parameters
     *
     * If delimiter is not set (null) this method will just return a string.
     * If it's a comma or a semi-colon the string will be split on those
     * characters, and always return an array.
     *
     * @param string $input
     * @param string $delimiter
     *
     * @return string|string[]
     */
    static function unescapeValue($input, $delimiter = ';')
    {
    }
    /**
     * Unescapes a parameter value.
     *
     * vCard 2.1:
     *   * Does not mention a mechanism for this. In addition, double quotes
     *     are never used to wrap values.
     *   * This means that parameters can simply not contain colons or
     *     semi-colons.
     *
     * vCard 3.0 (rfc2425, rfc2426):
     *   * Parameters _may_ be surrounded by double quotes.
     *   * If this is not the case, semi-colon, colon and comma may simply not
     *     occur (the comma used for multiple parameter values though).
     *   * If it is surrounded by double-quotes, it may simply not contain
     *     double-quotes.
     *   * This means that a parameter can in no case encode double-quotes, or
     *     newlines.
     *
     * vCard 4.0 (rfc6350)
     *   * Behavior seems to be identical to vCard 3.0
     *
     * iCalendar 2.0 (rfc5545)
     *   * Behavior seems to be identical to vCard 3.0
     *
     * Parameter escaping mechanism (rfc6868) :
     *   * This rfc describes a new way to escape parameter values.
     *   * New-line is encoded as ^n
     *   * ^ is encoded as ^^.
     *   * " is encoded as ^'
     *
     * @param string $input
     *
     * @return void
     */
    private function unescapeParam($input)
    {
    }
    /**
     * Gets the full quoted printable value.
     *
     * We need a special method for this, because newlines have both a meaning
     * in vCards, and in QuotedPrintable.
     *
     * This method does not do any decoding.
     *
     * @return string
     */
    private function extractQuotedPrintableValue()
    {
    }
}