<?php

namespace Egulias\EmailValidator\Warning;

class QuotedPart extends \Egulias\EmailValidator\Warning\Warning
{
    const CODE = 36;
    public function __construct($prevToken, $postToken)
    {
    }
}