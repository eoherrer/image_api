<?php

namespace App\Http\Controllers;

use App\Image;
use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Response;
use Mockery\Exception;

class ImageController extends Controller
{

    public function index(){

        $images = Image::all();
        return $images;
    }

    public function show($docName)
    {
        try {
            $image = Image::where('docName', '=', $docName)->firstOrFail();

            return response()->make($image->image, 200, array(
                'Content-Type' => (new \finfo(FILEINFO_MIME_TYPE))->buffer($image->image)
            ));
        }catch (Exception $exception){
            return response()->view($exception->getMessage(), [], 500);
        }
    }

    public function store(Request $request)
    {
        return Image::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $image = Image::findOrFail($id);
        $image->update($request->all());
        return $image;
    }

    public function delete(Request $request, $id)
    {
        $image = Image::findOrFail($id);
        $image->delete();

        return 204;
    }
}
