<?php

namespace Mike42\Escpos;

/**
 * Store compatibility information about one printer.
 */
class CapabilityProfile
{
    /**
     *
     * @var string $codePageCacheKey
     *  Hash of the code page data structure, to identify it for caching.
     */
    protected $codePageCacheKey;
    /**
     *
     * @var array $codePages
     *  Associtive array of CodePage objects, indicating which encodings the printer supports.
     */
    protected $codePages;
    /**
     *
     * @var array $colors
     *  Not used.
     */
    protected $colors;
    /**
     *
     * @var array $features
     *  Feature values.
     */
    protected $features;
    /**
     *
     * @var array $fonts
     *  Not used
     */
    protected $fonts;
    /**
     *
     * @var array $media
     *  Not used
     */
    protected $media;
    /**
     *
     * @var string $name
     *  Name of the profile, including model number.
     */
    protected $name;
    /**
     *
     * @var string $notes
     *  Notes on the profile, null if not set.
     */
    protected $notes;
    /**
     *
     * @var string $profileId
     *  ID of the profile.
     */
    protected $profileId;
    /**
     * @var string $vendor
     *  Name of manufacturer.
     */
    protected $vendor;
    /**
     *
     * @var array $encodings
     *  Data structure containing encodings loaded from disk, null if not loaded yet.
     */
    protected static $encodings = null;
    /**
     *
     * @var array $profiles
     *  Data structure containing profiles loaded from disk, null if not loaded yet.
     */
    protected static $profiles = null;
    /**
     * Construct new CapabilityProfile.
     * The encoding data must be loaded from disk before calling.
     *
     * @param string $profileId
     *            ID of the profile
     * @param array $profileData
     *            Profile data from disk.
     */
    protected function __construct($profileId, array $profileData)
    {
    }
    /**
     *
     * @return string Hash of the code page data structure, to identify it for caching.
     */
    public function getCodePageCacheKey()
    {
    }
    /**
     *
     * @return array Associtive array of CodePage objects, indicating which encodings the printer supports.
     */
    public function getCodePages()
    {
    }
    /**
     *
     * @param string $featureName
     *            Name of the feature to retrieve.
     * @throws \InvalidArgumentException Where the feature does not exist.
     *         The exception will contain suggestions for the closest-named features.
     * @return mixed feature value.
     */
    public function getFeature($featureName)
    {
    }
    /**
     *
     * @return string ID of the profile.
     */
    public function getId()
    {
    }
    /**
     *
     * @return string Name of the printer.
     */
    public function getName()
    {
    }
    /**
     *
     * @return boolean True if Barcode B command is supported, false otherwise
     */
    public function getSupportsBarcodeB()
    {
    }
    /**
     *
     * @return boolean True if Bit Image Raster command is supported, false otherwise
     */
    public function getSupportsBitImageRaster()
    {
    }
    /**
     *
     * @return boolean True if Graphics command is supported, false otherwise
     */
    public function getSupportsGraphics()
    {
    }
    /**
     *
     * @return boolean True if PDF417 code command is supported, false otherwise
     */
    public function getSupportsPdf417Code()
    {
    }
    /**
     *
     * @return boolean True if QR code command is supported, false otherwise
     */
    public function getSupportsQrCode()
    {
    }
    /**
     *
     * @return boolean True if Star mode commands are supported, false otherwise
     */
    public function getSupportsStarCommands()
    {
    }
    /**
     *
     * @return string Vendor of this printer.
     */
    public function getVendor()
    {
    }
    /**
     *
     * @param string $featureName
     *            Feature that does not exist
     * @return array Three most similar feature names that do exist.
     */
    protected function suggestFeatureName($featureName)
    {
    }
    /**
     *
     * @return array Names of all profiles that exist.
     */
    public static function getProfileNames()
    {
    }
    /**
     * Retrieve the CapabilityProfile with the given ID.
     *
     * @param string $profileName
     *            The ID of the profile to load.
     * @throws InvalidArgumentException Where the ID does not exist. Some similarly-named profiles will be suggested in the Exception text.
     * @return CapabilityProfile The CapabilityProfile that was requested.
     */
    public static function load($profileName)
    {
    }
    /**
     * Ensure that the capabilities.json data file has been loaded.
     */
    protected static function loadCapabilitiesDataFile()
    {
    }
    /**
     * Return choices with smallest edit distance to an invalid input.
     *
     * @param string $input
     *            Input that is not a valid choice
     * @param array $choices
     *            Array of valid choices.
     * @param int $num
     *            Number of suggestions to return
     */
    public static function suggestNearest($input, array $choices, $num)
    {
    }
    /**
     *
     * @param string $profileName
     *            profile name that does not exist
     * @return array Three similar profile names that do exist, plus 'simple' and 'default' for good measure.
     */
    protected static function suggestProfileName($profileName)
    {
    }
}