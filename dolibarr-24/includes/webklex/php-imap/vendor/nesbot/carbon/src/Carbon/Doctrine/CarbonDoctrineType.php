<?php

namespace Carbon\Doctrine;

interface CarbonDoctrineType
{
    public function getSQLDeclaration(array $fieldDeclaration, \Doctrine\DBAL\Platforms\AbstractPlatform $platform);
    public function convertToPHPValue($value, \Doctrine\DBAL\Platforms\AbstractPlatform $platform);
    public function convertToDatabaseValue($value, \Doctrine\DBAL\Platforms\AbstractPlatform $platform);
}