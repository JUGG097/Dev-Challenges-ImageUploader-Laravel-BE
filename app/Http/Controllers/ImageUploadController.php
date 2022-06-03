<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Exception;
use Illuminate\Support\Facades\Validator;

class ImageUploadController extends Controller
{
    function upload(Request $req)
    {

        $validator = Validator::make($req->all(), [
            'file' => 'required|file|mimes:jpg,png,jpeg|max:5000',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->errors()], 400);
        }

        $imageFile = $req->file;

        // Using Cloudinary Laravel SDK to upload
        try {
            $uploadedFileUrl =  Cloudinary::unsignedUpload($imageFile->getRealPath(), 'dev-challenges')->getPath();
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 400);
        }



        return response()->json(['success' => true, 'image_link' => $uploadedFileUrl], 200);
    }
}
