<?php

namespace Egulias\EmailValidator\Warning;

class QuotedString extends \Egulias\EmailValidator\Warning\Warning
{
    const CODE = 11;
    public function __construct($prevToken, $postToken)
    {
    }
}