<?php

namespace App\Http\Controllers;

use App\Utils\ImageManger;
use Illuminate\Http\Request;

class UploadImageSummernoteController extends Controller
{
    protected  $imageManger;

    public function __construct( ImageManger $imageManger)
    {
        $this->imageManger = $imageManger;
    }

    public function index(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if (!$request->hasFile('image')) {
            return response()->json(['error' => 'No file uploaded'], 400);
        }

        $fileName = $this->imageManger->uploadSingleImage('/', $request->file('image'), 'editor');
        $url = asset('uploads/editor/' . $fileName);

        return response()->json(['url' => $url], 200);
    }

    }




