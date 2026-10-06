<?php

namespace Illuminate\Support;

class Stringable implements \JsonSerializable
{
    use \Illuminate\Support\Traits\Conditionable, \Illuminate\Support\Traits\Macroable, \Illuminate\Support\Traits\Tappable;
    /**
     * The underlying string value.
     *
     * @var string
     */
    protected $value;
    /**
     * Create a new instance of the class.
     *
     * @param  string  $value
     * @return void
     */
    public function __construct($value = '')
    {
    }
    /**
     * Return the remainder of a string after the first occurrence of a given value.
     *
     * @param  string  $search
     * @return static
     */
    public function after($search)
    {
    }
    /**
     * Return the remainder of a string after the last occurrence of a given value.
     *
     * @param  string  $search
     * @return static
     */
    public function afterLast($search)
    {
    }
    /**
     * Append the given values to the string.
     *
     * @param  array  $values
     * @return static
     */
    public function append(...$values)
    {
    }
    /**
     * Transliterate a UTF-8 value to ASCII.
     *
     * @param  string  $language
     * @return static
     */
    public function ascii($language = 'en')
    {
    }
    /**
     * Get the trailing name component of the path.
     *
     * @param  string  $suffix
     * @return static
     */
    public function basename($suffix = '')
    {
    }
    /**
     * Get the basename of the class path.
     *
     * @return static
     */
    public function classBasename()
    {
    }
    /**
     * Get the portion of a string before the first occurrence of a given value.
     *
     * @param  string  $search
     * @return static
     */
    public function before($search)
    {
    }
    /**
     * Get the portion of a string before the last occurrence of a given value.
     *
     * @param  string  $search
     * @return static
     */
    public function beforeLast($search)
    {
    }
    /**
     * Get the portion of a string between two given values.
     *
     * @param  string  $from
     * @param  string  $to
     * @return static
     */
    public function between($from, $to)
    {
    }
    /**
     * Convert a value to camel case.
     *
     * @return static
     */
    public function camel()
    {
    }
    /**
     * Determine if a given string contains a given substring.
     *
     * @param  string|array  $needles
     * @return bool
     */
    public function contains($needles)
    {
    }
    /**
     * Determine if a given string contains all array values.
     *
     * @param  array  $needles
     * @return bool
     */
    public function containsAll(array $needles)
    {
    }
    /**
     * Get the parent directory's path.
     *
     * @param  int  $levels
     * @return static
     */
    public function dirname($levels = 1)
    {
    }
    /**
     * Determine if a given string ends with a given substring.
     *
     * @param  string|array  $needles
     * @return bool
     */
    public function endsWith($needles)
    {
    }
    /**
     * Determine if the string is an exact match with the given value.
     *
     * @param  string  $value
     * @return bool
     */
    public function exactly($value)
    {
    }
    /**
     * Explode the string into an array.
     *
     * @param  string  $delimiter
     * @param  int  $limit
     * @return \Illuminate\Support\Collection
     */
    public function explode($delimiter, $limit = PHP_INT_MAX)
    {
    }
    /**
     * Split a string using a regular expression or by length.
     *
     * @param  string|int  $pattern
     * @param  int  $limit
     * @param  int  $flags
     * @return \Illuminate\Support\Collection
     */
    public function split($pattern, $limit = -1, $flags = 0)
    {
    }
    /**
     * Cap a string with a single instance of a given value.
     *
     * @param  string  $cap
     * @return static
     */
    public function finish($cap)
    {
    }
    /**
     * Determine if a given string matches a given pattern.
     *
     * @param  string|array  $pattern
     * @return bool
     */
    public function is($pattern)
    {
    }
    /**
     * Determine if a given string is 7 bit ASCII.
     *
     * @return bool
     */
    public function isAscii()
    {
    }
    /**
     * Determine if a given string is a valid UUID.
     *
     * @return bool
     */
    public function isUuid()
    {
    }
    /**
     * Determine if the given string is empty.
     *
     * @return bool
     */
    public function isEmpty()
    {
    }
    /**
     * Determine if the given string is not empty.
     *
     * @return bool
     */
    public function isNotEmpty()
    {
    }
    /**
     * Convert a string to kebab case.
     *
     * @return static
     */
    public function kebab()
    {
    }
    /**
     * Return the length of the given string.
     *
     * @param  string  $encoding
     * @return int
     */
    public function length($encoding = null)
    {
    }
    /**
     * Limit the number of characters in a string.
     *
     * @param  int  $limit
     * @param  string  $end
     * @return static
     */
    public function limit($limit = 100, $end = '...')
    {
    }
    /**
     * Convert the given string to lower-case.
     *
     * @return static
     */
    public function lower()
    {
    }
    /**
     * Convert GitHub flavored Markdown into HTML.
     *
     * @param  array  $options
     * @return static
     */
    public function markdown(array $options = [])
    {
    }
    /**
     * Masks a portion of a string with a repeated character.
     *
     * @param  string  $character
     * @param  int  $index
     * @param  int|null  $length
     * @param  string  $encoding
     * @return static
     */
    public function mask($character, $index, $length = null, $encoding = 'UTF-8')
    {
    }
    /**
     * Get the string matching the given pattern.
     *
     * @param  string  $pattern
     * @return static
     */
    public function match($pattern)
    {
    }
    /**
     * Get the string matching the given pattern.
     *
     * @param  string  $pattern
     * @return \Illuminate\Support\Collection
     */
    public function matchAll($pattern)
    {
    }
    /**
     * Determine if the string matches the given pattern.
     *
     * @param  string  $pattern
     * @return bool
     */
    public function test($pattern)
    {
    }
    /**
     * Pad both sides of the string with another.
     *
     * @param  int  $length
     * @param  string  $pad
     * @return static
     */
    public function padBoth($length, $pad = ' ')
    {
    }
    /**
     * Pad the left side of the string with another.
     *
     * @param  int  $length
     * @param  string  $pad
     * @return static
     */
    public function padLeft($length, $pad = ' ')
    {
    }
    /**
     * Pad the right side of the string with another.
     *
     * @param  int  $length
     * @param  string  $pad
     * @return static
     */
    public function padRight($length, $pad = ' ')
    {
    }
    /**
     * Parse a Class@method style callback into class and method.
     *
     * @param  string|null  $default
     * @return array
     */
    public function parseCallback($default = null)
    {
    }
    /**
     * Call the given callback and return a new string.
     *
     * @param  callable  $callback
     * @return static
     */
    public function pipe(callable $callback)
    {
    }
    /**
     * Get the plural form of an English word.
     *
     * @param  int  $count
     * @return static
     */
    public function plural($count = 2)
    {
    }
    /**
     * Pluralize the last word of an English, studly caps case string.
     *
     * @param  int  $count
     * @return static
     */
    public function pluralStudly($count = 2)
    {
    }
    /**
     * Prepend the given values to the string.
     *
     * @param  array  $values
     * @return static
     */
    public function prepend(...$values)
    {
    }
    /**
     * Remove any occurrence of the given string in the subject.
     *
     * @param  string|array<string>  $search
     * @param  bool  $caseSensitive
     * @return static
     */
    public function remove($search, $caseSensitive = true)
    {
    }
    /**
     * Reverse the string.
     *
     * @return static
     */
    public function reverse()
    {
    }
    /**
     * Repeat the string.
     *
     * @param  int  $times
     * @return static
     */
    public function repeat(int $times)
    {
    }
    /**
     * Replace the given value in the given string.
     *
     * @param  string|string[]  $search
     * @param  string|string[]  $replace
     * @return static
     */
    public function replace($search, $replace)
    {
    }
    /**
     * Replace a given value in the string sequentially with an array.
     *
     * @param  string  $search
     * @param  array  $replace
     * @return static
     */
    public function replaceArray($search, array $replace)
    {
    }
    /**
     * Replace the first occurrence of a given value in the string.
     *
     * @param  string  $search
     * @param  string  $replace
     * @return static
     */
    public function replaceFirst($search, $replace)
    {
    }
    /**
     * Replace the last occurrence of a given value in the string.
     *
     * @param  string  $search
     * @param  string  $replace
     * @return static
     */
    public function replaceLast($search, $replace)
    {
    }
    /**
     * Replace the patterns matching the given regular expression.
     *
     * @param  string  $pattern
     * @param  \Closure|string  $replace
     * @param  int  $limit
     * @return static
     */
    public function replaceMatches($pattern, $replace, $limit = -1)
    {
    }
    /**
     * Parse input from a string to a collection, according to a format.
     *
     * @param  string  $format
     * @return \Illuminate\Support\Collection
     */
    public function scan($format)
    {
    }
    /**
     * Begin a string with a single instance of a given value.
     *
     * @param  string  $prefix
     * @return static
     */
    public function start($prefix)
    {
    }
    /**
     * Strip HTML and PHP tags from the given string.
     *
     * @param  string  $allowedTags
     * @return static
     */
    public function stripTags($allowedTags = null)
    {
    }
    /**
     * Convert the given string to upper-case.
     *
     * @return static
     */
    public function upper()
    {
    }
    /**
     * Convert the given string to title case.
     *
     * @return static
     */
    public function title()
    {
    }
    /**
     * Convert the given string to title case for each word.
     *
     * @return static
     */
    public function headline()
    {
    }
    /**
     * Get the singular form of an English word.
     *
     * @return static
     */
    public function singular()
    {
    }
    /**
     * Generate a URL friendly "slug" from a given string.
     *
     * @param  string  $separator
     * @param  string|null  $language
     * @return static
     */
    public function slug($separator = '-', $language = 'en')
    {
    }
    /**
     * Convert a string to snake case.
     *
     * @param  string  $delimiter
     * @return static
     */
    public function snake($delimiter = '_')
    {
    }
    /**
     * Determine if a given string starts with a given substring.
     *
     * @param  string|array  $needles
     * @return bool
     */
    public function startsWith($needles)
    {
    }
    /**
     * Convert a value to studly caps case.
     *
     * @return static
     */
    public function studly()
    {
    }
    /**
     * Returns the portion of the string specified by the start and length parameters.
     *
     * @param  int  $start
     * @param  int|null  $length
     * @return static
     */
    public function substr($start, $length = null)
    {
    }
    /**
     * Returns the number of substring occurrences.
     *
     * @param  string  $needle
     * @param  int|null  $offset
     * @param  int|null  $length
     * @return int
     */
    public function substrCount($needle, $offset = null, $length = null)
    {
    }
    /**
     * Replace text within a portion of a string.
     *
     * @param  string|array  $replace
     * @param  array|int  $offset
     * @param  array|int|null  $length
     * @return static
     */
    public function substrReplace($replace, $offset = 0, $length = null)
    {
    }
    /**
     * Swap multiple keywords in a string with other keywords.
     *
     * @param  array  $map
     * @return static
     */
    public function swap(array $map)
    {
    }
    /**
     * Trim the string of the given characters.
     *
     * @param  string  $characters
     * @return static
     */
    public function trim($characters = null)
    {
    }
    /**
     * Left trim the string of the given characters.
     *
     * @param  string  $characters
     * @return static
     */
    public function ltrim($characters = null)
    {
    }
    /**
     * Right trim the string of the given characters.
     *
     * @param  string  $characters
     * @return static
     */
    public function rtrim($characters = null)
    {
    }
    /**
     * Make a string's first character uppercase.
     *
     * @return static
     */
    public function ucfirst()
    {
    }
    /**
     * Split a string by uppercase characters.
     *
     * @return \Illuminate\Support\Collection
     */
    public function ucsplit()
    {
    }
    /**
     * Execute the given callback if the string contains a given substring.
     *
     * @param  string|array  $needles
     * @param  callable  $callback
     * @param  callable|null  $default
     * @return static
     */
    public function whenContains($needles, $callback, $default = null)
    {
    }
    /**
     * Execute the given callback if the string contains all array values.
     *
     * @param  array  $needles
     * @param  callable  $callback
     * @param  callable|null  $default
     * @return static
     */
    public function whenContainsAll(array $needles, $callback, $default = null)
    {
    }
    /**
     * Execute the given callback if the string is empty.
     *
     * @param  callable  $callback
     * @param  callable|null  $default
     * @return static
     */
    public function whenEmpty($callback, $default = null)
    {
    }
    /**
     * Execute the given callback if the string is not empty.
     *
     * @param  callable  $callback
     * @param  callable|null  $default
     * @return static
     */
    public function whenNotEmpty($callback, $default = null)
    {
    }
    /**
     * Execute the given callback if the string ends with a given substring.
     *
     * @param  string|array  $needles
     * @param  callable  $callback
     * @param  callable|null  $default
     * @return static
     */
    public function whenEndsWith($needles, $callback, $default = null)
    {
    }
    /**
     * Execute the given callback if the string is an exact match with the given value.
     *
     * @param  string  $value
     * @param  callable  $callback
     * @param  callable|null  $default
     * @return static
     */
    public function whenExactly($value, $callback, $default = null)
    {
    }
    /**
     * Execute the given callback if the string matches a given pattern.
     *
     * @param  string|array  $pattern
     * @param  callable  $callback
     * @param  callable|null  $default
     * @return static
     */
    public function whenIs($pattern, $callback, $default = null)
    {
    }
    /**
     * Execute the given callback if the string is 7 bit ASCII.
     *
     * @param  callable  $callback
     * @param  callable|null  $default
     * @return static
     */
    public function whenIsAscii($callback, $default = null)
    {
    }
    /**
     * Execute the given callback if the string is a valid UUID.
     *
     * @param  callable  $callback
     * @param  callable|null  $default
     * @return static
     */
    public function whenIsUuid($callback, $default = null)
    {
    }
    /**
     * Execute the given callback if the string starts with a given substring.
     *
     * @param  string|array  $needles
     * @param  callable  $callback
     * @param  callable|null  $default
     * @return static
     */
    public function whenStartsWith($needles, $callback, $default = null)
    {
    }
    /**
     * Execute the given callback if the string matches the given pattern.
     *
     * @param  string  $pattern
     * @param  callable  $callback
     * @param  callable|null  $default
     * @return static
     */
    public function whenTest($pattern, $callback, $default = null)
    {
    }
    /**
     * Limit the number of words in a string.
     *
     * @param  int  $words
     * @param  string  $end
     * @return static
     */
    public function words($words = 100, $end = '...')
    {
    }
    /**
     * Get the number of words a string contains.
     *
     * @return int
     */
    public function wordCount()
    {
    }
    /**
     * Convert the string into a `HtmlString` instance.
     *
     * @return \Illuminate\Support\HtmlString
     */
    public function toHtmlString()
    {
    }
    /**
     * Dump the string.
     *
     * @return $this
     */
    public function dump()
    {
    }
    /**
     * Dump the string and end the script.
     *
     * @return never
     */
    public function dd()
    {
    }
    /**
     * Convert the object to a string when JSON encoded.
     *
     * @return string
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
    }
    /**
     * Proxy dynamic properties onto methods.
     *
     * @param  string  $key
     * @return mixed
     */
    public function __get($key)
    {
    }
    /**
     * Get the raw string value.
     *
     * @return string
     */
    public function __toString()
    {
    }
}