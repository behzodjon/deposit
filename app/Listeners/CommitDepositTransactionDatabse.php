<?php

namespace App\Listeners;

use App\Events\UserCreatedDeposit;
use App\Transaction;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CommitDepositTransactionDatabse
{

    /**
     * Handle the event.
     *
     * @param  UserCreatedDeposit  $event
     * @return void
     */
    public function handle(UserCreatedDeposit $event)
    {

        Transaction::create([
            'type' => 'create_deposit',
            'user_id' => auth()->user()->id,
            'wallet_id' => $event->userDeposit->wallet_id,
            'deposit_id' => $event->userDeposit->id,
            'amount' => $event->userDeposit->invested,
        ]);
    }
}
