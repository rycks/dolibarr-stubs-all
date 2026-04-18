<?php

namespace Carbon\PHPStan;

abstract class LazyMacro extends \Carbon\PHPStan\AbstractReflectionMacro
{
    /**
     * {@inheritdoc}
     *
     * @return string|false
     */
    public function getFileName()
    {
    }
    /**
     * {@inheritdoc}
     *
     * @return int|false
     */
    public function getStartLine()
    {
    }
    /**
     * {@inheritdoc}
     *
     * @return int|false
     */
    public function getEndLine()
    {
    }
}