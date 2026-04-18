<?php

namespace Egulias\EmailValidator\Warning;

class NoDNSMXRecord extends \Egulias\EmailValidator\Warning\Warning
{
    const CODE = 6;
    public function __construct()
    {
    }
}