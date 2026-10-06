<?php

namespace Carbon\Traits;

/**
 * Trait Localization.
 *
 * Embed default and locale translators and translation base methods.
 */
trait Localization
{
    /**
     * Default translator.
     *
     * @var \Symfony\Component\Translation\TranslatorInterface
     */
    protected static $translator;
    /**
     * Specific translator of the current instance.
     *
     * @var \Symfony\Component\Translation\TranslatorInterface
     */
    protected $localTranslator;
    /**
     * Options for diffForHumans().
     *
     * @var int
     */
    protected static $humanDiffOptions = \Carbon\CarbonInterface::NO_ZERO_DIFF;
    /**
     * @deprecated To avoid conflict between different third-party libraries, static setters should not be used.
     *             You should rather use the ->settings() method.
     * @see settings
     *
     * @param int $humanDiffOptions
     */
    public static function setHumanDiffOptions($humanDiffOptions)
    {
    }
    /**
     * @deprecated To avoid conflict between different third-party libraries, static setters should not be used.
     *             You should rather use the ->settings() method.
     * @see settings
     *
     * @param int $humanDiffOption
     */
    public static function enableHumanDiffOption($humanDiffOption)
    {
    }
    /**
     * @deprecated To avoid conflict between different third-party libraries, static setters should not be used.
     *             You should rather use the ->settings() method.
     * @see settings
     *
     * @param int $humanDiffOption
     */
    public static function disableHumanDiffOption($humanDiffOption)
    {
    }
    /**
     * Return default humanDiff() options (merged flags as integer).
     *
     * @return int
     */
    public static function getHumanDiffOptions()
    {
    }
    /**
     * Get the default translator instance in use.
     *
     * @return \Symfony\Component\Translation\TranslatorInterface
     */
    public static function getTranslator()
    {
    }
    /**
     * Set the default translator instance to use.
     *
     * @param \Symfony\Component\Translation\TranslatorInterface $translator
     *
     * @return void
     */
    public static function setTranslator(\Symfony\Component\Translation\TranslatorInterface $translator)
    {
    }
    /**
     * Return true if the current instance has its own translator.
     *
     * @return bool
     */
    public function hasLocalTranslator()
    {
    }
    /**
     * Get the translator of the current instance or the default if none set.
     *
     * @return \Symfony\Component\Translation\TranslatorInterface
     */
    public function getLocalTranslator()
    {
    }
    /**
     * Set the translator for the current instance.
     *
     * @param \Symfony\Component\Translation\TranslatorInterface $translator
     *
     * @return $this
     */
    public function setLocalTranslator(\Symfony\Component\Translation\TranslatorInterface $translator)
    {
    }
    /**
     * Returns raw translation message for a given key.
     *
     * @param \Symfony\Component\Translation\TranslatorInterface $translator the translator to use
     * @param string                                             $key        key to find
     * @param string|null                                        $locale     current locale used if null
     * @param string|null                                        $default    default value if translation returns the key
     *
     * @return string
     */
    public static function getTranslationMessageWith($translator, string $key, ?string $locale = null, ?string $default = null)
    {
    }
    /**
     * Returns raw translation message for a given key.
     *
     * @param string                                             $key        key to find
     * @param string|null                                        $locale     current locale used if null
     * @param string|null                                        $default    default value if translation returns the key
     * @param \Symfony\Component\Translation\TranslatorInterface $translator an optional translator to use
     *
     * @return string
     */
    public function getTranslationMessage(string $key, ?string $locale = null, ?string $default = null, $translator = null)
    {
    }
    /**
     * Translate using translation string or callback available.
     *
     * @param \Symfony\Component\Translation\TranslatorInterface $translator
     * @param string                                             $key
     * @param array                                              $parameters
     * @param null                                               $number
     *
     * @return string
     */
    public static function translateWith(\Symfony\Component\Translation\TranslatorInterface $translator, string $key, array $parameters = [], $number = null) : string
    {
    }
    /**
     * Translate using translation string or callback available.
     *
     * @param string                                                  $key
     * @param array                                                   $parameters
     * @param string|int|float|null                                   $number
     * @param \Symfony\Component\Translation\TranslatorInterface|null $translator
     * @param bool                                                    $altNumbers
     *
     * @return string
     */
    public function translate(string $key, array $parameters = [], $number = null, ?\Symfony\Component\Translation\TranslatorInterface $translator = null, bool $altNumbers = false) : string
    {
    }
    /**
     * Returns the alternative number for a given integer if available in the current locale.
     *
     * @param int $number
     *
     * @return string
     */
    public function translateNumber(int $number) : string
    {
    }
    /**
     * Translate a time string from a locale to an other.
     *
     * @param string      $timeString date/time/duration string to translate (may also contain English)
     * @param string|null $from       input locale of the $timeString parameter (`Carbon::getLocale()` by default)
     * @param string|null $to         output locale of the result returned (`"en"` by default)
     * @param int         $mode       specify what to translate with options:
     *                                - CarbonInterface::TRANSLATE_ALL (default)
     *                                - CarbonInterface::TRANSLATE_MONTHS
     *                                - CarbonInterface::TRANSLATE_DAYS
     *                                - CarbonInterface::TRANSLATE_UNITS
     *                                - CarbonInterface::TRANSLATE_MERIDIEM
     *                                You can use pipe to group: CarbonInterface::TRANSLATE_MONTHS | CarbonInterface::TRANSLATE_DAYS
     *
     * @return string
     */
    public static function translateTimeString($timeString, $from = null, $to = null, $mode = \Carbon\CarbonInterface::TRANSLATE_ALL)
    {
    }
    /**
     * Translate a time string from the current locale (`$date->locale()`) to an other.
     *
     * @param string      $timeString time string to translate
     * @param string|null $to         output locale of the result returned ("en" by default)
     *
     * @return string
     */
    public function translateTimeStringTo($timeString, $to = null)
    {
    }
    /**
     * Get/set the locale for the current instance.
     *
     * @param string|null $locale
     * @param string      ...$fallbackLocales
     *
     * @return $this|string
     */
    public function locale(string $locale = null, ...$fallbackLocales)
    {
    }
    /**
     * Get the current translator locale.
     *
     * @return string
     */
    public static function getLocale()
    {
    }
    /**
     * Set the current translator locale and indicate if the source locale file exists.
     * Pass 'auto' as locale to use closest language from the current LC_TIME locale.
     *
     * @param string $locale locale ex. en
     *
     * @return bool
     */
    public static function setLocale($locale)
    {
    }
    /**
     * Set the fallback locale.
     *
     * @see https://symfony.com/doc/current/components/translation.html#fallback-locales
     *
     * @param string $locale
     */
    public static function setFallbackLocale($locale)
    {
    }
    /**
     * Get the fallback locale.
     *
     * @see https://symfony.com/doc/current/components/translation.html#fallback-locales
     *
     * @return string|null
     */
    public static function getFallbackLocale()
    {
    }
    /**
     * Set the current locale to the given, execute the passed function, reset the locale to previous one,
     * then return the result of the closure (or null if the closure was void).
     *
     * @param string   $locale locale ex. en
     * @param callable $func
     *
     * @return mixed
     */
    public static function executeWithLocale($locale, $func)
    {
    }
    /**
     * Returns true if the given locale is internally supported and has short-units support.
     * Support is considered enabled if either year, day or hour has a short variant translated.
     *
     * @param string $locale locale ex. en
     *
     * @return bool
     */
    public static function localeHasShortUnits($locale)
    {
    }
    /**
     * Returns true if the given locale is internally supported and has diff syntax support (ago, from now, before, after).
     * Support is considered enabled if the 4 sentences are translated in the given locale.
     *
     * @param string $locale locale ex. en
     *
     * @return bool
     */
    public static function localeHasDiffSyntax($locale)
    {
    }
    /**
     * Returns true if the given locale is internally supported and has words for 1-day diff (just now, yesterday, tomorrow).
     * Support is considered enabled if the 3 words are translated in the given locale.
     *
     * @param string $locale locale ex. en
     *
     * @return bool
     */
    public static function localeHasDiffOneDayWords($locale)
    {
    }
    /**
     * Returns true if the given locale is internally supported and has words for 2-days diff (before yesterday, after tomorrow).
     * Support is considered enabled if the 2 words are translated in the given locale.
     *
     * @param string $locale locale ex. en
     *
     * @return bool
     */
    public static function localeHasDiffTwoDayWords($locale)
    {
    }
    /**
     * Returns true if the given locale is internally supported and has period syntax support (X times, every X, from X, to X).
     * Support is considered enabled if the 4 sentences are translated in the given locale.
     *
     * @param string $locale locale ex. en
     *
     * @return bool
     */
    public static function localeHasPeriodSyntax($locale)
    {
    }
    /**
     * Returns the list of internally available locales and already loaded custom locales.
     * (It will ignore custom translator dynamic loading.)
     *
     * @return array
     */
    public static function getAvailableLocales()
    {
    }
    /**
     * Returns list of Language object for each available locale. This object allow you to get the ISO name, native
     * name, region and variant of the locale.
     *
     * @return Language[]
     */
    public static function getAvailableLocalesInfo()
    {
    }
    /**
     * Initialize the default translator instance if necessary.
     *
     * @return \Symfony\Component\Translation\TranslatorInterface
     */
    protected static function translator()
    {
    }
    /**
     * Get the locale of a given translator.
     *
     * If null or omitted, current local translator is used.
     * If no local translator is in use, current global translator is used.
     *
     * @param null $translator
     *
     * @return string|null
     */
    protected function getTranslatorLocale($translator = null) : ?string
    {
    }
    /**
     * Throw an error if passed object is not LocaleAwareInterface.
     *
     * @param LocaleAwareInterface|null $translator
     *
     * @return LocaleAwareInterface|null
     */
    protected static function getLocaleAwareTranslator($translator = null)
    {
    }
    /**
     * @param mixed                                                    $translator
     * @param \Symfony\Component\Translation\MessageCatalogueInterface $catalogue
     *
     * @return mixed
     */
    private static function getFromCatalogue($translator, $catalogue, string $id, string $domain = 'messages')
    {
    }
    /**
     * Return the word cleaned from its translation codes.
     *
     * @param string $word
     *
     * @return string
     */
    private static function cleanWordFromTranslationString($word)
    {
    }
    /**
     * Translate a list of words.
     *
     * @param string[] $keys     keys to translate.
     * @param string[] $messages messages bag handling translations.
     * @param string   $key      'to' (to get the translation) or 'from' (to get the detection RegExp pattern).
     *
     * @return string[]
     */
    private static function translateWordsByKeys($keys, $messages, $key) : array
    {
    }
    /**
     * Get an array of translations based on the current date.
     *
     * @param callable $translation
     * @param int      $length
     * @param string   $timeString
     *
     * @return string[]
     */
    private static function getTranslationArray($translation, $length, $timeString) : array
    {
    }
}