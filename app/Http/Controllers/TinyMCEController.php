<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TinyMCEController extends Controller
{
    public function uploadImage(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $file->getClientOriginalName()); // Removes special characters
            $path = 'uploads/tinymce/';
            $file->move(public_path($path), $filename);
        
            return response()->json(['location' => asset($path . $filename)], 200);
        }
    }
}
