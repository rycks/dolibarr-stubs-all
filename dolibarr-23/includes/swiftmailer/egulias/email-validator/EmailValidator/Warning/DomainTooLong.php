<?php

namespace Egulias\EmailValidator\Warning;

class DomainTooLong extends \Egulias\EmailValidator\Warning\Warning
{
    const CODE = 255;
    public function __construct()
    {
    }
}