<?php

namespace App\Providers;

use App\Events\UserFilledWallet;
use App\Events\UserCreatedDeposit;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        UserFilledWallet::class => [
            \App\Listeners\CommitTransactionDatabse::class,
        ],
        UserCreatedDeposit::class => [
            \App\Listeners\CommitDepositTransactionDatabse::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
