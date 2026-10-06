<?php

namespace Egulias\EmailValidator\Exception;

class NoLocalPart extends \Egulias\EmailValidator\Exception\InvalidEmail
{
    const CODE = 130;
    const REASON = "No local part";
}