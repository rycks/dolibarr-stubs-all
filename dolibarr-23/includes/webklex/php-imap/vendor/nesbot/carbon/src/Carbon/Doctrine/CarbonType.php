<?php

namespace Carbon\Doctrine;

class CarbonType extends \Carbon\Doctrine\DateTimeType implements \Carbon\Doctrine\CarbonDoctrineType
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