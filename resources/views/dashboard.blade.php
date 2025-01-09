<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="grid md:grid-cols-4 grid-cols-1 gap-4">

                    <a href="{{route('box')}}" class="text-center">
                        <x-button class="min-w-full text-center">Box Editor</x-button>
                    </a>
                    <x-button>CC Calculator</x-button>
                    <x-button>Auto redeem codes</x-button>
                    <x-button>Character List</x-button>
                    <a href="{{route('team-randomizer')}}" class="text-center">
                        <x-button class="min-w-full text-center">Team Randomizer</x-button>
                    </a>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>