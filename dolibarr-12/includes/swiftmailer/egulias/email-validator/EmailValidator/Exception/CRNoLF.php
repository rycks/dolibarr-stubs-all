<?php

namespace Egulias\EmailValidator\Exception;

class CRNoLF extends \Egulias\EmailValidator\Exception\InvalidEmail
{
    const CODE = 150;
    const REASON = "Missing LF after CR";
}