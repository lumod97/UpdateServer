<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class FileController extends Controller
{
    public function downloadFile($version)
    {
        $filename = 'public/DataGreen'.$version.'.apk';

        // Verificar si el archivo existe en el almacenamiento
        if (Storage::exists($filename)) {
            // Obtener la ruta completa del archivo
            $filePath = Storage::path($filename);

            // Obtener el tipo MIME del archivo (por ejemplo, para PDF sería 'application/pdf')
            $mimeType = Storage::mimeType($filename);

            // Descargar el archivo como respuesta HTTP
            return response()->stream(function () use ($filePath) {
                readfile($filePath);
            }, 200, [
                'Content-Type' => $mimeType,
                'Content-Disposition' => 'attachment; filename="DataGreen.apk"',
            ]);
        } else {
            // Manejar el caso en el que el archivo no existe
            return response()->json(['error' => 'El archivo no existe'], 404);
        }
    }
}

