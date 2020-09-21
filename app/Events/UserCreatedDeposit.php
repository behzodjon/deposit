<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserCreatedDeposit
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $userDeposit;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($userDeposit)
    {
        return $this->userDeposit=$userDeposit;
    }

}
