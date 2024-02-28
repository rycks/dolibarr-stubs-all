<?php

namespace Firebase\JWT;

/**
 * @implements ArrayAccess<string, Key>
 */
class CachedKeySet implements \ArrayAccess
{
    /**
     * @var string
     */
    private $jwksUri;
    /**
     * @var ClientInterface
     */
    private $httpClient;
    /**
     * @var RequestFactoryInterface
     */
    private $httpFactory;
    /**
     * @var CacheItemPoolInterface
     */
    private $cache;
    /**
     * @var ?int
     */
    private $expiresAfter;
    /**
     * @var ?CacheItemInterface
     */
    private $cacheItem;
    /**
     * @var array<string, Key>
     */
    private $keySet;
    /**
     * @var string
     */
    private $cacheKey;
    /**
     * @var string
     */
    private $cacheKeyPrefix = 'jwks';
    /**
     * @var int
     */
    private $maxKeyLength = 64;
    /**
     * @var bool
     */
    private $rateLimit;
    /**
     * @var string
     */
    private $rateLimitCacheKey;
    /**
     * @var int
     */
    private $maxCallsPerMinute = 10;
    /**
     * @var string|null
     */
    private $defaultAlg;
    public function __construct(string $jwksUri, \Psr\Http\Client\ClientInterface $httpClient, \Psr\Http\Message\RequestFactoryInterface $httpFactory, \Psr\Cache\CacheItemPoolInterface $cache, int $expiresAfter = null, bool $rateLimit = false, string $defaultAlg = null)
    {
    }
    /**
     * @param string $keyId
     * @return Key
     */
    public function offsetGet($keyId) : \Firebase\JWT\Key
    {
    }
    /**
     * @param string $keyId
     * @return bool
     */
    public function offsetExists($keyId) : bool
    {
    }
    /**
     * @param string $offset
     * @param Key $value
     */
    public function offsetSet($offset, $value) : void
    {
    }
    /**
     * @param string $offset
     */
    public function offsetUnset($offset) : void
    {
    }
    private function keyIdExists(string $keyId) : bool
    {
    }
    private function rateLimitExceeded() : bool
    {
    }
    private function getCacheItem() : \Psr\Cache\CacheItemInterface
    {
    }
    private function setCacheKeys() : void
    {
    }
}