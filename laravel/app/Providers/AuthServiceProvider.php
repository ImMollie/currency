<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Currency;
use App\Policies\CurrencyPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Models\Currency' => 'App\Policies\CurrencyPolicy',
        Currency::class => CurrencyPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
