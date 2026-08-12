<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Commands yang dibuat aplikasi.
     */
    protected $commands = [
        //
    ];


    /**
     * Schedule aplikasi.
     */
    protected function schedule(Schedule $schedule): void
    {
        //
    }


    /**
     * Register commands aplikasi.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}