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
    protected $description = 'Cancella periodicamente i dati dalle tabelle messages e updowns';

    /**
     * Execute the console command.
     */
    public function handle()
    {
         $oneMonthAgo = Carbon::now()->subMonth();

                try {
                   $deletedMessages = DB::table('messages')->where('created_at', '<', $oneMonthAgo)->delete();
                   $deletedUpdowns = DB::table('updowns')->where('created_at', '<', $oneMonthAgo)->delete();

                   $this->info("Cancellati " . $deletedMessages . " record dalla tabella messages.");
                   $this->info("Cancellati " . $deletedUpdowns . " record dalla tabella updowns.");

               } catch (\Exception $e) {
                    $this->error("Errore durante la cancellazione dei dati: " . $e->getMessage());
                }
    }
}
