<?php

namespace App\Console\Commands;

use App\Deposit;
use App\Jobs\UserDeposit;
use App\User;
use App\Wallet;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class AccrueDeposit extends Command
{

    public $users;
    public $wallets;
    public $deposits;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'accrue:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->users = User::all();
        $this->wallets = Wallet::all();
        $this->deposits = Deposit::all();

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Running ...');

        foreach ($this->deposits as $deposit) {
            $deposit->update([
                'invested' => $deposit->invested * 20 / 100
            ]);
            Log::info('Deposit' . $deposit->invested * 20 / 100);
        }
        $this->info('Demo:Cron Cummand Run successfully!');
    }
}
