<?php

namespace Illuminate\Support\Testing\Fakes;

class NotificationFake implements \Illuminate\Contracts\Notifications\Dispatcher, \Illuminate\Contracts\Notifications\Factory
{
    use \Illuminate\Support\Traits\Macroable, \Illuminate\Support\Traits\ReflectsClosures;
    /**
     * All of the notifications that have been sent.
     *
     * @var array
     */
    protected $notifications = [];
    /**
     * Locale used when sending notifications.
     *
     * @var string|null
     */
    public $locale;
    /**
     * Assert if a notification was sent on-demand based on a truth-test callback.
     *
     * @param  string|\Closure  $notification
     * @param  callable|null  $callback
     * @return void
     *
     * @throws \Exception
     */
    public function assertSentOnDemand($notification, $callback = null)
    {
    }
    /**
     * Assert if a notification was sent based on a truth-test callback.
     *
     * @param  mixed  $notifiable
     * @param  string|\Closure  $notification
     * @param  callable|null  $callback
     * @return void
     *
     * @throws \Exception
     */
    public function assertSentTo($notifiable, $notification, $callback = null)
    {
    }
    /**
     * Assert if a notification was sent on-demand a number of times.
     *
     * @param  string  $notification
     * @param  int  $times
     * @return void
     */
    public function assertSentOnDemandTimes($notification, $times = 1)
    {
    }
    /**
     * Assert if a notification was sent a number of times.
     *
     * @param  mixed  $notifiable
     * @param  string  $notification
     * @param  int  $times
     * @return void
     */
    public function assertSentToTimes($notifiable, $notification, $times = 1)
    {
    }
    /**
     * Determine if a notification was sent based on a truth-test callback.
     *
     * @param  mixed  $notifiable
     * @param  string|\Closure  $notification
     * @param  callable|null  $callback
     * @return void
     *
     * @throws \Exception
     */
    public function assertNotSentTo($notifiable, $notification, $callback = null)
    {
    }
    /**
     * Assert that no notifications were sent.
     *
     * @return void
     */
    public function assertNothingSent()
    {
    }
    /**
     * Assert the total amount of times a notification was sent.
     *
     * @param  string  $notification
     * @param  int  $expectedCount
     * @return void
     */
    public function assertSentTimes($notification, $expectedCount)
    {
    }
    /**
     * Assert the total amount of times a notification was sent.
     *
     * @param  int  $expectedCount
     * @param  string  $notification
     * @return void
     *
     * @deprecated Use the assertSentTimes method instead
     */
    public function assertTimesSent($expectedCount, $notification)
    {
    }
    /**
     * Get all of the notifications matching a truth-test callback.
     *
     * @param  mixed  $notifiable
     * @param  string  $notification
     * @param  callable|null  $callback
     * @return \Illuminate\Support\Collection
     */
    public function sent($notifiable, $notification, $callback = null)
    {
    }
    /**
     * Determine if there are more notifications left to inspect.
     *
     * @param  mixed  $notifiable
     * @param  string  $notification
     * @return bool
     */
    public function hasSent($notifiable, $notification)
    {
    }
    /**
     * Get all of the notifications for a notifiable entity by type.
     *
     * @param  mixed  $notifiable
     * @param  string  $notification
     * @return array
     */
    protected function notificationsFor($notifiable, $notification)
    {
    }
    /**
     * Send the given notification to the given notifiable entities.
     *
     * @param  \Illuminate\Support\Collection|array|mixed  $notifiables
     * @param  mixed  $notification
     * @return void
     */
    public function send($notifiables, $notification)
    {
    }
    /**
     * Send the given notification immediately.
     *
     * @param  \Illuminate\Support\Collection|array|mixed  $notifiables
     * @param  mixed  $notification
     * @param  array|null  $channels
     * @return void
     */
    public function sendNow($notifiables, $notification, array $channels = null)
    {
    }
    /**
     * Get a channel instance by name.
     *
     * @param  string|null  $name
     * @return mixed
     */
    public function channel($name = null)
    {
    }
    /**
     * Set the locale of notifications.
     *
     * @param  string  $locale
     * @return $this
     */
    public function locale($locale)
    {
    }
}