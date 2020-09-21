<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded=[];

    public function wallet(){
        return $this->belongsTo(Wallet::class);
    }
}
