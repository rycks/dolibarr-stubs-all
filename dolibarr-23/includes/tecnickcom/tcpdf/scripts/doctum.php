<?php

$rootDir = __DIR__ . '/../';
$iterator = \Symfony\Component\Finder\Finder::create()->files()->name('*.php')->notPath('cache')->notPath('build')->notPath('fonts')->notPath('vendor')->notPath('tests')->notPath('examples')->in($rootDir);