<?php

namespace Carbon;

abstract class AbstractTranslator extends \Symfony\Component\Translation\Translator
{
    /**
     * Translator singletons for each language.
     *
     * @var array
     */
    protected static $singletons = [];
    /**
     * List of custom localized messages.
     *
     * @var array
     */
    protected $messages = [];
    /**
     * List of custom directories that contain translation files.
     *
     * @var string[]
     */
    protected $directories = [];
    /**
     * Set to true while constructing.
     *
     * @var bool
     */
    protected $initializing = false;
    /**
     * List of locales aliases.
     *
     * @var string[]
     */
    protected $aliases = ['me' => 'sr_Latn_ME', 'scr' => 'sh'];
    /**
     * Return a singleton instance of Translator.
     *
     * @param string|null $locale optional initial locale ("en" - english by default)
     *
     * @return static
     */
    public static function get($locale = null)
    {
    }
    public function __construct($locale, \Symfony\Component\Translation\Formatter\MessageFormatterInterface $formatter = null, $cacheDir = null, $debug = false)
    {
    }
    /**
     * Returns the list of directories translation files are searched in.
     *
     * @return array
     */
    public function getDirectories() : array
    {
    }
    /**
     * Set list of directories translation files are searched in.
     *
     * @param array $directories new directories list
     *
     * @return $this
     */
    public function setDirectories(array $directories)
    {
    }
    /**
     * Add a directory to the list translation files are searched in.
     *
     * @param string $directory new directory
     *
     * @return $this
     */
    public function addDirectory(string $directory)
    {
    }
    /**
     * Remove a directory from the list translation files are searched in.
     *
     * @param string $directory directory path
     *
     * @return $this
     */
    public function removeDirectory(string $directory)
    {
    }
    /**
     * Reset messages of a locale (all locale if no locale passed).
     * Remove custom messages and reload initial messages from matching
     * file in Lang directory.
     *
     * @param string|null $locale
     *
     * @return bool
     */
    public function resetMessages($locale = null)
    {
    }
    /**
     * Returns the list of files matching a given locale prefix (or all if empty).
     *
     * @param string $prefix prefix required to filter result
     *
     * @return array
     */
    public function getLocalesFiles($prefix = '')
    {
    }
    /**
     * Returns the list of internally available locales and already loaded custom locales.
     * (It will ignore custom translator dynamic loading.)
     *
     * @param string $prefix prefix required to filter result
     *
     * @return array
     */
    public function getAvailableLocales($prefix = '')
    {
    }
    protected function translate(?string $id, array $parameters = [], ?string $domain = null, ?string $locale = null) : string
    {
    }
    /**
     * Init messages language from matching file in Lang directory.
     *
     * @param string $locale
     *
     * @return bool
     */
    protected function loadMessagesFromFile($locale)
    {
    }
    /**
     * Set messages of a locale and take file first if present.
     *
     * @param string $locale
     * @param array  $messages
     *
     * @return $this
     */
    public function setMessages($locale, $messages)
    {
    }
    /**
     * Set messages of the current locale and take file first if present.
     *
     * @param array $messages
     *
     * @return $this
     */
    public function setTranslations($messages)
    {
    }
    /**
     * Get messages of a locale, if none given, return all the
     * languages.
     *
     * @param string|null $locale
     *
     * @return array
     */
    public function getMessages($locale = null)
    {
    }
    /**
     * Set the current translator locale and indicate if the source locale file exists
     *
     * @param string $locale locale ex. en
     *
     * @return bool
     */
    public function setLocale($locale)
    {
    }
    /**
     * Show locale on var_dump().
     *
     * @return array
     */
    public function __debugInfo()
    {
    }
    private static function compareChunkLists($referenceChunks, $chunks)
    {
    }
}