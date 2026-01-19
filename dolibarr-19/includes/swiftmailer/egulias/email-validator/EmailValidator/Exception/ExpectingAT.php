<?php

namespace Egulias\EmailValidator\Exception;

class ExpectingAT extends \Egulias\EmailValidator\Exception\InvalidEmail
{
    const CODE = 202;
    const REASON = "Expecting AT '@' ";
}