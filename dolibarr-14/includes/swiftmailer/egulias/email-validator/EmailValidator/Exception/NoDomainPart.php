<?php

namespace Egulias\EmailValidator\Exception;

class NoDomainPart extends \Egulias\EmailValidator\Exception\InvalidEmail
{
    const CODE = 131;
    const REASON = "No Domain part";
}