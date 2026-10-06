<?php

namespace Carbon\Doctrine;

class CarbonImmutableType extends \Carbon\Doctrine\DateTimeImmutableType implements \Carbon\Doctrine\CarbonDoctrineType
{
    /**
     * {@inheritdoc}
     *
     * @return string
     */
    public function getName()
    {
    }
    /**
     * {@inheritdoc}
     *
     * @return bool
     */
    public function requiresSQLCommentHint(\Doctrine\DBAL\Platforms\AbstractPlatform $platform)
    {
    }
}