<?php

namespace DebugBar\DataFormatter;

class DataFormatter implements \DebugBar\DataFormatter\DataFormatterInterface
{
    public function formatVar($data)
    {
    }
    public function formatDuration($seconds)
    {
    }
    public function formatBytes($size, $precision = 2)
    {
    }
    /**
     * lightweight version of Kint::dump(). Uses whitespace for formatting instead of html
     * sadly not DRY yet
     *
     * Extracted from Kint.class.php in raveren/kint, https://github.com/raveren/kint
     * Copyright (c) 2013 Rokas Šleinius (raveren@gmail.com)
     *
     * @param mixed $var
     * @param int $level
     *
     * @return string
     */
    protected function kintLite(&$var, $level = 0)
    {
    }
}