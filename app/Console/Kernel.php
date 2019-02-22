<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
     //   $schedule->call('App\Http\Controllers\explorer_controller@index')->everyMinute();
     //   $schedule->call('App\Http\Controllers\fetcher_controller@index')->everyMinute();
     //   $schedule->call('App\Http\Controllers\error_controller@error_monitor')->everyThirtyMinutes();
       // $schedule->call('App\includes\backupUtility\backup')->everyFiveMinutes();
        $schedule->call('App\Http\Controllers\test_lib@backup')->everyMinute();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
