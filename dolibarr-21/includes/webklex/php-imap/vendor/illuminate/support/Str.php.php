<?php

namespace Illuminate\Support;

class Str
{
    use \Illuminate\Support\Traits\Macroable;
    /**
     * The cache of snake-cased words.
     *
     * @var array
     */
    protected static $snakeCache = [];
    /**
     * The cache of camel-cased words.
     *
     * @var array
     */
    protected static $camelCache = [];
    /**
     * The cache of studly-cased words.
     *
     * @var array
     */
    protected static $studlyCache = [];
    /**
     * The callback that should be used to generate UUIDs.
     *
     * @var callable
     */
    protected static $uuidFactory;
    /**
     * Get a new stringable object from the given string.
     *
     * @param  string  $string
     * @return \Illuminate\Support\Stringable
     */
    public static function of($string)
    {
    }
    /**
     * Return the remainder of a string after the first occurrence of a given value.
     *
     * @param  string  $subject
     * @param  string  $search
     * @return string
     */
    public static function after($subject, $search)
    {
    }
    /**
     * Return the remainder of a string after the last occurrence of a given value.
     *
     * @param  string  $subject
     * @param  string  $search
     * @return string
     */
    public static function afterLast($subject, $search)
    {
    }
    /**
     * Transliterate a UTF-8 value to ASCII.
     *
     * @param  string  $value
     * @param  string  $language
     * @return string
     */
    public static function ascii($value, $language = 'en')
    {
    }
    /**
     * Transliterate a string to its closest ASCII representation.
     *
     * @param  string  $string
     * @param  string|null  $unknown
     * @param  bool|null  $strict
     * @return string
     */
    public static function transliterate($string, $unknown = '?', $strict = false)
    {
    }
    /**
     * Get the portion of a string before the first occurrence of a given value.
     *
     * @param  string  $subject
     * @param  string  $search
     * @return string
     */
    public static function before($subject, $search)
    {
    }
    /**
     * Get the portion of a string before the last occurrence of a given value.
     *
     * @param  string  $subject
     * @param  string  $search
     * @return string
     */
    public static function beforeLast($subject, $search)
    {
    }
    /**
     * Get the portion of a string between two given values.
     *
     * @param  string  $subject
     * @param  string  $from
     * @param  string  $to
     * @return string
     */
    public static function between($subject, $from, $to)
    {
    }
    /**
     * Convert a value to camel case.
     *
     * @param  string  $value
     * @return string
     */
    public static function camel($value)
    {
    }
    /**
     * Determine if a given string contains a given substring.
     *
     * @param  string  $haystack
     * @param  string|string[]  $needles
     * @return bool
     */
    public static function contains($haystack, $needles)
    {
    }
    /**
     * Determine if a given string contains all array values.
     *
     * @param  string  $haystack
     * @param  string[]  $needles
     * @return bool
     */
    public static function containsAll($haystack, array $needles)
    {
    }
    /**
     * Determine if a given string ends with a given substring.
     *
     * @param  string  $haystack
     * @param  string|string[]  $needles
     * @return bool
     */
    public static function endsWith($haystack, $needles)
    {
    }
    /**
     * Cap a string with a single instance of a given value.
     *
     * @param  string  $value
     * @param  string  $cap
     * @return string
     */
    public static function finish($value, $cap)
    {
    }
    /**
     * Determine if a given string matches a given pattern.
     *
     * @param  string|array  $pattern
     * @param  string  $value
     * @return bool
     */
    public static function is($pattern, $value)
    {
    }
    /**
     * Determine if a given string is 7 bit ASCII.
     *
     * @param  string  $value
     * @return bool
     */
    public static function isAscii($value)
    {
    }
    /**
     * Determine if a given string is a valid UUID.
     *
     * @param  string  $value
     * @return bool
     */
    public static function isUuid($value)
    {
    }
    /**
     * Convert a string to kebab case.
     *
     * @param  string  $value
     * @return string
     */
    public static function kebab($value)
    {
    }
    /**
     * Return the length of the given string.
     *
     * @param  string  $value
     * @param  string|null  $encoding
     * @return int
     */
    public static function length($value, $encoding = null)
    {
    }
    /**
     * Limit the number of characters in a string.
     *
     * @param  string  $value
     * @param  int  $limit
     * @param  string  $end
     * @return string
     */
    public static function limit($value, $limit = 100, $end = '...')
    {
    }
    /**
     * Convert the given string to lower-case.
     *
     * @param  string  $value
     * @return string
     */
    public static function lower($value)
    {
    }
    /**
     * Limit the number of words in a string.
     *
     * @param  string  $value
     * @param  int  $words
     * @param  string  $end
     * @return string
     */
    public static function words($value, $words = 100, $end = '...')
    {
    }
    /**
     * Converts GitHub flavored Markdown into HTML.
     *
     * @param  string  $string
     * @param  array  $options
     * @return string
     */
    public static function markdown($string, array $options = [])
    {
    }
    /**
     * Masks a portion of a string with a repeated character.
     *
     * @param  string  $string
     * @param  string  $character
     * @param  int  $index
     * @param  int|null  $length
     * @param  string  $encoding
     * @return string
     */
    public static function mask($string, $character, $index, $length = null, $encoding = 'UTF-8')
    {
    }
    /**
     * Get the string matching the given pattern.
     *
     * @param  string  $pattern
     * @param  string  $subject
     * @return string
     */
    public static function match($pattern, $subject)
    {
    }
    /**
     * Get the string matching the given pattern.
     *
     * @param  string  $pattern
     * @param  string  $subject
     * @return \Illuminate\Support\Collection
     */
    public static function matchAll($pattern, $subject)
    {
    }
    /**
     * Pad both sides of a string with another.
     *
     * @param  string  $value
     * @param  int  $length
     * @param  string  $pad
     * @return string
     */
    public static function padBoth($value, $length, $pad = ' ')
    {
    }
    /**
     * Pad the left side of a string with another.
     *
     * @param  string  $value
     * @param  int  $length
     * @param  string  $pad
     * @return string
     */
    public static function padLeft($value, $length, $pad = ' ')
    {
    }
    /**
     * Pad the right side of a string with another.
     *
     * @param  string  $value
     * @param  int  $length
     * @param  string  $pad
     * @return string
     */
    public static function padRight($value, $length, $pad = ' ')
    {
    }
    /**
     * Parse a Class[@]method style callback into class and method.
     *
     * @param  string  $callback
     * @param  string|null  $default
     * @return array<int, string|null>
     */
    public static function parseCallback($callback, $default = null)
    {
    }
    /**
     * Get the plural form of an English word.
     *
     * @param  string  $value
     * @param  int|array|\Countable  $count
     * @return string
     */
    public static function plural($value, $count = 2)
    {
    }
    /**
     * Pluralize the last word of an English, studly caps case string.
     *
     * @param  string  $value
     * @param  int|array|\Countable  $count
     * @return string
     */
    public static function pluralStudly($value, $count = 2)
    {
    }
    /**
     * Generate a more truly "random" alpha-numeric string.
     *
     * @param  int  $length
     * @return string
     */
    public static function random($length = 16)
    {
    }
    /**
     * Repeat the given string.
     *
     * @param  string  $string
     * @param  int  $times
     * @return string
     */
    public static function repeat(string $string, int $times)
    {
    }
    /**
     * Replace a given value in the string sequentially with an array.
     *
     * @param  string  $search
     * @param  array<int|string, string>  $replace
     * @param  string  $subject
     * @return string
     */
    public static function replaceArray($search, array $replace, $subject)
    {
    }
    /**
     * Replace the given value in the given string.
     *
     * @param  string|string[]  $search
     * @param  string|string[]  $replace
     * @param  string|string[]  $subject
     * @return string
     */
    public static function replace($search, $replace, $subject)
    {
    }
    /**
     * Replace the first occurrence of a given value in the string.
     *
     * @param  string  $search
     * @param  string  $replace
     * @param  string  $subject
     * @return string
     */
    public static function replaceFirst($search, $replace, $subject)
    {
    }
    /**
     * Replace the last occurrence of a given value in the string.
     *
     * @param  string  $search
     * @param  string  $replace
     * @param  string  $subject
     * @return string
     */
    public static function replaceLast($search, $replace, $subject)
    {
    }
    /**
     * Remove any occurrence of the given string in the subject.
     *
     * @param  string|array<string>  $search
     * @param  string  $subject
     * @param  bool  $caseSensitive
     * @return string
     */
    public static function remove($search, $subject, $caseSensitive = true)
    {
    }
    /**
     * Reverse the given string.
     *
     * @param  string  $value
     * @return string
     */
    public static function reverse(string $value)
    {
    }
    /**
     * Begin a string with a single instance of a given value.
     *
     * @param  string  $value
     * @param  string  $prefix
     * @return string
     */
    public static function start($value, $prefix)
    {
    }
    /**
     * Convert the given string to upper-case.
     *
     * @param  string  $value
     * @return string
     */
    public static function upper($value)
    {
    }
    /**
     * Convert the given string to title case.
     *
     * @param  string  $value
     * @return string
     */
    public static function title($value)
    {
    }
    /**
     * Convert the given string to title case for each word.
     *
     * @param  string  $value
     * @return string
     */
    public static function headline($value)
    {
    }
    /**
     * Get the singular form of an English word.
     *
     * @param  string  $value
     * @return string
     */
    public static function singular($value)
    {
    }
    /**
     * Generate a URL friendly "slug" from a given string.
     *
     * @param  string  $title
     * @param  string  $separator
     * @param  string|null  $language
     * @return string
     */
    public static function slug($title, $separator = '-', $language = 'en')
    {
    }
    /**
     * Convert a string to snake case.
     *
     * @param  string  $value
     * @param  string  $delimiter
     * @return string
     */
    public static function snake($value, $delimiter = '_')
    {
    }
    /**
     * Determine if a given string starts with a given substring.
     *
     * @param  string  $haystack
     * @param  string|string[]  $needles
     * @return bool
     */
    public static function startsWith($haystack, $needles)
    {
    }
    /**
     * Convert a value to studly caps case.
     *
     * @param  string  $value
     * @return string
     */
    public static function studly($value)
    {
    }
    /**
     * Returns the portion of the string specified by the start and length parameters.
     *
     * @param  string  $string
     * @param  int  $start
     * @param  int|null  $length
     * @return string
     */
    public static function substr($string, $start, $length = null)
    {
    }
    /**
     * Returns the number of substring occurrences.
     *
     * @param  string  $haystack
     * @param  string  $needle
     * @param  int  $offset
     * @param  int|null  $length
     * @return int
     */
    public static function substrCount($haystack, $needle, $offset = 0, $length = null)
    {
    }
    /**
     * Replace text within a portion of a string.
     *
     * @param  string|array  $string
     * @param  string|array  $replace
     * @param  array|int  $offset
     * @param  array|int|null  $length
     * @return string|array
     */
    public static function substrReplace($string, $replace, $offset = 0, $length = null)
    {
    }
    /**
     * Swap multiple keywords in a string with other keywords.
     *
     * @param  array  $map
     * @param  string  $subject
     * @return string
     */
    public static function swap(array $map, $subject)
    {
    }
    /**
     * Make a string's first character uppercase.
     *
     * @param  string  $string
     * @return string
     */
    public static function ucfirst($string)
    {
    }
    /**
     * Split a string into pieces by uppercase characters.
     *
     * @param  string  $string
     * @return array
     */
    public static function ucsplit($string)
    {
    }
    /**
     * Get the number of words a string contains.
     *
     * @param  string  $string
     * @return int
     */
    public static function wordCount($string)
    {
    }
    /**
     * Generate a UUID (version 4).
     *
     * @return \Ramsey\Uuid\UuidInterface
     */
    public static function uuid()
    {
    }
    /**
     * Generate a time-ordered UUID (version 4).
     *
     * @return \Ramsey\Uuid\UuidInterface
     */
    public static function orderedUuid()
    {
    }
    /**
     * Set the callable that will be used to generate UUIDs.
     *
     * @param  callable|null  $factory
     * @return void
     */
    public static function createUuidsUsing(callable $factory = null)
    {
    }
    /**
     * Indicate that UUIDs should be created normally and not using a custom factory.
     *
     * @return void
     */
    public static function createUuidsNormally()
    {
    }
    /**
     * Remove all strings from the casing caches.
     *
     * @return void
     */
    public static function flushCache()
    {
    }
}