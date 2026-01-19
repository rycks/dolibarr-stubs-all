<?php

namespace Symfony\Component\VarDumper\Caster;

/**
 * Represents a file or a URL.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
class LinkStub extends \Symfony\Component\VarDumper\Caster\ConstStub
{
    public function __construct($label, $line = 0, $href = null)
    {
    }
}