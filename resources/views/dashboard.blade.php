<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                @livewire(\App\Filament\Widgets\VictimStatsOverview::class)
            </div>
            <div class="grid grid-cols-2 gap-4 mt-4 p-4 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div>
                        <h2>Victim Reports</h2>
                    </div>
                    <div>
                        <h2>Location and Status Changes</h2>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>
