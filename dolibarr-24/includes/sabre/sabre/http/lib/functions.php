<?php

namespace Sabre\HTTP;

/**
 * A collection of useful helpers for parsing or generating various HTTP
 * headers.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
/**
 * Parses a HTTP date-string.
 *
 * This method returns false if the date is invalid.
 *
 * The following formats are supported:
 *    Sun, 06 Nov 1994 08:49:37 GMT    ; IMF-fixdate
 *    Sunday, 06-Nov-94 08:49:37 GMT   ; obsolete RFC 850 format
 *    Sun Nov  6 08:49:37 1994         ; ANSI C's asctime() format
 *
 * See:
 *   http://tools.ietf.org/html/rfc7231#section-7.1.1.1
 *
 * @return bool|DateTime
 */
function parseDate(string $dateString)
{
}
/**
 * Transforms a DateTime object to a valid HTTP/1.1 Date header value.
 */
function toDate(\DateTime $dateTime) : string
{
}
/**
 * This function can be used to aid with content negotiation.
 *
 * It takes 2 arguments, the $acceptHeaderValue, which usually comes from
 * an Accept header, and $availableOptions, which contains an array of
 * items that the server can support.
 *
 * The result of this function will be the 'best possible option'. If no
 * best possible option could be found, null is returned.
 *
 * When it's null you can according to the spec either return a default, or
 * you can choose to emit 406 Not Acceptable.
 *
 * The method also accepts sending 'null' for the $acceptHeaderValue,
 * implying that no accept header was sent.
 *
 * @param string|null $acceptHeaderValue
 *
 * @return string|null
 */
function negotiateContentType($acceptHeaderValue, array $availableOptions)
{
}
/**
 * Parses the Prefer header, as defined in RFC7240.
 *
 * Input can be given as a single header value (string) or multiple headers
 * (array of string).
 *
 * This method will return a key->value array with the various Prefer
 * parameters.
 *
 * Prefer: return=minimal will result in:
 *
 * [ 'return' => 'minimal' ]
 *
 * Prefer: foo, wait=10 will result in:
 *
 * [ 'foo' => true, 'wait' => '10']
 *
 * This method also supports the formats from older drafts of RFC7240, and
 * it will automatically map them to the new values, as the older values
 * are still pretty common.
 *
 * Parameters are currently discarded. There's no known prefer value that
 * uses them.
 *
 * @param string|string[] $input
 */
function parsePrefer($input) : array
{
}
/**
 * This method splits up headers into all their individual values.
 *
 * A HTTP header may have more than one header, such as this:
 *   Cache-Control: private, no-store
 *
 * Header values are always split with a comma.
 *
 * You can pass either a string, or an array. The resulting value is always
 * an array with each spliced value.
 *
 * If the second headers argument is set, this value will simply be merged
 * in. This makes it quicker to merge an old list of values with a new set.
 *
 * @param string|string[] $values
 * @param string|string[] $values2
 */
function getHeaderValues($values, $values2 = null) : array
{
}
/**
 * Parses a mime-type and splits it into:.
 *
 * 1. type
 * 2. subtype
 * 3. quality
 * 4. parameters
 */
function parseMimeType(string $str) : array
{
}
/**
 * Encodes the path of a url.
 *
 * slashes (/) are treated as path-separators.
 */
function encodePath(string $path) : string
{
}
/**
 * Encodes a 1 segment of a path.
 *
 * Slashes are considered part of the name, and are encoded as %2f
 */
function encodePathSegment(string $pathSegment) : string
{
}
/**
 * Decodes a url-encoded path.
 */
function decodePath(string $path) : string
{
}
/**
 * Decodes a url-encoded path segment.
 */
function decodePathSegment(string $path) : string
{
}