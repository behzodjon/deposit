<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $guarded = [];

    const PERCENT = '0.2';

    const STATUS_OPEN = 'open';
    const STATUS_CLOSE = 'closed';

    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }
}
