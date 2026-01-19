<?php

namespace Carbon\Doctrine;

class DateTimeType extends \Doctrine\DBAL\Types\VarDateTimeType implements \Carbon\Doctrine\CarbonDoctrineType
{
    /** @use CarbonTypeConverter<Carbon> */
    use \Carbon\Doctrine\CarbonTypeConverter;
}