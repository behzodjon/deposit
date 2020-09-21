<?php

namespace App\Http\Controllers;

use App\User;
use App\Wallet;
use Illuminate\Http\Request;
use App\Events\UserFilledWallet;

class WalletController extends Controller
{
    public function create(User $user)
    {
        return view('wallet.create', compact('user'));
    }
    public function store(Request $request)
    {
        $userWallet=Wallet::create([
            'balance' => $request['balance'],
            'user_id' => auth()->user()->id,
        ]);
       $event=event(new UserFilledWallet($userWallet));
// dd($event);
        return redirect()->route('user.cabinete',auth()->user());
    }
}
