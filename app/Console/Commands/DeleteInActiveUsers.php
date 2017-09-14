<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\models\User;
use DB;

class DeleteInActiveUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'DeleteInActiveUsers:deleteusers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete inactive users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        User::with(['token' => function ($query) {
            $query->where('status', 0)
        }])->get();

        //DB::table('users')->delete(16);
    }
}
