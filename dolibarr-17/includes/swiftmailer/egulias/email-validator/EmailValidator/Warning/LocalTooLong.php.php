<?php

namespace Egulias\EmailValidator\Warning;

class LocalTooLong extends \Egulias\EmailValidator\Warning\Warning
{
    const CODE = 64;
    const LOCAL_PART_LENGTH = 64;
    public function __construct()
    {
    }
}