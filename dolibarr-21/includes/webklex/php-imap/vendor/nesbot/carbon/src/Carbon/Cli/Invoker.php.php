<?php

namespace Carbon\Cli;

class Invoker
{
    public const CLI_CLASS_NAME = 'Carbon\\Cli';
    protected function runWithCli(string $className, array $parameters) : bool
    {
    }
    public function __invoke(...$parameters) : bool
    {
    }
}