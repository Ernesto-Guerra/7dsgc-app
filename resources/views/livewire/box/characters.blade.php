<div>
    <div class="grid md:grid-cols-1 grid-cols-1 gap-5">

        <div class="grid md:grid-cols-2 grid-cols-2">
            <div class="tooltip dark:text-white flex items-center">
                <x-input class="mr-1" id="inverted" type="checkbox" wire:model.live.debounce.100ms="inverted"></x-input>
                <label for="inverted">Inverted mode</label>
            </div>
            <div class="flex justify-end">
                <x-input placeholder="Character name..." wire:model.live.debounce.250ms='search'></x-input>
                <x-button class="ml-1" wire:click="$set('search', '')">Clear</x-button>
            </div>
        </div>
        <div wire:loading.class.delay="opacity-50">
            <div class="grid xl:grid-cols-12 lg:grid-cols-8 grid-cols-4 gap-5">
                @forelse ($characters as $character)
                <label for="character-{{$character->id}}">
                    <input class="hidden" id="character-{{$character->id}}" wire:model.live="ownedCharactersId"
                        value="{{$character->id}}" type="checkbox"></input>
                    <img class="p-[5px] @if($inverted)hover:bg-red-700 @else hover:bg-lime-700 @endif @if($inverted)dark:hover:bg-red-400 @else dark:hover:bg-lime-400 @endif transition ease-in-out duration-150 
                    @if(in_array($character->id, $ownedCharactersId))
                    @if($inverted)bg-red-700 @else bg-lime-700 @endif @if($inverted)dark:bg-red-400 @else dark:bg-lime-400 @endif @endif"
                        src="/characterImg/{{$character->id}}" alt="{{$character->name}}" loading="lazy" width="100"
                        height="100">
                </label>
                @empty
                <div class="flex col-span-full align-middle justify-center items-center">
                    <img src="https://static.wikia.nocookie.net/7dsgc_mobile_game/images/8/89/Icon_stamp_king_04.png"
                        alt="">
                    <div>
                        <h1 class="dark:text-white">Nothing here, sorry...</h1>
                    </div>
                </div>
                @endforelse
            </div>
        </div>

        <div>
            <x-button wire:click='save'>Save</x-button>
            <x-danger-button wire:click="$toggle('confirmationModal')">Reset Box</x-danger-button>
            <div class="py-2">
                @if (session()->has('message'))
                <div class="alert alert-success dark:text-white">
                    {{ session('message') }}
                </div>
                @endif
            </div>
            <div>
                {{ $characters->links(data: ['scrollTo' => false]) }}
            </div>
        </div>

        <x-dialog-modal wire:model="confirmationModal">
            <x-slot name="title">
                Reset Box?
            </x-slot>

            <x-slot name="content">
                Are you sure you want to reset your box characters? Once is reseted, all your box data will be
                permanently deleted.
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('confirmationModal')" wire:loading.attr="disabled">
                    Nevermind
                </x-secondary-button>

                <x-danger-button class="ml-2" wire:click="resetBox" wire:loading.attr="disabled">
                    Reset Box
                </x-danger-button>
            </x-slot>
        </x-dialog-modal>
        {{-- <p>
            {{var_export($inverted)}}
        </p> --}}

    </div>