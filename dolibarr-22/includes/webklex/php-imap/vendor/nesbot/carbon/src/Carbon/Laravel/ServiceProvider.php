<?php

namespace Carbon\Laravel;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /** @var callable|null */
    protected $appGetter = null;
    /** @var callable|null */
    protected $localeGetter = null;
    public function setAppGetter(?callable $appGetter) : void
    {
    }
    public function setLocaleGetter(?callable $localeGetter) : void
    {
    }
    public function boot()
    {
    }
    public function updateLocale()
    {
    }
    public function register()
    {
    }
    protected function getLocale()
    {
    }
    protected function getApp()
    {
    }
    protected function getGlobalApp(...$args)
    {
    }
    protected function isEventDispatcher($instance)
    {
    }
}