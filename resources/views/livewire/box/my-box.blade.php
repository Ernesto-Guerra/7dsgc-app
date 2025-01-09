<div>
    <div class="grid md:grid-cols-2 grid-cols-1 gap-4">
        <div>
            <div class="justify-items-center">
                <h1 class="dark:text-white text-xl">Your box CC is:
                    @if ($editBox)
                    <x-input type="number" wire:model.lazy="ccBox"></x-input>
                    @else
                    {{ number_format($ccBox, 0, '.', ',') }}
                    @endif
                </h1>
                <div>
                    @if (session()->has('message'))
                    <div class="alert alert-success dark:text-white">
                        {{ session('message') }}
                    </div>
                    @endif
                </div>
            </div>

            <div class="flex justify-center">
                @if ($editBox)
                <x-button wire:click='save'>Save</x-button>
                @else
                <x-button wire:click='toggleEdit'>Edit</x-button>
                @endif
            </div>

        </div>
        <div class="dark:text-white justify-items-center">
            <h1>ATK BUFF: {{$atkBuff}}%</h1>
            <h1>DEF BUFF: {{$defBuff}}%</h1>
            <h1>HP BUFF: {{$hpBuff}}%</h1>
            {{-- {{var_export($userData)}} --}}
        </div>
    </div>
</div>