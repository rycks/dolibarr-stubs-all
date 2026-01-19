<?php

namespace Carbon;

class TranslatorImmutable extends \Carbon\Translator
{
    /** @var bool */
    private $constructed = false;
    public function __construct($locale, \Symfony\Component\Translation\Formatter\MessageFormatterInterface $formatter = null, $cacheDir = null, $debug = false)
    {
    }
    /**
     * @codeCoverageIgnore
     */
    public function setDirectories(array $directories)
    {
    }
    public function setLocale($locale)
    {
    }
    /**
     * @codeCoverageIgnore
     */
    public function setMessages($locale, $messages)
    {
    }
    /**
     * @codeCoverageIgnore
     */
    public function setTranslations($messages)
    {
    }
    /**
     * @codeCoverageIgnore
     */
    public function setConfigCacheFactory(\Symfony\Component\Config\ConfigCacheFactoryInterface $configCacheFactory)
    {
    }
    public function resetMessages($locale = null)
    {
    }
    /**
     * @codeCoverageIgnore
     */
    public function setFallbackLocales(array $locales)
    {
    }
    private function disallowMutation($method)
    {
    }
}