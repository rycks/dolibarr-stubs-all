<?php

/**
 * Bootstrap for PhpSpreadsheet classes.
 */
// This sucks, but we have to try to find the composer autoloader
$paths = [
    __DIR__ . '/../vendor/autoload.php',
    // In case PhpSpreadsheet is cloned directly
    __DIR__ . '/../../../autoload.php',
];