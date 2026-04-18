<?php

namespace Egulias\EmailValidator\Exception;

class ConsecutiveAt extends \Egulias\EmailValidator\Exception\InvalidEmail
{
    const CODE = 128;
    const REASON = "Consecutive AT";
}