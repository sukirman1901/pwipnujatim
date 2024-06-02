<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;

class CkeditorController extends Controller
{
    /**
     * Show the CKEditor view.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        return view('ckeditor');
    }

    /**
     * Handle image uploads for CKEditor.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function upload(Request $request): JsonResponse
    {
        if ($request->hasFile('upload') && $request->file('upload')->isValid()) {
            $uploadedFile = $request->file('upload');
            
            // Validate file type
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            $extension = $uploadedFile->getClientOriginalExtension();
            if (!in_array(strtolower($extension), $allowedExtensions)) {
                return response()->json([
                    'uploaded' => false,
                    'error' => 'Only JPG, JPEG, PNG, and GIF files are allowed.'
                ]);
            }

            // Generate unique filename
            $fileName = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME) . '_' . time() . '.' . $extension;

            // Move file to public directory
            $uploadedFile->move(public_path('media'), $fileName);

            // Generate URL
            $url = asset('media/' . $fileName);

            return response()->json([
                'fileName' => $fileName,
                'uploaded' => true,
                'url' => $url
            ]);
        }

        return response()->json([
            'uploaded' => false,
            'error' => 'No file uploaded or invalid file.'
        ]);
    }
}
