<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::command('emails:send Taylor --force')->daily();

Schedule::command('backup:clean')->daily()->at('01:00');
# backup the DB at 15 minutes past the hour
Schedule::command('backup:run --only-db')->hourlyAt(15);
# backup the files every 6 hours at 25 m
Schedule::command('backup:run --only-files')->everySixHours(25);
