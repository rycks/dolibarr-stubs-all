<?php

$detect = new \Mobile_Detect();
$json = array(
    // The current version of Mobile Detect class that
    // is being exported.
    'version' => $detect->getScriptVersion(),
    // All headers that trigger 'isMobile' to be 'true',
    // before reaching the User-Agent match detection.
    'headerMatch' => $detect->getMobileHeaders(),
    // All possible User-Agent headers.
    'uaHttpHeaders' => $detect->getUaHttpHeaders(),
    // All the regexes that trigger 'isMobile' or 'isTablet'
    // to be true.
    'uaMatch' => array(
        // If match is found, triggers 'isMobile' to be true.
        'phones' => $detect->getPhoneDevices(),
        // Triggers 'isTablet' to be true.
        'tablets' => $detect->getTabletDevices(),
        // If match is found, triggers 'isMobile' to be true.
        'browsers' => $detect->getBrowsers(),
        // If match is found, triggers 'isMobile' to be true.
        'os' => $detect->getOperatingSystems(),
        // Various utilities. To be further discussed.
        'utilities' => $detect->getUtilities(),
    ),
);
$fileName = \dirname(__FILE__) . '/../Mobile_Detect.json';