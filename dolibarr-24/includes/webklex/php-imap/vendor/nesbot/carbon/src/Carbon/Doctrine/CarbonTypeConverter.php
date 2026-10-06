<?php

namespace Carbon\Doctrine;

/**
 * @template T of CarbonInterface
 */
trait CarbonTypeConverter
{
    /**
     * @return class-string<T>
     */
    protected function getCarbonClassName() : string
    {
    }
    /**
     * @return string
     */
    public function getSQLDeclaration(array $fieldDeclaration, \Doctrine\DBAL\Platforms\AbstractPlatform $platform)
    {
    }
    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     *
     * @return T|null
     */
    public function convertToPHPValue($value, \Doctrine\DBAL\Platforms\AbstractPlatform $platform)
    {
    }
    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     *
     * @return string|null
     */
    public function convertToDatabaseValue($value, \Doctrine\DBAL\Platforms\AbstractPlatform $platform)
    {
    }
}