<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\File;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function uploadImage($file, $path): string
    {
        $fullPath = storage_path('app/public/' . $path);

        if (!File::exists($fullPath)) {
            File::makeDirectory($fullPath, 0755, true);
        }

        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/'.$path, $filename);
        return asset('storage/'.$path.'/'.$filename);
    }

}
