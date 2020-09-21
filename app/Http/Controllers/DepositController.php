<?php

namespace App\Http\Controllers;

use App\User;
use App\Wallet;
use App\Deposit;
use Illuminate\Http\Request;
use App\Events\UserCreatedDeposit;

class DepositController extends Controller
{
    public function create(User $user, Wallet $wallet)
    {
        // dd($wallet);
        return view('deposits.create', compact('user', 'wallet'));
    }
    public function store(Request $request)
    {

        $userDeposit=Deposit::create([
            'invested' => $request['invested'],
            'wallet_id' => $request['wallet_id'],
            'user_id' => auth()->user()->id,
        ]);
           $event=event(new UserCreatedDeposit($userDeposit));

        return redirect()->route('user.cabinete', auth()->user());
    }
}
