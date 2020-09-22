<?php /** @noinspection ALL */

namespace App\Console\Commands;

use App\Deposit;
use App\Jobs\UserDeposit;
use App\Transaction;
use App\User;
use App\Wallet;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class AccrueDeposit extends Command {

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
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {

        $this->info('Running ...');

        $deposits = Deposit::whereStatus(Deposit::STATUS_OPEN)->with('wallet')->get();

        $deposits->each(function (Deposit $deposit) {

            $deposit->wallet()
                ->increment('balance', $deposit->invested * Deposit::PERCENT);

            $deposit->times += 1;

            if ($deposit->times == 10) {
                $deposit->status = Deposit::STATUS_CLOSE;

                //TODO: Put in event
                Transaction::create([
                    'user_id' => $deposit->user_id,
                    'wallet_id' => $deposit->wallet_id,
                    'type' => Transaction::STATUS_DEPOSIT_CLOSED,
                    'amount' => $deposit->invested,
                ]);
            }

            $deposit->save();
        });
    }
}
