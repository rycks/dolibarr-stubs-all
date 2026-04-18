<?php

namespace Illuminate\Support\Testing\Fakes;

class PendingChainFake extends \Illuminate\Foundation\Bus\PendingChain
{
    /**
     * The fake bus instance.
     *
     * @var \Illuminate\Support\Testing\Fakes\BusFake
     */
    protected $bus;
    /**
     * Create a new pending chain instance.
     *
     * @param  \Illuminate\Support\Testing\Fakes\BusFake  $bus
     * @param  mixed  $job
     * @param  array  $chain
     * @return void
     */
    public function __construct(\Illuminate\Support\Testing\Fakes\BusFake $bus, $job, $chain)
    {
    }
    /**
     * Dispatch the job with the given arguments.
     *
     * @return \Illuminate\Foundation\Bus\PendingDispatch
     */
    public function dispatch()
    {
    }
}