<?php

namespace Egulias\EmailValidator\Warning;

abstract class Warning
{
    const CODE = 0;
    /**
     * @var string
     */
    protected $message = '';
    /**
     * @var int
     */
    protected $rfcNumber = 0;
    /**
     * @return string
     */
    public function message()
    {
    }
    /**
     * @return int
     */
    public function code()
    {
    }
    /**
     * @return int
     */
    public function RFCNumber()
    {
    }
    public function __toString()
    {
    }
}