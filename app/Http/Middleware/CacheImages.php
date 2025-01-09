<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CacheImages
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Solo aplicar caché a imágenes
        if (preg_match('/\.(jpg|jpeg|png|gif|webp)$/', $request->path())) {
            // Establecer los headers de caché
            $response->headers->set('Cache-Control', 'public, max-age=31536000'); // 1 año en segundos
            $response->headers->set('Expires', \Carbon\Carbon::now()->addYear()->toRfc1123String());
        }

        return $response;
    }
}
