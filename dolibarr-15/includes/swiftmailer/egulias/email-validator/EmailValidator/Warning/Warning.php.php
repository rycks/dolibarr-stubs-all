<?php

namespace Egulias\EmailValidator\Warning;

abstract class Warning
{
    const CODE = 0;
    protected $message;
    protected $rfcNumber;
    public function message()
    {
    }
    public function code()
    {
    }
    public function RFCNumber()
    {
    }
    public function __toString()
    {
    }
}