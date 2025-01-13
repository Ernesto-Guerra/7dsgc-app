<x-guest-layout>
    <div class="bg-gray-800">
        <div>
            <h1 class="text-4xl text-center text-white p-5">{{Auth::user()->name}}</hjson>
        </div>
        <h2 class="text-2xl text-center text-white">Box CC: {{number_format($userData->box_cc, 0, '.', ',')}}</h2>
        <div class="grid grid-cols-24 p-5 justify-items-center">
            @foreach ($characters as $character)
            <img class="p-[5px]" src="/characterImg/{{$character->id}}" alt="{{$character->name}}" loading="lazy"
                width="100" height="100">
            @endforeach
        </div>
    </div>
</x-guest-layout>