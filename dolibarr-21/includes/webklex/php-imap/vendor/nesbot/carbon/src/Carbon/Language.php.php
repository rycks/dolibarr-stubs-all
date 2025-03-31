<?php

namespace Carbon;

class Language implements \JsonSerializable
{
    /**
     * @var array
     */
    protected static $languagesNames;
    /**
     * @var array
     */
    protected static $regionsNames;
    /**
     * @var string
     */
    protected $id;
    /**
     * @var string
     */
    protected $code;
    /**
     * @var string|null
     */
    protected $variant;
    /**
     * @var string|null
     */
    protected $region;
    /**
     * @var array
     */
    protected $names;
    /**
     * @var string
     */
    protected $isoName;
    /**
     * @var string
     */
    protected $nativeName;
    public function __construct(string $id)
    {
    }
    /**
     * Get the list of the known languages.
     *
     * @return array
     */
    public static function all()
    {
    }
    /**
     * Get the list of the known regions.
     *
     * @return array
     */
    public static function regions()
    {
    }
    /**
     * Get both isoName and nativeName as an array.
     *
     * @return array
     */
    public function getNames() : array
    {
    }
    /**
     * Returns the original locale ID.
     *
     * @return string
     */
    public function getId() : string
    {
    }
    /**
     * Returns the code of the locale "en"/"fr".
     *
     * @return string
     */
    public function getCode() : string
    {
    }
    /**
     * Returns the variant code such as cyrl/latn.
     *
     * @return string|null
     */
    public function getVariant() : ?string
    {
    }
    /**
     * Returns the variant such as Cyrillic/Latin.
     *
     * @return string|null
     */
    public function getVariantName() : ?string
    {
    }
    /**
     * Returns the region part of the locale.
     *
     * @return string|null
     */
    public function getRegion() : ?string
    {
    }
    /**
     * Returns the region name for the current language.
     *
     * @return string|null
     */
    public function getRegionName() : ?string
    {
    }
    /**
     * Returns the long ISO language name.
     *
     * @return string
     */
    public function getFullIsoName() : string
    {
    }
    /**
     * Set the ISO language name.
     *
     * @param string $isoName
     */
    public function setIsoName(string $isoName) : self
    {
    }
    /**
     * Return the full name of the language in this language.
     *
     * @return string
     */
    public function getFullNativeName() : string
    {
    }
    /**
     * Set the name of the language in this language.
     *
     * @param string $nativeName
     */
    public function setNativeName(string $nativeName) : self
    {
    }
    /**
     * Returns the short ISO language name.
     *
     * @return string
     */
    public function getIsoName() : string
    {
    }
    /**
     * Get the short name of the language in this language.
     *
     * @return string
     */
    public function getNativeName() : string
    {
    }
    /**
     * Get a string with short ISO name, region in parentheses if applicable, variant in parentheses if applicable.
     *
     * @return string
     */
    public function getIsoDescription()
    {
    }
    /**
     * Get a string with short native name, region in parentheses if applicable, variant in parentheses if applicable.
     *
     * @return string
     */
    public function getNativeDescription()
    {
    }
    /**
     * Get a string with long ISO name, region in parentheses if applicable, variant in parentheses if applicable.
     *
     * @return string
     */
    public function getFullIsoDescription()
    {
    }
    /**
     * Get a string with long native name, region in parentheses if applicable, variant in parentheses if applicable.
     *
     * @return string
     */
    public function getFullNativeDescription()
    {
    }
    /**
     * Returns the original locale ID.
     *
     * @return string
     */
    public function __toString()
    {
    }
    /**
     * Get a string with short ISO name, region in parentheses if applicable, variant in parentheses if applicable.
     *
     * @return string
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
    }
}