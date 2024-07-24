<?php

namespace App\Filament\Widgets;

use App\Actions\Jetstream\DeleteTeam;
use App\Models\Victim;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class VictimStatsOverview extends BaseWidget
{

    protected static ?string $pollingInterval = '300s';
    protected function getStats(): array
    {
        return [
            Stat::make('Today', Victim::where('confirmed', true)->count()),
            // TODO: add a computation to filter in the last 24 hours
            Stat::make('Last 24 hours', Victim::where('confirmed', true)->count()),
            // TODO: add a computation to filter in the last 48 hours
            Stat::make('Last 48 hours', Victim::where('confirmed', true)->count()),
        ];
    }
}
