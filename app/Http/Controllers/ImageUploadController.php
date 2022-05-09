<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Exception;

class ImageUploadController extends Controller
{
    function upload(Request $req)
    {
        // Validate the uploaded file
        if (!$req->hasFile('file')) {
            return response()->json(['success' => false, 'error' => 'Image File not found'], 400);
        }

        $imageFile = $req->file;
        $imageFileType = $imageFile->getClientMimeType();

        // Validate the uploaded file type
        $acceptedFileTypes = ['image/png', 'image/jpeg', 'image/jpg'];
        if (!in_array($imageFileType, $acceptedFileTypes)) {
            return response()->json(['success' => false, 'error' => 'File type is not allowed'], 400);
        }

        // Using Cloudinary Laravel SDK to upload
        try {
            $uploadedFileUrl =  Cloudinary::unsignedUpload($imageFile->getRealPath(), 'dev-challenges')->getPath();
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 400);
        }



        return response()->json(['success' => true, 'image_link' => $uploadedFileUrl], 200);
    }
}
