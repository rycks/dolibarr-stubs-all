<?php

namespace Sabre\Uri;

/**
 * This file contains all the uri handling functions.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/
 */
/**
 * Resolves relative urls, like a browser would.
 *
 * This function takes a basePath, which itself _may_ also be relative, and
 * then applies the relative path on top of it.
 *
 * @param string $basePath
 * @param string $newPath
 * @return string
 */
function resolve($basePath, $newPath)
{
}
/**
 * Takes a URI or partial URI as its argument, and normalizes it.
 *
 * After normalizing a URI, you can safely compare it to other URIs.
 * This function will for instance convert a %7E into a tilde, according to
 * rfc3986.
 *
 * It will also change a %3a into a %3A.
 *
 * @param string $uri
 * @return string
 */
function normalize($uri)
{
}
/**
 * Parses a URI and returns its individual components.
 *
 * This method largely behaves the same as PHP's parse_url, except that it will
 * return an array with all the array keys, including the ones that are not
 * set by parse_url, which makes it a bit easier to work with.
 *
 * Unlike PHP's parse_url, it will also convert any non-ascii characters to
 * percent-encoded strings. PHP's parse_url corrupts these characters on OS X.
 *
 * @param string $uri
 * @return array
 */
function parse($uri)
{
}
/**
 * This function takes the components returned from PHP's parse_url, and uses
 * it to generate a new uri.
 *
 * @param array $parts
 * @return string
 */
function build(array $parts)
{
}
/**
 * Returns the 'dirname' and 'basename' for a path.
 *
 * The reason there is a custom function for this purpose, is because
 * basename() is locale aware (behaviour changes if C locale or a UTF-8 locale
 * is used) and we need a method that just operates on UTF-8 characters.
 *
 * In addition basename and dirname are platform aware, and will treat
 * backslash (\) as a directory separator on windows.
 *
 * This method returns the 2 components as an array.
 *
 * If there is no dirname, it will return an empty string. Any / appearing at
 * the end of the string is stripped off.
 *
 * @param string $path
 * @return array
 */
function split($path)
{
}
/**
 * This function is another implementation of parse_url, except this one is
 * fully written in PHP.
 *
 * The reason is that the PHP bug team is not willing to admit that there are
 * bugs in the parse_url implementation.
 *
 * This function is only called if the main parse method fails. It's pretty
 * crude and probably slow, so the original parse_url is usually preferred.
 *
 * @param string $uri
 * @return array
 */
function _parse_fallback($uri)
{
}