<?php

namespace Illuminate\Support;

class AggregateServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * The provider class names.
     *
     * @var array
     */
    protected $providers = [];
    /**
     * An array of the service provider instances.
     *
     * @var array
     */
    protected $instances = [];
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
    }
    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
    }
}