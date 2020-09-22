<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded=[];

    const STATUS_ENTER = 'enter';
    const STATUS_CREATE_DEPOSIT = 'create_deposit';
    const STATUS_DEPOSIT_CLOSED = 'deposit_close';

    public function wallet(){
        return $this->belongsTo(Wallet::class);
    }
}
