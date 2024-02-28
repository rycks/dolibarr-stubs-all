<?php

namespace DebugBar\Bridge;

/**
 * Collects CacheCache operations
 *
 * http://maximebf.github.io/CacheCache/
 *
 * Example:
 * <code>
 * $debugbar->addCollector(new CacheCacheCollector(CacheManager::get('default')));
 * // or
 * $debugbar->addCollector(new CacheCacheCollector());
 * $debugbar['cache']->addCache(CacheManager::get('default'));
 * </code>
 */
class CacheCacheCollector extends \DebugBar\Bridge\MonologCollector
{
    protected $logger;
    public function __construct(\CacheCache\Cache $cache = null, \Monolog\Logger $logger = null, $level = \Monolog\Logger::DEBUG, $bubble = true)
    {
    }
    public function addCache(\CacheCache\Cache $cache)
    {
    }
    public function getName()
    {
    }
}