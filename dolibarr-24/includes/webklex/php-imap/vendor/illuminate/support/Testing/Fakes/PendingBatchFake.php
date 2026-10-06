<?php

namespace Illuminate\Support\Testing\Fakes;

class PendingBatchFake extends \Illuminate\Bus\PendingBatch
{
    /**
     * The fake bus instance.
     *
     * @var \Illuminate\Support\Testing\Fakes\BusFake
     */
    protected $bus;
    /**
     * Create a new pending batch instance.
     *
     * @param  \Illuminate\Support\Testing\Fakes\BusFake  $bus
     * @param  \Illuminate\Support\Collection  $jobs
     * @return void
     */
    public function __construct(\Illuminate\Support\Testing\Fakes\BusFake $bus, \Illuminate\Support\Collection $jobs)
    {
    }
    /**
     * Dispatch the batch.
     *
     * @return \Illuminate\Bus\Batch
     */
    public function dispatch()
    {
    }
}