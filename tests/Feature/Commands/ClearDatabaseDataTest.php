<?php

namespace Tests\Feature\Commands;

use App\Console\Commands\ClearDatabaseData;
use App\Models\Message;
use App\Models\Updown;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ClearDatabaseDataTest extends TestCase
{
    use RefreshDatabase;

    public function test_clear_database_data_command()
    {
        $oneMonthAgo = Carbon::now()->subMonth();
        $recentDate = Carbon::now()->subDays(10);

        $messagesToDelete = Message::factory()->count(3)->create(['created_at' => $oneMonthAgo->copy()->subDay()]);
        Message::factory()->count(2)->create(['created_at' => $recentDate]);
        $updownsToDelete = Updown::factory()->count(5)->create(['created_at' => $oneMonthAgo->copy()->subDays(2)]);
        Updown::factory()->count(1)->create(['created_at' => $recentDate]);

        $this->artisan(ClearDatabaseData::class)
            ->expectsOutputToContain(sprintf('Deleted %d records from the messages table.', $messagesToDelete->count()))
            ->expectsOutputToContain(sprintf('Deleted %d records from the updowns table.', $updownsToDelete->count()));

        $this->assertDatabaseCount('messages', 2);
        $this->assertDatabaseCount('updowns', 1);
    }

    public function test_clear_database_data_command_handles_exceptions()
    {
        DB::shouldReceive('table')
            ->with('messages')
            ->andThrow(new \Exception('Simulated database error'));

        $this->artisan(ClearDatabaseData::class)
            ->expectsOutputToContain('Error while deleting data: Simulated database error');

    }
}
