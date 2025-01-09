<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    protected $casts = [
        'owned_characters' => 'array', // Laravel convertirá automáticamente el campo JSON en un array cuando lo obtengas
    ];

    protected $fillable = [
        'user_id', 'box_cc', 'owned_characters',
    ];
}
