<?php

namespace Carbon\PHPStan;

abstract class LazyMacro extends \Carbon\PHPStan\AbstractReflectionMacro
{
    /**
     * {@inheritdoc}
     */
    public function getFileName() : ?string
    {
    }
    /**
     * {@inheritdoc}
     */
    public function getStartLine() : ?int
    {
    }
    /**
     * {@inheritdoc}
     */
    public function getEndLine() : ?int
    {
    }
}