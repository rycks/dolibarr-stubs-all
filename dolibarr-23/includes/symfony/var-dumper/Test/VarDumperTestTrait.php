<?php

namespace Symfony\Component\VarDumper\Test;

/**
 * @author Nicolas Grekas <p@tchwork.com>
 */
trait VarDumperTestTrait
{
    public function assertDumpEquals($dump, $data, $message = '')
    {
    }
    public function assertDumpMatchesFormat($dump, $data, $message = '')
    {
    }
    protected function getDump($data, $key = null)
    {
    }
}