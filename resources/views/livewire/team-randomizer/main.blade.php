<div>
    <div id="filters" class="grid lg:grid-cols-3 grid-cols-1 gap-5">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-5">
            <x-card class="text-center dark:text-white">
                <x-slot name="header">
                    <h1 class="text-2xl pb-2 font-bold">Grade</h1>
                </x-slot>

                <div class="grid lg:grid-cols-4 grid-cols-2 gap-5 justify-items-center">
                    <div class="flex items-center">
                        <img class="w-10" src="{{asset('storage/assets/images/grade/r.png')}}" alt="">
                        <x-input wire:model.lazy='grade' value="r" type="checkbox"></x-input>
                    </div>
                    <div class="flex items-center">
                        <img class="w-10" src="{{asset('storage/assets/images/grade/sr.png')}}" alt="">
                        <x-input wire:model.lazy='grade' value="sr" type="checkbox"></x-input>
                    </div>
                    <div class="flex items-center">
                        <img class="w-10" src="{{asset('storage/assets/images/grade/ssr.png')}}" alt="">
                        <x-input wire:model.lazy='grade' value="ssr" type="checkbox"></x-input>
                    </div>
                    <div class="flex items-center">
                        <img class="w-10" src="{{asset('storage/assets/images/grade/ur.png')}}" alt="">
                        <x-input wire:model.lazy='grade' value="ur" type="checkbox"></x-input>
                    </div>
                    {{-- <div class="flex items-center">
                        <img class="w-7 mr-2" src="{{asset('storage/assets/images/grade/lr.png')}}" alt="">
                        <x-input wire:model.lazy='lr' value="lr" type="checkbox"></x-input>
                    </div> --}}
                </div>
            </x-card>
        </div>

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-5">
            <x-card class="text-center dark:text-white">
                <x-slot name="header">
                    <h1 class="text-2xl pb-2 font-bold">Race</h1>
                </x-slot>

                <div class="grid lg:grid-cols-3 grid-cols-3 gap-5 justify-items-center">
                    <div class="flex items-center">
                        <img class="w-10" src="{{asset('storage/assets/images/races/race_human.png')}}" alt="">
                        <x-input wire:model.lazy='race' value="human" type="checkbox"></x-input>
                    </div>
                    <div class="flex items-center">
                        <img class="w-10" src="{{asset('storage/assets/images/races/race_giant.png')}}" alt="">
                        <x-input wire:model.lazy='race' value="giant" type="checkbox"></x-input>
                    </div>
                    <div class="flex items-center">
                        <img class="w-10" src="{{asset('storage/assets/images/races/race_demon.png')}}" alt="">
                        <x-input wire:model.lazy='race' value="demon" type="checkbox"></x-input>
                    </div>
                    <div class="flex items-center">
                        <img class="w-10" src="{{asset('storage/assets/images/races/race_goddess.png')}}" alt="">
                        <x-input wire:model.lazy='race' value="goddess" type="checkbox"></x-input>
                    </div>
                    <div class="flex items-center">
                        <img class="w-10" src="{{asset('storage/assets/images/races/race_fairy.png')}}" alt="">
                        <x-input wire:model.lazy='race' value="fairy" type="checkbox"></x-input>
                    </div>
                    <div class="flex items-center">
                        <img class="w-10" src="{{asset('storage/assets/images/races/race_unknown.png')}}" alt="">
                        <x-input wire:model.lazy='race' value="unknown" type="checkbox"></x-input>
                    </div>
                </div>
            </x-card>
        </div>

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-5">
            <x-card class="text-center dark:text-white">
                <x-slot name="header">
                    <h1 class="text-2xl pb-2 font-bold">Attribute</h1>
                </x-slot>

                <div class="grid lg:grid-cols-3 grid-cols-3 gap-5 justify-items-center">
                    <div class="flex items-center">
                        <img class="w-10" src="{{asset('storage/assets/images/attributes/attribute_strength.png')}}"
                            alt="">
                        <x-input wire:model.lazy='attribute' value="strength" type="checkbox"></x-input>
                    </div>
                    <div class="flex items-center">
                        <img class="w-10" src="{{asset('storage/assets/images/attributes/attribute_speed.png')}}"
                            alt="">
                        <x-input wire:model.lazy='attribute' value="speed" type="checkbox"></x-input>
                    </div>
                    <div class="flex items-center">
                        <img class="w-10" src="{{asset('storage/assets/images/attributes/attribute_hp.png')}}" alt="">
                        <x-input wire:model.lazy='attribute' value="hp" type="checkbox"></x-input>
                    </div>
                    <div class="flex items-center">
                        <img class="w-10" src="{{asset('storage/assets/images/attributes/attribute_light.png')}}"
                            alt="">
                        <x-input wire:model.lazy='attribute' value="light" type="checkbox"></x-input>
                    </div>
                    <div class="flex items-center">
                        <img class="w-10" src="{{asset('storage/assets/images/attributes/attribute_dark.png')}}" alt="">
                        <x-input wire:model.lazy='attribute' value="darkness" type="checkbox"></x-input>
                    </div>
                </div>
            </x-card>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-5 mt-5">
        <div class="grid lg:grid-cols-2 grid-cols-1 gap-5 justify-items-center mb-5">
            <div id="mode" class="flex items-center">
                <div class="flex items-center mr-5">
                    <x-label class="mr-1" for="single">Single mode</x-label>
                    <x-input id="single" type="radio" wire:model='singleMode' name="singleMode" value="single">
                    </x-input>
                </div>
                <div class="flex items-center">
                    <x-label class="mr-1" for="team">Team mode</x-label>
                    <x-input id="team" type="radio" wire:model='singleMode' name="singleMode" value="team"></x-input>
                </div>
            </div>
            <div class="flex items-center">
                <x-label class="mr-1" for="owned">Owned Characters only</x-label>
                <x-input id="owned" type="checkbox" wire:model='ownedOnly' name="owned"></x-input>
            </div>
            <div>
                <x-button wire:click="randomize">Randomize</x-button>
            </div>

            <div class="col-span-full py-2">
                @if (session()->has('message'))
                <div class="alert alert-success dark:text-white">
                    {{ session('message') }}
                </div>
                @endif
            </div>
        </div>

        <div class="grid lg:grid-cols-4 grid-cols-2 gap-5">
            @forelse ($selectedCharacters as $index => $character)
            <div class="justify-items-center {{ $singleMode == 'single' ? 'col-span-full' : '' }}">
                <div class="flex justify-center">
                    <img src="/characterImg/{{$character->id ?? ''}}" alt="{{$character->name ?? ''}}" loading="lazy"
                        width="100" height="100">
                </div>
                <div class="justify-items-center mt-1">
                    <x-label>{{$character->name ?? ''}}</x-label>
                </div>
                @if ($singleMode == 'team')
                <x-button class="mt-2" wire:click="randomize({{$index}})">
                    <img class="justify-items-center w-6" src="{{asset('storage/assets/icons/reload.png')}}"
                        alt="{{$character->name ?? ''}}" loading="lazy">
                </x-button>
                @endif

            </div>
            @empty

            @endforelse
        </div>
    </div>
</div>