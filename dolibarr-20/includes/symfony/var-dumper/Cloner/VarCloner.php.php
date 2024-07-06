<?php

namespace Symfony\Component\VarDumper\Cloner;

/**
 * @author Nicolas Grekas <p@tchwork.com>
 */
class VarCloner extends \Symfony\Component\VarDumper\Cloner\AbstractCloner
{
    private static $hashMask = 0;
    private static $hashOffset = 0;
    /**
     * {@inheritdoc}
     */
    protected function doClone($var)
    {
    }
    private static function initHashMask()
    {
    }
}