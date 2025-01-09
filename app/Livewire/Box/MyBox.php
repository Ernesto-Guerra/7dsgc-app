<?php

namespace App\Livewire\Box;

use Livewire\Component;
use App\Models\User;
use App\Models\UserData;

class MyBox extends Component
{

    public $userData;

    // an integer, sadly. This should be from DB
    public $ccBox = 0;
    public $savedCcBox;
    public $editBox = false;

    //box buffs
    public $atkBuff;
    public $defBuff;
    public $hpBuff;
    private $ccMills;

    public function updateBuffPercentages()
    {
        if ($this->ccBox < 2000000) {
            $this->ccMills = 0;
        }
        else{
            $this->ccMills = floor($this->ccBox / 500000);
        }

        switch ($this->ccMills) {

            case 46:
                $this->atkBuff = 6;
                $this->defBuff = 11;
                $this->hpBuff = 15;
                break;

            case 45:
                $this->atkBuff = 5.5;
                $this->defBuff = 11;
                $this->hpBuff = 15;
                break;

            case 44:
                $this->atkBuff = 5.5;
                $this->defBuff = 10.5;
                $this->hpBuff = 15;
                break;

            case 43:
                $this->atkBuff = 5;
                $this->defBuff = 10.5;
                $this->hpBuff = 15;
                break;
            case 42:
                $this->atkBuff = 5;
                $this->defBuff = 10;
                $this->hpBuff = 15;
                break;

            case 41:
                $this->atkBuff = 4.5;
                $this->defBuff = 10;
                $this->hpBuff = 15;
                break;

            case 40:
                $this->atkBuff = 4.5;
                $this->defBuff = 9.5;
                $this->hpBuff = 15;
                break;

            case 39:
                $this->atkBuff = 4;
                $this->defBuff = 9.5;
                $this->hpBuff = 15;
                break;

            case 38:
                $this->atkBuff = 4;
                $this->defBuff = 9;
                $this->hpBuff = 15;
                break;

            case 37:
                $this->atkBuff = 3.5;
                $this->defBuff = 9;
                $this->hpBuff = 15;
                break;
            
            case 36:
                $this->atkBuff = 3.5;
                $this->defBuff = 8.5;
                $this->hpBuff = 15;
                break;

            case 35:
                $this->atkBuff = 3;
                $this->defBuff = 8.5;
                $this->hpBuff = 15;
                break;

            case 34:
                $this->atkBuff = 3;
                $this->defBuff = 8;
                $this->hpBuff = 15;
                break;

            case 33:
                $this->atkBuff = 2.5;
                $this->defBuff = 8;
                $this->hpBuff = 15;
                break;
            case 32:
                $this->atkBuff = 2.5;
                $this->defBuff = 7.5;
                $this->hpBuff = 15;
                break;

            case 31:
                $this->atkBuff = 2;
                $this->defBuff = 7.5;
                $this->hpBuff = 15;
                break;

            case 30:
                $this->atkBuff = 2;
                $this->defBuff = 7;
                $this->hpBuff = 15;
                break;

            case 29:
                $this->atkBuff = 1.5;
                $this->defBuff = 7;
                $this->hpBuff = 15;
                break;

            case 28:
                $this->atkBuff = 1.5;
                $this->defBuff = 6.5;
                $this->hpBuff = 15;
                break;

            case 27:
                $this->atkBuff = 1;
                $this->defBuff = 6.5;
                $this->hpBuff = 15;
                break;
                                        
            case 26:
                $this->atkBuff = 1;
                $this->defBuff = 6;
                $this->hpBuff = 15;
                break;

            case 25:
                $this->atkBuff = 0;
                $this->defBuff = 6;
                $this->hpBuff = 15;
                break;

            case 24:
                $this->atkBuff = 0;
                $this->defBuff = 5.5;
                $this->hpBuff = 15;
                break;

            case 23:
                $this->atkBuff = 0;
                $this->defBuff = 5.5;
                $this->hpBuff = 14.5;
                break;
            case 22:
                $this->atkBuff = 0;
                $this->defBuff = 5;
                $this->hpBuff = 14.5;
                break;

            case 21:
                $this->atkBuff = 0;
                $this->defBuff = 5;
                $this->hpBuff = 14;
                break;

            case 20:
                $this->atkBuff = 0;
                $this->defBuff = 4.5;
                $this->hpBuff = 14;
                break;

            case 19:
                $this->atkBuff = 0;
                $this->defBuff = 4.5;
                $this->hpBuff = 13.5;
                break;

            case 18:
                $this->atkBuff = 0;
                $this->defBuff = 4;
                $this->hpBuff = 13.5;
                break;

            case 17:
                $this->atkBuff = 0;
                $this->defBuff = 4;
                $this->hpBuff = 13;
                break;
                                        
            case 16:
                $this->atkBuff = 0;
                $this->defBuff = 3.5;
                $this->hpBuff = 13;
                break;

            case 15:
                $this->atkBuff = 0;
                $this->defBuff = 3.5;
                $this->hpBuff = 12.5;
                break;

            case 14:
                $this->atkBuff = 0;
                $this->defBuff = 3;
                $this->hpBuff = 12.5;
                break;

            case 13:
                $this->atkBuff = 0;
                $this->defBuff = 2.5;
                $this->hpBuff = 12.5;
                break;
            case 12:
                $this->atkBuff = 0;
                $this->defBuff = 2;
                $this->hpBuff = 12.5;
                break;

            case 11:
                $this->atkBuff = 0;
                $this->defBuff = 2;
                $this->hpBuff = 12;
                break;

            case 10:
                $this->atkBuff = 0;
                $this->defBuff = 1.5;
                $this->hpBuff = 12;
                break;

            case 9:
                $this->atkBuff = 0;
                $this->defBuff = 1;
                $this->hpBuff = 12;
                break;

            case 8:
                $this->atkBuff = 0;
                $this->defBuff = 0;
                $this->hpBuff = 12;
                break;

            case 7:
                $this->atkBuff = 0;
                $this->defBuff = 0;
                $this->hpBuff = 10.5;
                break;

            case 6:
                $this->atkBuff = 0;
                $this->defBuff = 0;
                $this->hpBuff = 9;
                break;

            case 5:
                $this->atkBuff = 0;
                $this->defBuff = 0;
                $this->hpBuff = 7.5;
                break;

            case 4:
                $this->atkBuff = 0;
                $this->defBuff = 0;
                $this->hpBuff = 6;
                break;

            case 3:
                $this->atkBuff = 0;
                $this->defBuff = 0;
                $this->hpBuff = 4.5;
                break;
            case 2:
                $this->atkBuff = 0;
                $this->defBuff = 0;
                $this->hpBuff = 3;
                break;

            case 1:
                $this->atkBuff = 0;
                $this->defBuff = 0;
                $this->hpBuff = 1.5;
                break;                              
  
            default:
                $this->ccMills = floor($this->ccBox / 250000);
                switch ($this->ccMills) {

                    case 3:
                        $this->atkBuff = 0;
                        $this->defBuff = 0;
                        $this->hpBuff = 2;
                        break;

                    case 5:
                        $this->atkBuff = 0;
                        $this->defBuff = 0;
                        $this->hpBuff = 3.5;
                        break;

                    case 7:
                        $this->atkBuff = 0;
                        $this->defBuff = 0;
                        $this->hpBuff = 5;
                        break;
                    
                    default:
                    $this->atkBuff = 0;
                    $this->defBuff = 0;
                    $this->hpBuff = 0;
                        break;
                }
                break;
        }
  
    }

    public function toggleEdit()
    {
        $this->editBox = true;
    }

    public function save()
    {
        //not buff for a ccBox over 23.5M
        if($this->ccBox > 23500000) {
            $this->ccBox = $this->savedCcBox;
            $this->editBox = false;
            return;
        }

        $this->userData->box_cc = $this->ccBox;

        try {
            $this->userData->save();
        } catch (\Throwable $th) {
            session()->flash('message', 'Something went wrong. Please try again.');
            $this->ccBox = $this->savedCcBox;
            $this->editBox = false;
            return;
        }

        $this->savedCcBox = $this->ccBox;
        $this->updateBuffPercentages();
        session()->flash('message', 'Box successfully updated.');
        $this->editBox = false;
    }

    public function mount(){
        $this->userData = auth()->user()->userData;
        
        $this->ccBox = $this->userData->box_cc;
        $this->savedCcBox = $this->ccBox;
        $this->updateBuffPercentages();
    }

    public function render()
    {
        return view('livewire.box.my-box');
    }
}
