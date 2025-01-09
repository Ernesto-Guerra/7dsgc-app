@if (Auth::user())
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Team Randomizer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div>
                @livewire('team-randomizer.main')
            </div>
        </div>
    </div>
</x-app-layout>
@else
<x-guest-layout>
    <div>
        @livewire('team-randomizer.main')
    </div>
</x-guest-layout>
@endif