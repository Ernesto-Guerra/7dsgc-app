<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Cache;
use App\Models\Character;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


//Auth only
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/box', function () {
        return view('box.main');
    })->name('box');

    Route::get('/characterImg/{id}', function ($id) {
        $characterName = Character::find($id)->image_path;
        
        $path = storage_path('app/public/assets/images/characters/'.$characterName);
        
        if (!file_exists($path)) {
            abort(404);
        }
    
    // Cache Key para identificar esta imagen
    $cacheKey = 'image_cache_' . md5($id);
    
    // Verificar si la imagen está en caché
    $imageContent = Cache::get($cacheKey);
    
    // Si no está en caché, cargar la imagen y almacenarla en caché
    if (!$imageContent) {
        $imageContent = file_get_contents($path);
        Cache::put($cacheKey, $imageContent, \Carbon\Carbon::now()->addYear()->toRfc1123String()); // Cachea por 1 año
    }
    
    // Obtener la fecha de la última modificación de la imagen
    $lastModified = filemtime($path);
    
    // Crear un ETag para la imagen
    $etag = md5($imageContent);
    
    return Response::make($imageContent, 200)
    ->header('Content-Type', 'image/jpeg') // Ajusta el tipo de contenido según sea necesario
    ->header('Cache-Control', 'public, max-age=3600000') // Caché por 1 chingo de tiempo
    ->header('Last-Modified', gmdate('D, d M Y H:i:s', $lastModified) . ' GMT')
    ->header('ETag', $etag);
    })->middleware(App\Http\Middleware\CacheImages::class)->name('characterImg');

    Route::get('/teamRandomizer', function () {
        return view('team-randomizer.main');
    })->name('team-randomizer');

    Route::get('download-box-pdf', 'App\Http\Controllers\BoxController@downloadBoxPdf')->name('download-box-pdf');
});
