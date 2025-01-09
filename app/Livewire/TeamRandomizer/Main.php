<?php

namespace App\Livewire\TeamRandomizer;

use Livewire\Component;
use App\Models\Character;
use App\Models\UserData;

class Main extends Component
{
    public $grade = [];
    public $race = [];
    public $attribute = [];
    public $lr = [];

    private $userData;
    public $ownedCharactersId = [];

    public $ownedOnly = false;
    public $singleMode = 'team';

    public $randomCharacter;
    public $tempCharacters;
    public $selectedCharacters = [];
    private $selectedCharactersId = [];

    public function randomize($position = 4){

        if($this->singleMode == 'single' && $position != 4){
            $this->singleMode = 'team';
        }

        if($this->singleMode == 'single'){
            $position = 0;
            $this->selectedCharacters = [];
        }
        
        foreach ($this->selectedCharacters as $character) {
            if($character == null){
                continue;
            }
            array_push($this->selectedCharactersId, $character->id);
        }


        if($position == 4){
            
            try {
                if($this->ownedOnly){
                    $this->tempCharacters = Character::whereIn('id', $this->ownedCharactersId)->whereNotIn('id', $this->selectedCharacters)->whereNotIn('id', $this->selectedCharactersId)->whereIn('rarity', (empty($this->grade) ? ['r', 'sr', 'ssr', 'ur'] : $this->grade))->whereIn('attribute', (empty($this->attribute) ? ['strength', 'speed', 'hp', 'light', 'darkness'] : $this->attribute))->where(function ($query){
                        foreach($this->race as $race){
                            $query->orWhere('race', 'like', '%'.$race.'%');
                        }
                        return $query;
                        })->inRandomOrder()->limit(4)->get();  
                }
                else{
                    $this->tempCharacters = Character::whereNotIn('id', $this->selectedCharacters)->whereNotIn('id', $this->selectedCharactersId)->whereIn('rarity', (empty($this->grade) ? ['r', 'sr', 'ssr', 'ur'] : $this->grade))->whereIn('attribute', (empty($this->attribute) ? ['strength', 'speed', 'hp', 'light', 'darkness'] : $this->attribute))->where(function ($query){
                    foreach($this->race as $race){
                        $query->orWhere('race', 'like', '%'.$race.'%');
                    }
                    return $query;
                    })->inRandomOrder()->limit(4)->get();  
                }
            } catch (\Throwable $th) {
                session()->flash('message', 'Oops! Something went wrong. Please reload or disable some filters.');
            }

            if(!empty($this->tempCharacters)){
                foreach($this->tempCharacters as $index => $character){
                    $this->selectedCharacters[$index] = $character;
                }
                return;
            }
            session()->flash('message', 'Not enough characters to fill the team. Please reload or disable some filters.');
            return;
        }

        
        
        try {
            if($this->ownedOnly){
                $this->tempCharacters = Character::whereIn('id', $this->ownedCharactersId)->whereNotIn('id', $this->selectedCharacters)->whereNotIn('id', $this->selectedCharactersId)->whereIn('rarity', (empty($this->grade) ? ['r', 'sr', 'ssr', 'ur'] : $this->grade))->whereIn('attribute', (empty($this->attribute) ? ['strength', 'speed', 'hp', 'light', 'darkness'] : $this->attribute))->where(function ($query){
                    foreach($this->race as $race){
                        $query->orWhere('race', 'like', '%'.$race.'%');
                    }
                    return $query;
                })->inRandomOrder()->first();
            }
            else{
                $this->tempCharacters = Character::whereNotIn('id', $this->selectedCharacters)->whereNotIn('id', $this->selectedCharactersId)->whereIn('rarity', (empty($this->grade) ? ['r', 'sr', 'ssr', 'ur'] : $this->grade))->whereIn('attribute', (empty($this->attribute) ? ['strength', 'speed', 'hp', 'light', 'darkness'] : $this->attribute))->where(function ($query){
                    foreach($this->race as $race){
                        $query->orWhere('race', 'like', '%'.$race.'%');
                    }
                    return $query;
                })->inRandomOrder()->first();
            }
        } catch (\Throwable $th) {
            session()->flash('message', 'Oops! Something went wrong. Please reload or disable some filters.');
        }


        if(!empty($this->tempCharacters)){
            $this->selectedCharacters[$position] = $this->tempCharacters;
            return;
        }
        session()->flash('message', 'Not enough characters to fill the team. Please reload or disable some filters.');
        
    }

    public function mount(){
        

        $this->userData = auth()->user()->userData;
        $this->ownedCharactersId = $this->userData->owned_characters;
    }

    public function render()
    {
        return view('livewire.team-randomizer.main');
    }
}
