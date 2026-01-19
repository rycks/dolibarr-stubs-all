<?php

namespace Carbon\Traits;

trait DeprecatedProperties
{
    /**
     * the day of week in current locale LC_TIME
     *
     * @var string
     *
     * @deprecated It uses OS language package and strftime() which is deprecated since PHP 8.1.
     *             Use ->isoFormat('MMM') instead.
     *             Deprecated since 2.55.0
     */
    public $localeDayOfWeek;
    /**
     * the abbreviated day of week in current locale LC_TIME
     *
     * @var string
     *
     * @deprecated It uses OS language package and strftime() which is deprecated since PHP 8.1.
     *             Use ->isoFormat('dddd') instead.
     *             Deprecated since 2.55.0
     */
    public $shortLocaleDayOfWeek;
    /**
     * the month in current locale LC_TIME
     *
     * @var string
     *
     * @deprecated It uses OS language package and strftime() which is deprecated since PHP 8.1.
     *             Use ->isoFormat('ddd') instead.
     *             Deprecated since 2.55.0
     */
    public $localeMonth;
    /**
     * the abbreviated month in current locale LC_TIME
     *
     * @var string
     *
     * @deprecated It uses OS language package and strftime() which is deprecated since PHP 8.1.
     *             Use ->isoFormat('MMMM') instead.
     *             Deprecated since 2.55.0
     */
    public $shortLocaleMonth;
}