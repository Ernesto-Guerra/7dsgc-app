<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;
use Illuminate\Support\Facades\Auth;


class BoxController extends Controller
{
    public function downloadBoxPdf()
    {
        $userData = Auth::user()->userData;
        $characters = Character::whereIn('id', $userData->owned_characters)->get();
        return view('download.box', compact('characters', 'userData'));
    }
}
