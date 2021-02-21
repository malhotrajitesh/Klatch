<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class adBlock extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ad:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This Block Ad Daily basis';

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
        DB::table('ad')->whereDate('exp_date', '<', now())->update(['ad_status' => 'Expired']);
        echo "Ad Block Successfully";
    }
}
