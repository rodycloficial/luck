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
        
        // Buscar en storage
        $storagePath = storage_path('app/public/productos/' . $filename);
        
        if (file_exists($storagePath)) {
            return response()->file($storagePath, [
                'Content-Type' => mime_content_type($storagePath),
            ]);
        }
        
        abort(404, 'Imagen no encontrada');
    }
}