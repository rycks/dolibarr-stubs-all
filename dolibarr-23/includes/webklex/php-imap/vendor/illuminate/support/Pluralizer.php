<?php

namespace Illuminate\Support;

class Pluralizer
{
    /**
     * Uncountable word forms.
     *
     * @var string[]
     */
    public static $uncountable = ['audio', 'bison', 'cattle', 'chassis', 'compensation', 'coreopsis', 'data', 'deer', 'education', 'emoji', 'equipment', 'evidence', 'feedback', 'firmware', 'fish', 'furniture', 'gold', 'hardware', 'information', 'jedi', 'kin', 'knowledge', 'love', 'metadata', 'money', 'moose', 'news', 'nutrition', 'offspring', 'plankton', 'pokemon', 'police', 'rain', 'recommended', 'related', 'rice', 'series', 'sheep', 'software', 'species', 'swine', 'traffic', 'wheat'];
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
     * Get the singular form of an English word.
     *
     * @param  string  $value
     * @return string
     */
    public static function singular($value)
    {
    }
    /**
     * Determine if the given value is uncountable.
     *
     * @param  string  $value
     * @return bool
     */
    protected static function uncountable($value)
    {
    }
    /**
     * Attempt to match the case on two strings.
     *
     * @param  string  $value
     * @param  string  $comparison
     * @return string
     */
    protected static function matchCase($value, $comparison)
    {
    }
    /**
     * Get the inflector instance.
     *
     * @return \Doctrine\Inflector\Inflector
     */
    public static function inflector()
    {
    }
}