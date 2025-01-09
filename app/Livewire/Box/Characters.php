<?php

namespace App\Livewire\Box;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Character;

class Characters extends Component
{
    use WithPagination;

    public $userData;
    public $ownedCharactersId = [];
    
    public $inverted = false;
    public $confirmationModal = false;

    public $search = '';


    public function save(){

        if($this->inverted){
            //Gets all unselected characters from database
            $this->ownedCharactersId = Character::whereNotIn('id', $this->ownedCharactersId)->pluck('id')->toArray();
            $this->inverted = false;
        }

        $this->userData->owned_characters = $this->ownedCharactersId;
        $this->userData->save();
        session()->flash('message', 'Owned Characters successfully updated.');
    }

    public function resetBox(){

        $this->userData->owned_characters = [];
        $this->userData->save();
        $this->ownedCharactersId = [];
        session()->flash('message', 'Owned Characters successfully reset.');
        $this->confirmationModal = false;
    }

    public function mount(){
        $this->userData = auth()->user()->userData;
        $this->ownedCharactersId = $this->userData->owned_characters;
    }

    public function render()
    {
        return view('livewire.box.characters', [
            'characters' => Character::search('name', $this->search)->paginate(48)
        ]);
    }
}
