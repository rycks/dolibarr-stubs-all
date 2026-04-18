<?php

namespace Illuminate\Support;

class NamespacedItemResolver
{
    /**
     * A cache of the parsed items.
     *
     * @var array
     */
    protected $parsed = [];
    /**
     * Parse a key into namespace, group, and item.
     *
     * @param  string  $key
     * @return array
     */
    public function parseKey($key)
    {
    }
    /**
     * Parse an array of basic segments.
     *
     * @param  array  $segments
     * @return array
     */
    protected function parseBasicSegments(array $segments)
    {
    }
    /**
     * Parse an array of namespaced segments.
     *
     * @param  string  $key
     * @return array
     */
    protected function parseNamespacedSegments($key)
    {
    }
    /**
     * Set the parsed value of a key.
     *
     * @param  string  $key
     * @param  array  $parsed
     * @return void
     */
    public function setParsedKey($key, $parsed)
    {
    }
    /**
     * Flush the cache of parsed keys.
     *
     * @return void
     */
    public function flushParsedKeys()
    {
    }
}