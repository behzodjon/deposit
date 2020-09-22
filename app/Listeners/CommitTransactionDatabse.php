<?php

namespace App\Listeners;

use App\Events\UserFilledWallet;
use App\Transaction;

class CommitTransactionDatabse {
    /**
     * Handle the event.
     *
     * @param UserFilledWallet $event
     * @return void
     */
    public function handle(UserFilledWallet $event) {

        Transaction::create([
            'type' => Transaction::STATUS_ENTER,
            'user_id' => auth()->user()->id,
            'wallet_id' => $event->userWallet->id,
            'deposit_id' => null,
            'amount' => $event->userWallet->balance,
        ]);
    }
}
