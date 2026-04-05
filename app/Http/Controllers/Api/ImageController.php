<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function show($filename)
    {
        // Validar que sea un archivo de imagen
        if (!preg_match('/\.(jpg|jpeg|png|gif|webp)$/i', $filename)) {
            abort(404);
        }
        
        // Buscar en storage primero
        $storagePath = storage_path('app/public/productos/' . $filename);
        
        if (file_exists($storagePath)) {
            return response()->file($storagePath, [
                'Content-Type' => mime_content_type($storagePath),
            ]);
        }
        
        // Fallback: buscar en public/productos
        $publicPath = public_path('productos/' . $filename);
        
        if (!file_exists($publicPath)) {
            abort(404, 'Imagen no encontrada');
        }
        
        return response()->file($publicPath, [
            'Content-Type' => mime_content_type($publicPath),
        ]);
    }
}