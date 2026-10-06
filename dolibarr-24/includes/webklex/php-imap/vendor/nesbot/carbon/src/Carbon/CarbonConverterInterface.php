<?php

namespace Carbon;

interface CarbonConverterInterface
{
    public function convertDate(\DateTimeInterface $dateTime, bool $negated = false) : \Carbon\CarbonInterface;
}