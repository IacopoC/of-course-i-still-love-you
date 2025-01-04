<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ClearDatabaseData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:clear-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Periodically clears data from the messages and updowns tables';

    /**
     * Execute the console command.
     */
    public function handle()
    {
         $oneMonthAgo = Carbon::now()->subMonth();

                try {
                   $deletedMessages = DB::table('messages')->where('created_at', '<', $oneMonthAgo)->delete();
                   $deletedUpdowns = DB::table('updowns')->where('created_at', '<', $oneMonthAgo)->delete();

                   $this->info("Deleted " . $deletedMessages . " records from the messages table.");
                   $this->info("Deleted " . $deletedUpdowns . " records from the updowns table.");

               } catch (\Exception $e) {
                    $this->error("Error while deleting data: " . $e->getMessage());
                }
    }
}
