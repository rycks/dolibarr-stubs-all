<?php

namespace DebugBar\DataCollector;

/**
 * Indicates that a DataCollector provides some assets
 */
interface AssetProvider
{
    /**
     * Returns an array with the following keys:
     *  - base_path
     *  - base_url
     *  - css: an array of filenames
     *  - js: an array of filenames
     *
     * @return array
     */
    function getAssets();
}