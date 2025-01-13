<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Box') }}
        </h2>
    </x-slot>

    <div class="py-12">
        {{-- cc box and buffs --}}
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-10">
                @livewire('box.my-box')
            </div>
        </div>

        <div class="flex py-10 justify-center">
            <a href="{{route('download-box-pdf')}}" target="_blank" class="text-center">
                <x-button>Export Box</x-button>
            </a>
        </div>

        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-10">
                @livewire('box.characters')
            </div>
        </div>
    </div>
</x-app-layout>