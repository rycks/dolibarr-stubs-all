<?php

namespace Carbon\Doctrine;

class DateTimeImmutableType extends \Doctrine\DBAL\Types\VarDateTimeImmutableType implements \Carbon\Doctrine\CarbonDoctrineType
{
    /** @use CarbonTypeConverter<CarbonImmutable> */
    use \Carbon\Doctrine\CarbonTypeConverter;
    /**
     * @return class-string<CarbonImmutable>
     */
    protected function getCarbonClassName() : string
    {
    }
}