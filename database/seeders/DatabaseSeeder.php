<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Character;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //User::factory(1)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $characters = json_decode(File::get(storage_path('app/public/assets/settings/characters_settings.json')));

        foreach ($characters as $character) {
            error_log($character->name);
            Character::create([
                'name' => $character->name,
                'image_path' => $character->images,
                'attribute' => $character->attribute,
                'rarity' => $character->grade,
                'race' => $character->race
            ]);
        }
    }
}