<?php

namespace Carbon\Traits;

trait IntervalStep
{
    /**
     * Step to apply instead of a fixed interval to get the new date.
     *
     * @var Closure|null
     */
    protected $step;
    /**
     * Get the dynamic step in use.
     *
     * @return Closure
     */
    public function getStep() : ?\Closure
    {
    }
    /**
     * Set a step to apply instead of a fixed interval to get the new date.
     *
     * Or pass null to switch to fixed interval.
     *
     * @param Closure|null $step
     */
    public function setStep(?\Closure $step) : void
    {
    }
    /**
     * Take a date and apply either the step if set, or the current interval else.
     *
     * The interval/step is applied negatively (typically subtraction instead of addition) if $negated is true.
     *
     * @param DateTimeInterface $dateTime
     * @param bool              $negated
     *
     * @return CarbonInterface
     */
    public function convertDate(\DateTimeInterface $dateTime, bool $negated = false) : \Carbon\CarbonInterface
    {
    }
    /**
     * Convert DateTimeImmutable instance to CarbonImmutable instance and DateTime instance to Carbon instance.
     *
     * @param DateTimeInterface $dateTime
     *
     * @return Carbon|CarbonImmutable
     */
    private function resolveCarbon(\DateTimeInterface $dateTime)
    {
    }
}