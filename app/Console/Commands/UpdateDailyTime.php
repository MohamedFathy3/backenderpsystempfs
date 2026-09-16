<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Ticket;

class UpdateDailyTime extends Command
{
    protected $signature = 'tickets:update-daily-time';
    protected $description = 'Update daily_time for all tickets';

    public function handle()
    {
        $tickets = Ticket::all();
        foreach ($tickets as $ticket) {
            if ($ticket->created_at) {
                $dailyTime = $ticket->created_at->diffInMinutes(now());
                $ticket->update(['daily_time' => $dailyTime]);

                // فقط لو الحالة open نتحقق من الوقت
                if ($ticket->status == 'open') {
                    // لو لسه ما عداش الوقت المسموح
                    $dailyStatus = $dailyTime < $ticket->ata_time ? true : false;
                } else {
                    // لو مش open نخليه زي ما هو أو نخليه null حسب رغبتك
                    $dailyStatus = $ticket->daily_status;
                }

                $ticket->update(['daily_status' => $dailyStatus]);
            }
        }
        $this->info('Daily time updated for all tickets.');
    }
}
