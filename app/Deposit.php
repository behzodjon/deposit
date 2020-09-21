<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $guarded = [];

    public function wallet()
    {
        return $this->belongsTo(Deposit::class);
    }
}
