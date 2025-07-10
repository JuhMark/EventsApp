<?php

namespace App\Providers;

use App\Models\Event;
use App\Models\Subscriber;
use App\Policies\SubscriberPolicy;
use App\Policies\EventPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    protected $policies = [
        Subscriber::class => SubscriberPolicy::class,
        Event::class => EventPolicy::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        foreach ($this->policies as $model => $policy) {
            $definedPolicies = get_class_methods($policy);

            foreach ($definedPolicies as $method) {
                Gate::define($method, [$policy, $method]);
            }
        }
    }
}
