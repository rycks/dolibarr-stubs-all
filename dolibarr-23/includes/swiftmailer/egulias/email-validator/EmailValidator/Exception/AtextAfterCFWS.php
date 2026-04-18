<?php

namespace Egulias\EmailValidator\Exception;

class AtextAfterCFWS extends \Egulias\EmailValidator\Exception\InvalidEmail
{
    const CODE = 133;
    const REASON = "ATEXT found after CFWS";
}